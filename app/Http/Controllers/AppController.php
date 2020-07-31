<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index(){

        $data = Posts::paginate(9);
        return view('frontend.index', compact('data'));

    }

    public function show($id){
        $data = Posts::findorfail($id);

        return view('frontend.v_show', compact('data'));
    }
}
