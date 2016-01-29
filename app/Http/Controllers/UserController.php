<?php

namespace App\Http\Controllers;

use App\UserFavorites;
use App\UserFollows;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner:username',["only" => ["getProfileEdit", "postProfileEdit"]]);
    }
    public function getProfile($username)
    {
        $user = User::where('username', '=', $username)->first();
        return view('user.profile', ['user' => $user]);
    }
    public function getProfileEdit()
    {
        return view('user.profileEdit');
    }
    public function postProfileEdit()
    {
        return view('user.profileEdit');
    }
    public function postFollow(Request $request)
    {
        if($request->input('toggle') == 'u'){
            $existanceCheck = UserFollows::where('user_id', '=', Auth::user()->id)->where('followed_id', '=', $request->input('user'))->count();
            if($existanceCheck){
                $follow = UserFollows::where('user_id', '=', Auth::user()->id)->where('followed_id', '=', $request->input('user'))->first();
                $follow->delete();
                $user = User::find($request->input('user'));
                $user ->follows--;
                $user->save();
                echo 'ok';
            }else{
                echo 'error';
            }
        }elseif($request->input('toggle') == 'f'){
            $existanceCheck = UserFollows::where('user_id', '=', Auth::user()->id)->where('followed_id', '=', $request->input('user'))->count();
            if(!$existanceCheck){
                $follow = new UserFollows();
                $follow->user_id = Auth::user()->id;
                $follow->followed_id = $request->input('user');
                $follow->save();
                $user = User::find($request->input('user'));
                $user ->follows++;
                $user->save();
                echo 'ok';
            }else{
                echo 'error';
            }
        }
    }
    public function postFavorite(Request $request)
    {
        if($request->input('toggle') == 'u'){
            $existanceCheck = UserFavorites::where('user_id', '=', Auth::user()->id)->where('favorited_id', '=', $request->input('user'))->count();
            if($existanceCheck){
                $follow = UserFavorites::where('user_id', '=', Auth::user()->id)->where('favorited_id', '=', $request->input('user'))->first();
                $follow->delete();
                $user = User::find($request->input('user'));
                $user ->favorites--;
                $user->save();
                echo 'ok';
            }else{
                echo 'error';
            }
        }elseif($request->input('toggle') == 'f'){
            $existanceCheck = UserFavorites::where('user_id', '=', Auth::user()->id)->where('favorited_id', '=', $request->input('user'))->count();
            if(!$existanceCheck){
                $follow = new UserFavorites();
                $follow->user_id = Auth::user()->id;
                $follow->favorited_id = $request->input('user');
                $follow->save();
                $user = User::find($request->input('user'));
                $user ->favorites++;
                $user->save();
                echo 'ok';
            }else{
                echo 'error';
            }
        }
    }

}
