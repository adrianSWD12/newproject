<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    //protected $fillable = ['title', 'excerpt', 'body']
    protected $guarded;
    use HasFactory;


    public function path()
    {

        return route('articles.show', $this);
    }

    public function author()
    {

        return $this->belongsto(user::class, 'user_id');
    }

    public function tags()
    {

        return $this->belongstoMany(Tag::class);
    }




    //public function getRouteKeyName()
    //{
    //  return 'slug'; //
    //}

}
