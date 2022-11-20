<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Declare fillables of the Book model.
     */
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    /**
     * Get all the books for the author.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * Create full name attribute for easier display.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
