<?php

namespace App\Http\Controllers\Auth;

use Crypt;
use Google2FA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \ParagonIE\ConstantTime\Base32;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\UserCode;
use Session;

class UserController extends Controller
{
    use ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function enableTwoFactor(Request $request)
    {
        //generate new secret
        $secret = $this->generateSecret();

        //get user
        $user = $request->user();

        //encrypt and then save secret
        $user->two_faktor_secret = Crypt::encrypt($secret);
        $user->save();

        //generate image for QR barcode
        $imageDataUri = Google2FA::getQRCodeInline(
            $request->getHttpHost(),
            $user->username,
            $secret,
            200
        );

        return view('auth.profile.2fa.enable', [
            'qrcode' => $imageDataUri,
            'secret' => $secret
        ]);
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function disableTwoFactor(Request $request)
    {
        $user = $request->user();

        //make secret column blank
        $user->two_faktor_secret = null;
        $user->save();

        return redirect('profile/2fa');
    }

    /**
     * Generate a secret key in Base32 format
     *
     * @return string
     */
    private function generateSecret()
    {
        $randomBytes = random_bytes(10);

        return Base32::encodeUpper($randomBytes);
    }

    public function userAuth()
    {
        $user = Auth::user();
        return $user;
    }

    public function profile()
    {
        if($this->userAuth()) {
            return view('auth.profile.index');
        } else {
            return redirect('/login');
        }
    }

    public function settings()
    {
        if($this->userAuth()) {
            return view('auth.profile.settings');
        } else {
            return redirect('/login');
        }
    }

    public function socialProviders()
    {
        if($this->userAuth()) {
            return view('auth.profile.providers');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Write code on Method
     *
     * @return response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if($this->userAuth()) {
            $userId = Auth::id();
            $user = DB::table('users_codes')->find($userId);

            return view('auth.profile.2fa', [

            ]);
        } else {
            return redirect('/login');
        }
    }

}
