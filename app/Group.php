<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function users()
    {
        return $this->belongsToMany(User::class.'group_user');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}   
