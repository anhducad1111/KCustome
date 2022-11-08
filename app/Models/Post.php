<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_content',
        'post_image',
        'user_id',
        'category_id'
    ];
    public function categories() {
        // return $this->belongsTo(Category::class);
        return $this->belongsToMany(Category::class,'posts','id','category_id');
    }
    public function user() {
        // return $this->belongsTo(User::class);
        return $this->belongsToMany(User::class,'posts','id','user_id');
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
