<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table(key: 'post_id')]
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'body'];
    
}
