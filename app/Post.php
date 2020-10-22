<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
       protected $fillable = [
        'title', 'body',  'slug', 'user_id', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
        public function posts(){
        return $this->belongsToMany('App\Tag');
    }
}
