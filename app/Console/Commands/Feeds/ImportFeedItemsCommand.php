<?php declare(strict_types=1);

namespace App\Console\Commands\Feeds;

use App\Models\Feed;
use App\Models\FeedItem;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Laminas\Feed\Exception\ExceptionInterface;
use Laminas\Feed\Reader\Entry\AbstractEntry;
use Laminas\Feed\Reader\Reader;
use Laminas\Http\Client\Adapter\Exception\TimeoutException;

class ImportFeedItemsCommand extends Command
{
    protected $signature = 'feeds:import';

    protected $description = 'Import the latest feed items from each feed.';

    public function handle()
    {
        $this->info('Syncing feed items from profile feeds ...');

        $feeds = Feed::where('approved', true)->get();

        $feeds->each(function (Feed $feed) {
            try {
                $data = Reader::import($feed->url);

                foreach ($data as $entry) {
                    $item = FeedItem::updateOrCreate([
                        'url' => $entry->getLink(),
                    ], [
                        'title' => $this->sanitizeTitle($entry->getTitle()),
                        'published_at' => new Carbon($entry->getDateModified()->format(DATE_ATOM)),
                        'url' => $entry->getLink(),
                        'website' => $this->getWebsite($entry),
                        'feed_id' => $feed->id
                    ]);

                    $this->info("Imported `{$item->title}`");
                }
            } catch (ExceptionInterface | TimeoutException  $exception) {
                $this->error("Could not load {$feed->url}");
            }
        });
    }

    protected function sanitizeTitle(string $title): string
    {
        $title = ltrim($title, 'â˜… ');

        $title = htmlspecialchars_decode($title, ENT_QUOTES);

        return $title;
    }

    protected function getWebsite(AbstractEntry $entry): string
    {
        $host = parse_url($entry->getLink(), PHP_URL_HOST);

        $host = ltrim($host, 'www.');

        return $host;
    }
}
