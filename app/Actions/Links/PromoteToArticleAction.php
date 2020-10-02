<?php declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Article;
use App\Models\Link;
use Illuminate\Support\Str;

class PromoteToArticleAction
{
    /**
     * @param Link $link
     * @return Article
     */
    public function execute(Link $link): Article
    {
        return Article::create([
            'submitted_by_user_id' => $link->user_id,
            'title' => $link->title,
            'excerpt' => Str::limit($link->body, 200),
            'body' => $link->body,
            'external_url' => $link->url,
            'published' => false
        ]);
    }
}
