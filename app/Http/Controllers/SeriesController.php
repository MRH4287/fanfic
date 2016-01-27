<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Series_Characters;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function getList(){
        return view('series.list', ['series' => Series::with('characters')->get()]);
    }
    public function getAdd(){
        return view('series.add', ['currencies' => Series::all()]);
    }
    public function postAdd(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:series|max:255',
            'characters' => 'array',
            'characters.*' => 'string'
        ]);

        $series = new Series();
        $series->name = $request->input('name');
        $series->save();

        if(!empty($request->input('characters'))){
            $characters = array_unique($request->input('characters'));
            foreach($characters as $c){
                $character = new Series_Characters();
                $character->series_id = $series->id;
                $character->name = $c;
                $character->save();
            }
        }

        return redirect()->action('SeriesController@getList');

    }
    public function getEdit($id){
        $series = Series::find($id);
        return view('series.edit', ['series' => $series]);
    }
    public function postEdit(Request $request){

        $this->validate($request, [
            'id' => 'required|numeric|exists:series',
            'name' => "required|unique:series,name,{$request->input('id')},id|max:255",
            'characters' => 'array',
            'characters.*' => 'string'
        ]);

        $series = Series::find($request->input('id'));
            $series->name = $request->input('name');
            $series->save();
        if(!empty($request->input('characters'))){
            Series_Characters::where("series_id",'=', $series->id)->whereNotIn("name", $request->input('characters'))->delete();
            foreach($request->input('characters') as $c){
                $character = Series_Characters::where("series_id",'=', $series->id)->where("name",'=', $c)->first();
                if(empty($character)){
                    //As of now if the character exists, there is nothing to update. This may change over time
                    $character = new Series_Characters();
                    $character->series_id = $series->id;
                    $character->name = $c;
                    $character->save();
                }

            }
        }
        return redirect()->action('SeriesController@getList');
    }
}
