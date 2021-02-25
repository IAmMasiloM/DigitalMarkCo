<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

      //  $users = User::orderBy('id', 'desc')->paginate(5);
        $users = User::all();
        return view('home')->withUsers($users);
    }

     public function show($id)
    {
        //
        $user = User::find($id);

        return view('profile.edit')->withUser($user);
    }
}
