<?php

namespace App\Http\Controllers;

use File;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $path = public_path('uploads');
        $files = $request->file('files');

        if(isset($files)) {

            $array = [];

            $files = is_array($files) ? $files : array($files);

            foreach((array) $files as $file) {

                $name = hash('md5', $file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

                // create folder
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $file->move($path, $name);

                $filename = $path.'/'.$name;

                $array[] .= $filename;
            }

            $details = [
                'files' => $array
            ];
        } else {
            $details = [
                'files' => null
            ];
        }

        try {
            Mail::to([config('mail.body.info_email')])->cc($request->email)->send(new Contact($details));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with(['success' => 'Mail sent successfully.']);
    }
}
