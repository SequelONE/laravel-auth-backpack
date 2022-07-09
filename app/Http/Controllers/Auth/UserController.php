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
use Creativeorange\Gravatar\Gravatar;
use App\Models\UserCode;
use App\Models\User;
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

    /**
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function profile()
    {
        if($this->userAuth()) {
            $email = Auth::user()->email;
            $gravatar = (new \Creativeorange\Gravatar\Gravatar)->get($email, 'default');
            return view('auth.profile.index', compact('gravatar'));
        } else {
            return redirect('/login');
        }
    }

    public function profileUpdate(Request $request)
    {
        if($this->userAuth()) {
            $request->validate([
                'name' =>'required|min:4|string|max:255',
                'email'=>'required|email|string|max:255',
            ]);
            $user = Auth::user();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return back()->with('success', trans('profile.profileUpdated'));
        } else {
            return redirect('/login');
        }
    }

    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('uploads/avatars/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid('', true) . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        $saveFile = Auth::user();

        if(isset($saveFile->avatar)) {
            unlink($saveFile->avatar);
            $saveFile->avatar = 'uploads/avatars/' . $imageName;
            $saveFile->save();
        } else {
            $saveFile->avatar = 'uploads/avatars/' . $imageName;
            $saveFile->save();
        }

        return response()->json(['success' => trans('profile.cropImageUploaded')]);
    }

    public function deleteImage()
    {
        $deleteFile = Auth::user();

        unlink($deleteFile->avatar);

        $deleteFile->avatar = NULL;
        $deleteFile->save();

        return response()->json(['success' => trans('profile.avatarDeletedSuccess')]);
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
