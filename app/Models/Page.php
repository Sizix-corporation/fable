<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    protected $fillable=[
        'content',
        'book_id'
    ];
    /**
     * Get the book that owns the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}