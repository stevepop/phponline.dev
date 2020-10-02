<?php declare(strict_types=1);

namespace App\Console\Commands\Articles;

use App\Actions\Articles\PublishArticleAction;
use App\Models\Article;
use Illuminate\Console\Command;

class PublishScheduledArticlesCommand extends Command
{
    protected $signature = 'blog:publish-scheduled';

    protected $description = 'Publish all scheduled articles from the blog';

    public function handle(PublishArticleAction $action)
    {
        Article::scheduled()->get()
            ->reject(fn(Article $article) => $article->publish_date->isFuture())
            ->each(fn(Article $article) => $action->execute($article));
    }
}
