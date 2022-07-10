<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(trans('mail.verifyEmail'))
                ->line(trans('mail.clickButton'))
                ->action(trans('mail.verifyEmail'), $url);
        });

        ResetPassword::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(trans('mail.resetPasswordNotification'))
                ->line(trans('mail.passwordResetRequest'))
                ->action(trans('mail.passwordReset'), $url)
                ->line(trans('mail.passwordResetLink', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->line(trans('mail.notRequestPasswordReset'));
        });
    }
}
