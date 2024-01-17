<?php

namespace App\Mail;

use App\Models\User;
use App\Models\BaiDang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobRequestApproval extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private BaiDang $job;
    private bool $trangThai;

    /**
     * Create a new message instance.
     */
    public function __construct($job, $user, $trangThai)
    {
        $this->user = $user;
        $this->job = $job;
        $this->trangThai = $trangThai;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->trangThai ? 'Ứng tuyển công việc thành công' : 'Ứng tuyển công việc bị từ chối',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->trangThai ? 'mails.job-apply-approved' : 'mails.job-apply-rejected',
            with: [
                'user' => $this->user,
                'job' => $this->job
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
