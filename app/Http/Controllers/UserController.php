<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProfile()
    {
        return view('user.profile');
    }
    public function getProfileEdit()
    {
        return view('user.profile');
    }
    public function postProfileEdit()
    {
        return view('user.profile');
    }

}
