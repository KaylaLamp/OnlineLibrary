<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Book extends Model
{
    use HasFactory;

    /**
     * Declare fillables of the Book model.
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get all the books for an author.
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
