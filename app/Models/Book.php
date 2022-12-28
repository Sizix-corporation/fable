<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Star;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'subtitle',
        'user_id',
        'tag_id',
    ];
    /**
     * Get the tag that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get all of the page for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Pages::class, 'id');
    }
    /**
     * Get all of the star for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stars(): HasMany
    {
        return $this->hasMany(Star::class, 'id');
    }
}