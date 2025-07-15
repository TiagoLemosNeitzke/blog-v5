<?php

namespace App\Models;

use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<CommentFactory> */
    use HasFactory, SoftDeletes;

    protected $with = [
        'user',
        'children',
        'children.user',
    ];

    protected function casts() : array
    {
        return [
            'modified_at' => 'datetime',
        ];
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children() : HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function deleteWithChildren() : self
    {
        $this->children->each(
            fn (Comment $comment) => $comment->deleteWithChildren()
        );

        $this->delete();

        return $this;
    }
}
