<?php

namespace App\Http\Controllers;

use App\AllPizza;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function index2()
    {
        $users = User::all();
        return view('showUsers',compact('users'));
    }


    function view()
    {
        $pizza = AllPizza::all();
        return view('/home',['pizza'=>$pizza]);
    }
}
