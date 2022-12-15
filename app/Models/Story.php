<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Star;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'user_id',
        'tag_id',
    ];
    /**
     * Get all of the comments for the Story
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id');
    }
    /**
     * Get the user that owns the Story
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the tag that owns the Story
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    /**
     * Get all of the star for the Story
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stars(): HasMany
    {
        return $this->hasMany(Star::class, 'id');
    }
}