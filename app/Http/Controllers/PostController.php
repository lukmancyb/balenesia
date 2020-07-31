<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Posts::paginate(10);
        $sub_title = "Post";
        $lead = "Ini adalah halaman list Post";
        return view('admin.post.v_post', compact('data','sub_title', 'lead'));
        // return view('admin.post.v_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        $sub_title = "Create Post";
        $lead = "Ini halaman untuk menambah postingan";
        return view('admin.post.v_post_create', compact('category','sub_title', 'lead', 'tags'));
        // return view('admin.post.v_post_create2');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);


        $post = Posts::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $request->gambar,
            'status' => $request->status,
            'slug' => Str::slug($request->slug),
            'users_id' => Auth::id()
        ]);
        $post->tags()->attach($request->tags);

        return redirect()->back()->with('success', 'Berhasil tambah data');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = Category::all();
        $posts = Posts::findorfail($id);
        $tags = Tags::all();
        $sub_title = "Edit Post";
        $lead = "Ini halaman untuk mengubah postingan";
        return view('admin.post.v_post_edit', compact('category','sub_title', 'lead', 'tags', 'posts'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);
      

        $post = Posts::findorfail($id);

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            if(File::exists($post->gambar)) {
                File::delete($post->gambar);
            }
             $gambar->move('public/uploads/posts/', $new_gambar);
             $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uploads/posts/'.$new_gambar,
                'status' => $request->status,
                'slug' => Str::slug($request->slug)
            ];

        }else{
            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'status' => $request->status,
                'slug' => Str::slug($request->slug)
            ];
        }

    
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return redirect('post')->with('success', 'Berhasil Update data');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {

        $post = Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus');
        //
    }

    public function trashedPost(){

        $sub_title = "Trashed Post";
        $lead = "Ini halaman list trashed post";

        $data = Posts::onlyTrashed()->paginate(10);

        return view('admin.post.v_trashed_post', compact('sub_title', 'lead', 'data'));
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post berhasil di restore');
    }

    public function kill($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        if(File::exists($post->gambar)) {
            File::delete($post->gambar);
        }
        $post->forceDelete();
        return redirect()->back()->with('success', 'Post dihapus permanen');

    }
}
