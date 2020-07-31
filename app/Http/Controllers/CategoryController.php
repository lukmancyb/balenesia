<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        $sub_title = 'Category';
        $lead = "Ini adalah halaman list untuk kategori";
        return view('admin.category.v_category', compact('data', 'sub_title', 'lead'));
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function save(Request $request)
    {
        $post = Category::create([
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
        $data = Category::findorfail($id);
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
        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $update = Category::whereId($id)->update($category_data);

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
        $data_category = Category::findorfail($id);

        $data_category->delete();

        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
}
