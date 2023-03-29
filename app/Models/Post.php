<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searcho'] ?? false, function ($query, $search) {
            $query->where(
                fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );
            
        });
        $query->when(
            $filters['hatlycategory'] ?? false,
            fn($query, $catSlug) =>
            $query
                ->whereExists(fn($query) =>
                    $query->from('categories')
                        ->whereColumn('categories.id', 'posts.category_id')
                        ->where('categories.slug', $catSlug)
                )
        );
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author))
        );
    }
}