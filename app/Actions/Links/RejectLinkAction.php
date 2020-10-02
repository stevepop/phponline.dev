<?php declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Link;

class RejectLinkAction
{
    /**
     * @param Link $link
     * @return Link
     */
    public function execute(Link $link): Link
    {
        $link->update(['status' => Link::STATUS_REJECTED]);

        return $link;
    }
}
