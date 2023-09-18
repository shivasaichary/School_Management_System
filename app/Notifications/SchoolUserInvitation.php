<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Password;

class SchoolUserInvitation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $userName, public string $userRole)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = route('password.reset', [
            'token' => Password::createToken($notifiable),
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        $appName = config('app.name');

        $subject = __('You\'re invited to join :app as a :role', [
            'app'  => $appName,
            'role' => $this->userRole,
        ]);

        $greeting = __('Hello, :userName!', ['userName' => $this->userName]);

        $intro = __('You\'ve been invited to join :app as a :userRole. To get started, you need to set your password.', [
            'app'      => $appName,
            'userRole' => $this->userRole,
        ]);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line($intro)
            ->action(__('Set Password'), $url)
            ->line(__('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(__('If you didn\'t request this password reset, you can safely ignore this email.'))
            ->salutation(__('Thanks, :appName', ['appName' => $appName]));
    }
}
