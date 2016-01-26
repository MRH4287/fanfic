<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function getList(){
        return view('series.list', ['currencies' => Series::all()]);
    }
    public function getEdit(){
        return view('series.edit', ['currencies' => Series::all()]);
    }
    public function postEdit(){

    }
    public function getAdd(){
        return view('series.add', ['currencies' => Series::all()]);
    }
    public function postAdd(){

    }
}
