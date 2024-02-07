<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'excerpt', 'category_id', 'slug', 'user_id', 'thumbnail'
    ];

    // implementation of eager loading
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters){
        // it is a filter method which allows the user to search for specific text
        // there are two parameters which one ($query) sent by laravel
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query)=>
                $query->where('title', 'like', '%'.  $search . '%')
                    ->orWhere('body', 'like', '%'.  $search . '%')
                )
            );

            // filter for specific category
            // 1: find all posts where posts.category_id = category_id
            // 2: where category_slug = $category
        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            ));

        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query) =>
                $query->where('user_name', $author)
            ));
        }
    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function author(){
        // by this way we set the foriegn key to user_id
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
