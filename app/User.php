<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\UserFollows;
use App\UserFavorites;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function hasRole($role){
        return $this->role == $role;
    }
    public function isOwner($username){
        return $this->username == $username;
    }

    public function bookmarks(){
        return $this->hasMany('App\Bookmark', 'series_id', 'id');
    }
    public function isFollowing(){
        return $this->hasMany('App\UserFollows', 'user_id', 'id');
    }
    public function isFavoriting(){
        return $this->hasMany('App\UserFavorites', 'user_id', 'id');
    }
    public function isFollowed(){
        return $this->hasMany('App\UserFollows', 'followed_id', 'id');
    }
    public function isFavorited(){
        return $this->hasMany('App\UserFavorites', 'favorited_id', 'id');
    }
    public function askIsFollowing($user){
        $res = UserFollows::where('user_id','=', Auth::user()->id)->where('followed_id', '=', $user->id)->count();
        return ($res > 0);
    }
    public function askIsFavoriting($user){
        $res = UserFavorites::where('user_id','=', Auth::user()->id)->where('favorited_id', '=', $user->id)->count();
        return ($res > 0);
    }
    /* Possibly necessary in the future
     *
     * public function askIsFollowed($user){
    }
    public function askIsFavorited($user){
    }*/
}
