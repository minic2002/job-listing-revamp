<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicantStatusNotification extends Notification
{
    use Queueable;

    protected $mail;
    protected $status;
    protected $jobListing;

    /**
     * Create a new notification instance.
     */
    public function __construct($mail, $status, $jobListing)
    {
        $this->mail = $mail;
        $this->status = $status;
        $this->jobListing = $jobListing;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Application Status')
                ->greeting('Hello ' . $this->mail . '.')
                ->line(
                    'Your application status to your job application on ' . $this->jobListing->company->name .
                    '. with a job title of ' . $this->jobListing->job_title .
                    ' has been updated to ' . $this->status . '.'
                );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
