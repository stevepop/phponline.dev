<?php declare(strict_types=1);

namespace App\Actions\Articles;

use App\Jobs\Articles\SendArticleTweetJob;
use App\Models\Article;

class PublishArticleAction
{
    /**
     * @param Article $article
     */
    public function execute(Article $article)
    {
        $article->published = true;

        if (! $article->publish_date) {
            $article->publish_date = now();
        }

        $article->save();

        $this->sendTweet($article);

        // Clear Cache
    }

    /**
     * @param Article $article
     */
    private function sendTweet(Article $article)
    {
        if (! $article->send_automated_tweet) {
            return;
        }

        if ($article->tweet_sent) {
            return;
        }

        dispatch(new SendArticleTweetJob($article));

        $article->tweet_sent = true;

        $article->save();
    }
}
