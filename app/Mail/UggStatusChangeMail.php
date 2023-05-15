<?php

namespace App\Mail;

use App\Models\UggCity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UggStatusChangeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $subject = "Status Change";
        if ($this->user->status == 'in_process') {
            $subject = __("status-messages.in_process_subject");
        }
        if ($this->user->status == 'selected_second_phase') {
            $subject = __("status-messages.selected_second_phase_subject");
        }
        if ($this->user->status == 'not_selected_second_phase') {
            $subject = __("status-messages.not_selected_second_phase_subject");
        }
        if ($this->user->status == 'documents_under_verification') {
            $subject = __("status-messages.documents_under_verification_subject");
        }
        if ($this->user->status == 'registered_for_the_exam') {
            $subject = __("status-messages.registered_for_the_exam_subject");
        }
        if ($this->user->status == 'rejected') {
            $subject = __("status-messages.rejected_subject");
        }
        if ($this->user->status == 'selected') {
            $subject = __("status-messages.selected_subject");
        }
        if ($this->user->status == 'not_selected') {
            $subject = __("status-messages.not_selected_subject");
        }
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {

        $city = UggCity::find($this->user->ugg_form->ugg_city);

        return new Content(
            markdown: 'emails.ugg-status-change-mail',
            with: [
                'user' => $this->user,
                'city' => $city,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        if ($this->user->status == 'selected_second_phase' && isset($this->user->pdf_path)) {
            return [
                Attachment::fromPath($this->user->pdf_path)
            ];
        } else {
            return [];
        }
    }

    public function failed()
    {
        $failed_report = [
            'mail_subject' => 'KODREAMS Status Change',
            'mail_user_firstname' => $this->user->firstname,
            'mail_user_lastname' => $this->user->lastname,
            'mail_user_email' => $this->user->email,
        ];
        Mail::to(config('mail.to.admin_kodreams'))->cc(config('mail.to.dev'))->send(new SendFailedMailToAdmin($failed_report));
    }
}
