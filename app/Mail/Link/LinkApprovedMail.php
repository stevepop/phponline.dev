<?php

namespace App\Mail\Link;

use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LinkApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Link
     */
    public Link $link;

    /**
     * LinkApprovedMail constructor.
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->subject("🎉 Congrats! Your Link has been approved on PHP Online")
            ->markdown('mails.links.approved');
    }
}
