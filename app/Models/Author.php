<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'created_at',
        'updated_at'
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
