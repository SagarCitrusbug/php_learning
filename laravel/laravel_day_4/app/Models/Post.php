<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Change table name 
    protected $table = 'posts';
    // Primary key 
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
