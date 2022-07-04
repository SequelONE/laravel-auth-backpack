<?php

namespace App\Http\Controllers;

use App\Models\LoginSecurity;
use App\Models\RecoveryCode;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Base32\Base32;

class LoginSecurityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show 2FA Setting form
     */
    public function show2faForm(Request $request){
        $user = Auth::user();
        $google2fa_url = "";
        $secret_key = "";

        if($user->loginSecurity()->exists()){
            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $google2fa_url = $google2fa->getQRCodeInline(
                Setting::get('company_name'),
                $user->email,
                $user->loginSecurity->two_factor_auth_secret
            );
            $secret_key = $user->loginSecurity->two_factor_auth_secret;
        }

        $data = array(
            'user' => $user,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url
        );

        return view('auth.2fa_settings')->with('data', $data);
    }

    /**
     * Generate 2FA secret key
     */
    public function generate2faSecret(Request $request){
        $user = Auth::user();
        // Initialise the 2FA class
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        // Add the secret key to the registration data
        $login_security = LoginSecurity::firstOrNew(array('user_id' => $user->id));
        $login_security->user_id = $user->id;
        $login_security->two_factor_auth_enable = 0;
        $login_security->two_factor_auth_secret = $google2fa->generateSecretKey(64);
        $login_security->save();

        return redirect('/settings/2fa')->with('success',"Der secret Schlüssel wurde generiert.");
    }

    /**
     * Enable 2FA
     */
    public function enable2fa(Request $request){
        $user = Auth::user();
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($user->loginSecurity->two_factor_auth_secret, $secret);

        // Initialise the Recovery Codes 2FA class
        $recovery = (new \PragmaRX\Recovery\Recovery());
        $codes = $recovery->setCount(1)->setBlocks(1)->setChars(8)->toArray();

        foreach($codes as $code) {
            // Add the secret key to the registration data
            $recovery_codes = RecoveryCode::firstOrNew(array('user_id' => $user->id));
            $recovery_codes->user_id = $user->id;
            $recovery_codes->code = Base32::encode($code);
            $recovery_codes->status = 1;
            $recovery_codes->save();
        }

        if($valid){
            $user->loginSecurity->two_factor_auth_enable = 1;
            $user->loginSecurity->save();
            return redirect('/settings/2fa')->with('success',"Die Zwei-Faktor-Authentifizierung wurde für dein Konto aktiviert. Bewahre dein Einmalpasswort ( " . $code . " ) an einem sicheren Ort auf, da es nicht wieder angezeigt werden wird.");
        }else{
            return redirect('/settings/2fa')->with('error',"Ungültiger Bestätigungscode, bitte versuchen Sie es erneut.");
        }
    }

    /**
     * Disable 2FA
     */
    public function disable2fa(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Ihr Passwort stimmt nicht mit Ihrem Kontopasswort überein. Bitte versuchen Sie es erneut.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $user = Auth::user();
        $user->loginSecurity->two_factor_auth_enable = 0;
        $user->loginSecurity->save();
        return redirect('/settings/2fa')->with('success',"2FA ist jetzt deaktiviert.");
    }

    /**
     * Show 2FA One password form
     */
    public function show2faFormTotp(){
        return view('auth.2fa_totp');
    }

    /**
     * Valid TOTP password form
     */
    public function totpValidate(Request $request){
        $request->validate([
            'code' => 'required',
        ]);

        $user = Auth::user();

        $recoveryCodes = RecoveryCode::findOrFail(array('user_id' => $user->id));
        foreach($recoveryCodes as $rc) {
            $code = $rc->code;
            $status = $rc->status;
        }

        if (Base32::encode($request->code) === $code && $status === 1) {
            $recCode = RecoveryCode::firstOrNew(array('user_id' => $user->id));
            $recCode->status = 0;
            $recCode->save();

            $user->loginSecurity->two_factor_auth_enable = 0;
            $user->loginSecurity->save();
            return redirect('/settings/2fa');
        } else {
            return redirect('/user/2fa/scratch')->with('error', "Das Einmalpasswort ist falsch.");
        }
    }

    /**
     * Generate new one time password
     */
    public function newPassword(Request $request) {
        $user = Auth::user();
        // Initialise the Recovery Codes 2FA class
        $recovery = (new \PragmaRX\Recovery\Recovery());
        $codes = $recovery->setCount(1)->setBlocks(1)->setChars(8)->toArray();

        $user->loginSecurity->two_factor_auth_enable = 1;
        $user->loginSecurity->save();

        foreach($codes as $code) {
            // Add the secret key to the registration data
            $recovery_codes = RecoveryCode::firstOrNew(array('user_id' => $user->id));
            $recovery_codes->user_id = $user->id;
            $recovery_codes->code = Base32::encode($code);
            $recovery_codes->status = 1;
            $recovery_codes->save();
        }

        return redirect('/settings/2fa')->with('success',"Dein Einmalpasswort ist ( " . $code . " ). Bewahre es an einem sicheren Ort auf.");
    }
}
