<?php

namespace App\Listeners;

use App\Events\UserImported;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class SendEmailImportedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserImported $event): void
    {
        ResetPasswordNotification::toMailUsing(function (object $notifiable, string $token) {

            $url = url(route('password.import.set', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage())
                ->subject('Welcome to the Hills App')
                ->line(Lang::get('You are receiving this email because we imported a user with this email address.'))
                ->line(Lang::get(
                    'If you wish to use the site, please use the link to set a new password for your account.'
                ))
                ->action(Lang::get('Set Password'), $url)
                ->line(Lang::get(
                    'This password link will expire in :count minutes.',
                    [
                        'count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')
                    ]
                ))
                ->line(Lang::get('After this time you can use the forgot password link to set your password.'));
        });

        Password::sendResetLink([
            'email' => $event->user->email
        ]);
    }
}
