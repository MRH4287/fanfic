<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Series_Characters;
class Series extends Model
{
    public function getNcharactersAttribute(){
       return  Series_Characters::where('series_id', '=', $this->id)->count();
    }
    public function characters(){
        return $this->hasMany('App\Series_Characters', 'series_id', 'id');
    }
}
