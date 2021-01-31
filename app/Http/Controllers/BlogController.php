<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(){

        $app_title = "Balenesia - Web Untuk Belajar Teknologi dan Pemrogramman";
        $data = Posts::where('status',1)->paginate(9);
        return view('frontend.index', compact('data', 'app_title'));

    }

    public function show($slug){

        $data = Posts::where('slug',$slug)->get();
        
        if($data->count() > 0){
            $data = $data->first();
        }else{
            return view('frontend.notfound.v_notfound');
        }
        


        return view('frontend.v_detail', compact('data'));
    }

    public function tutorials(){
        return view('frontend.tutorial.v_tutorial');
    }
}
