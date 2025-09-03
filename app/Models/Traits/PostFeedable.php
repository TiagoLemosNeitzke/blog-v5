<?php

namespace App\Models\Traits;

use Spatie\Feed\FeedItem;
use App\Markdown\Markdown;
use Illuminate\Support\Collection;

/**
 * @mixin \App\Models\Post
 */
trait PostFeedable
{
    public static function getFeedItems() : Collection
    {
        return static::query()
            ->published()
            ->whereDoesntHave('link')
            ->latest('published_at')
            ->limit(50)
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        $link = route('posts.show', $this);

        return FeedItem::create()
            ->id($this->slug)
            ->title($this->title)
            ->summary(Markdown::parse($this->description . <<<MARKDOWN

[Read more →]($link)

If you like my feed, follow me on [X](https://x.com/benjamincrozat), [LinkedIn](https://www.linkedin.com/in/benjamincrozat/), and [GitHub](https://github.com/benjamincrozat).
MARKDOWN ?? ''))
            ->updated($this->modified_at ?? $this->published_at)
            ->link($link)
            ->authorName($this->user->name);
    }
}
