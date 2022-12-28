<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Star;
use App\Models\User;
use App\Models\Comment;
use App\Models\StarStory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
      * Get all of the starStory for the Story
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function star_stories(): HasMany
     {
         return $this->hasMany(StarStory::class, 'story_id','id');
     }


    
}