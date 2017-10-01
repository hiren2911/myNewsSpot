<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public $fillable = ['title', 'image', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
