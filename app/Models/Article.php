<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\CanBeClicked;
use Spatie\Tags\Tag;
use Spatie\Tags\HasTags;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use App\Models\Builders\ArticleBuilder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\CreatesPreviewSecret;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements Sluggable
{
    use HasSlug;
    use HasTags;
    use HasFactory;
    use SoftDeletes;
    use CanBeClicked;
    use CreatesPreviewSecret;

    /**
     * @var string
     */
    public const BEGINNER = 'beginner';

    /**
     * @var string
     */
    public const INTERMEDIATE = 'intermediate';

    /**
     * @var string
     */
    public const ADVANCED = 'advanced';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'external_url',
        'tweet_url',
        'level',
        'published',
        'send_automated_tweet',
        'tweet_sent',
        'preview_secret',
        'submitted_by_user_id',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'published' => 'boolean',
        'send_automated_tweet' => 'boolean',
        'tweet_sent' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function submittedByUser(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'submitted_by_user_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
        );
    }

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function toTweet(): string
    {
        $tags = $this->tags->map(fn(Tag $tag) => $tag->name)
            ->map(fn(string $tagName) => '#' . str_replace(' ', '', $tagName))
            ->implode(' ');

        return $this->title . PHP_EOL . $this->promotional_url . PHP_EOL . $tags;
    }

    public function onAfterTweet(string $tweetUrl): void
    {
        $this->tweet_url = $tweetUrl;

        $this->save();
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return ArticleBuilder
     */
    public function newEloquentBuilder($query): ArticleBuilder
    {
        return new ArticleBuilder($query);
    }
}
