<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait; // <------------------------------- this one
//use Backpack\CRUD\app\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFollow\Followable;

class User extends Authenticatable implements MustVerifyEmail
{
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        if(Auth::check() === true) {
            $email = Auth::user()->email;
        } else {
            $email = request()->post('email');
        }
        $url = config('app.url') . 'password/reset/'.$token.'?email=' . $email;

        $this->notify(new ResetPasswordNotification($url));
    }

    public function avatar() {
        $avatar = Auth::user()->avatar;
        if($avatar === NULL) {
            return (new \Creativeorange\Gravatar\Gravatar)->get(Auth::user()->email, 'default');
        }
        return $avatar;
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function loginSecurity()
    {
        return $this->hasOne(LoginSecurity::class);
    }

    public function abbr($input = 0) {
        $abbreviations = [12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => ''];
        foreach($abbreviations as $exponent => $abbreviation) {
            if($input >= (10 ** $exponent)) {
                return round(floatval($input / (10 ** $exponent)),1).$abbreviation;
            }
        }
    }

    public function border($count = 0) {
        $statuses = [
            15 => '10000000000000000',
            14 => '1000000000000000',
            13 => '100000000000000',
            12 => '10000000000000',
            11 => '1000000000000',
            10 => '100000000000',
            9 => '10000000000',
            8 => '1000000000',
            7 => '100000000',
            6 => '10000000',
            5 => '1000000',
            4 => '100000',
            3 => '10000',
            2 => '1000',
            1 => '100',
            0 => '10'
        ];
        foreach($statuses as $exponent => $step) {
            if($count >= (10 ** $exponent)) {
                $border = $step - $count;
                $percent = round(($count / $step) * 100, 2);
                return [
                    'border' => $border,
                    'percent' => $percent
                ];
            }
        }
    }
}
