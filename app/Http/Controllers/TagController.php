<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tags::all();
        $sub_title = 'Tag';
        $lead = "Ini adalah halaman list untuk tag";
        return view('admin.tag.v_tag', compact('data', 'sub_title', 'lead'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    public function save(Request $request)
    {
        $post = Tags::create([
            'name' => $request->name,
            'slug'=> Str::slug($request->name)
        ]);

        if($post){
            return json_encode(
                array(
                    'success' => true,
                    'msg' => 'Success'
                )
            );
        }else{
            return json_encode(
                array(
                    'success' => false,
                    'msg' => 'Failed to save data'
                )
            );
        }
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
        //
        $data = Tags::findorfail($id);
        if($data){
            return json_encode(array(
                'success' => true,
                'data' => $data,
                'msg' => 'Successfully'
            ));
        }else{
            return json_encode(array(
                'success' => false,
                'msg' => "Data not found"
            ));
        }
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
        //
        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $update = Tags::whereId($id)->update($tag_data);
        // return json_encode($update);

        if($update){
            return json_encode(array(
                'success' => true,
                'msg' => "Data updated",
            ));
        }else{
            return json_encode(array(
                'success' => false,
                'msg' => "Failed to update data",
            ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_category = Tags::findorfail($id);

        $data_category->delete();

        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
}
