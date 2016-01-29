<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model{
    protected $table = 'bookmarks';

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function series(){
        return $this->belongsTo('App\Series', 'series_id', 'id');
    }
}
