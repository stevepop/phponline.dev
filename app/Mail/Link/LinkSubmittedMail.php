<?php declare(strict_types=1);

namespace App\Mail\Link;

use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LinkSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Link
     */
    public Link $link;

    /**
     * LinkSubmittedMail constructor.
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->subject("🙏 Thanks! Your link has been submitted to PHP Online")
            ->markdown('mails.links.submitted');
    }
}
