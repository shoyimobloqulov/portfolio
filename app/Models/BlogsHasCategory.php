<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsHasCategory extends Model
{
    use HasFactory;
    protected $fillable=['blogs_id','category_id'];
}
