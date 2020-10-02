<?php declare(strict_types=1);

namespace App\Jobs\Articles;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendArticleTweetJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @var Article|object
     */
    public object $article;

    /**
     * SendArticleTweetJob constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @param Twitter $twitter
     */
    public function handle(Twitter $twitter)
    {
        $twitterHandle = config('phponline.twitter.handle');
        $tweetText = $this->article->toTweet();

        $tweetResponse = $twitter->tweet($tweetText);

        $tweetUrl = "https://twitter.com/{$twitterHandle}/status/{$tweetResponse['id_str']}";

        $this->article->onAfterTweet($tweetUrl);
    }
}
