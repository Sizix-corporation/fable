<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    /**
     * Get all of the story for the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stories(): HasMany
    {
        return $this->hasMany(Story::class, 'id');
    }

    /**
     * Get all of the book for the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'id');
    }
}