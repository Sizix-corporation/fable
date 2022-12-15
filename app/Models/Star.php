<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Star extends Model
{
    use HasFactory;
    protected $fillable=['user_id'];
    /**
     * Get the story that owns the Star
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stories(): BelongsTo
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
    /**
     * Get the book that owns the Star
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}