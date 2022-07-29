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

    public function user() {
        return Auth::user();
    }

    /**
     * Show 2FA Setting form
     */
    public function show2faForm(Request $request){
        $google2fa_url = "";
        $secret_key = "";

        if($this->user()->loginSecurity()->exists()){
            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $google2fa_url = $google2fa->getQRCodeInline(
                Setting::get('company_name'),
                $this->user()->email,
                $this->user()->loginSecurity->google2fa_secret
            );
            $secret_key = $this->user()->loginSecurity->google2fa_secret;
        }

        $data = array(
            'user' => $this->user(),
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url
        );

        return view('auth.2fa_settings')->with('data', $data);
    }

    /**
     * Generate 2FA secret key
     */
    public function generate2faSecret(Request $request){
        // Initialise the 2FA class
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        // Add the secret key to the registration data
        $login_security = LoginSecurity::firstOrNew(array('user_id' => $this->user()->id));
        $login_security->user_id = $this->user()->id;
        $login_security->google2fa_enable = 0;
        $login_security->google2fa_secret = $google2fa->generateSecretKey(64);
        $login_security->save();

        return redirect('/profile/2fa')->with('success', trans('profile.secretKeyGenerated'));
    }

    /**
     * Enable 2FA
     */
    public function enable2fa(Request $request){
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($this->user()->loginSecurity->google2fa_secret, $secret);

        // Initialise the Recovery Codes 2FA class
        $recovery = (new \PragmaRX\Recovery\Recovery());
        $codes = $recovery->setCount(1)->setBlocks(1)->setChars(8)->toArray();

        foreach($codes as $code) {
            // Add the secret key to the registration data
            $recovery_codes = RecoveryCode::firstOrNew(array('user_id' => $this->user()->id));
            $recovery_codes->user_id = $this->user()->id;
            $recovery_codes->code = Base32::encode($code);
            $recovery_codes->status = 1;
            $recovery_codes->save();
        }

        if($valid){
            $this->user()->loginSecurity->google2fa_enable = 1;
            $this->user()->loginSecurity->save();
            return redirect('/profile/2fa')->with('success', trans('profile.2faEnabled', ['code' => $code]));
        }else{
            return redirect('/profile/2fa')->with('error', trans('profile.invalidCode'));
        }
    }

    /**
     * Disable 2FA
     */
    public function disable2fa(Request $request){
        if (!(Hash::check($request->get('current-password'), $this->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", trans('profile.passwordDoesNotMatch'));
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $this->user()->loginSecurity->google2fa_enable = 0;
        $this->user()->loginSecurity->save();
        return redirect('/profile/2fa')->with('success', trans('profile.2faDisabled'));
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

        $recoveryCodes = RecoveryCode::findOrFail(array('user_id' => $this->user()->id));
        foreach($recoveryCodes as $rc) {
            $code = $rc->code;
            $status = $rc->status;
        }

        if (Base32::encode($request->code) === $code && $status === 1) {
            $recCode = RecoveryCode::firstOrNew(array('user_id' => $this->user()->id));
            $recCode->status = 0;
            $recCode->save();

            $this->user()->loginSecurity->google2fa_enable = 0;
            $this->user()->loginSecurity->save();
            return redirect('/profile/2fa');
        } else {
            return redirect('/auth/2fa/scratch')->with('error', trans('profile.totpIncorrect'));
        }
    }

    /**
     * Generate new one time password
     */
    public function newPassword(Request $request) {
        // Initialise the Recovery Codes 2FA class
        $recovery = (new \PragmaRX\Recovery\Recovery());
        $codes = $recovery->setCount(1)->setBlocks(1)->setChars(8)->toArray();

        $this->user()->loginSecurity->google2fa_enable = 1;
        $this->user()->loginSecurity->save();

        foreach($codes as $code) {
            // Add the secret key to the registration data
            $recovery_codes = RecoveryCode::firstOrNew(array('user_id' => $this->user()->id));
            $recovery_codes->user_id = $this->user()->id;
            $recovery_codes->code = Base32::encode($code);
            $recovery_codes->status = 1;
            $recovery_codes->save();
        }

        return redirect('/profile/2fa')->with('success', trans('profile.newOTP', ['code' => $code]));
    }
}
