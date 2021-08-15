<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable=['content','group_id','creator_id'];

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }
}
