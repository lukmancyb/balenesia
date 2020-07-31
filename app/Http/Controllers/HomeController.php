<?php

namespace App\Http\Controllers;

use App\Posts;
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
        $sub_title = 'Home';
        return view('home', compact('sub_title'));
    }

    public function show($id){
        $data = Posts::findorfail($id);

        return view('frontend.v_show', compact('data'));
    }
}
