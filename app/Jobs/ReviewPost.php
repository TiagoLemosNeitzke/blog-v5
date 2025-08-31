<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewPost implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Post $post,
        public ?string $additionalInstructions,
    ) {}

    public function handle() : void
    {
        app(\App\Actions\ReviewPost::class)->review($this->post, $this->additionalInstructions);
    }
}
