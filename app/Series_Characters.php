<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Series;

class Series_Characters extends Model
{
    protected $table = 'series_characters';

    public function series()
    {
        return $this->belongsTo('App\Series', 'series_id', 'id');
    }
}
