<?php declare(strict_types=1);

namespace App\Services\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter
{
    /**
     * @var TwitterOAuth
     */
    private TwitterOAuth $twitter;

    /**
     * Twitter constructor.
     * @param TwitterOAuth $twitter
     */
    public function __construct(TwitterOAuth $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @param string $status
     * @return array
     */
    public function tweet(string $status): array
    {
        if (! app()->environment('production')) {
            return;
        }

        return (array) $this->twitter->post('statuses/update', compact('status'));
    }
}
