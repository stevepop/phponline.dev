<?php declare(strict_types=1);

namespace App\Actions\Links;

use App\Mail\Link\LinkApprovedMail;
use App\Models\Link;
use Illuminate\Support\Facades\Mail;

class ApproveLinkAction
{
    /**
     * @param Link $link
     * @return Link
     */
    public function execute(Link $link): Link
    {
        if ($link->isApproved()) {
            return $link;
        }

        Mail::to($link->user->email)->queue(new LinkApprovedMail($link));

        $link->update([
            'status' => Link::STATUS_APPROVED,
            'publish_date' => now(),
        ]);

        // Flush Cache

        return $link;
    }
}
