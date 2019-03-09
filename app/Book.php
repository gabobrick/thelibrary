<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Support\CustomQueryBuilder;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'publishedDate', 'user_id'];

    use CustomQueryBuilder;

    public function categories()
    {
    	return $this->belongsToMany(Category::class, 'categories_books', 'book_id', 'category_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}