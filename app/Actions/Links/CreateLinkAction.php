<?php declare(strict_types=1);

namespace App\Actions\Links;

use App\Mail\Link\LinkSubmittedMail;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CreateLinkAction
{
    /**
     * @param array $attributes
     * @param User $user
     */
    public function execute(array $attributes, User $user): void
    {
        $link = Link::create([
            'title' => $attributes['title'],
            'url' => $attributes['url'],
            'body' => $attributes['body'] ?? '',
            'user_id' => $user->id
        ]);

        Mail::to(config('phponline.email.admin'))->queue(new LinkSubmittedMail($link));
    }
}
