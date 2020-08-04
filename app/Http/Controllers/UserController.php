<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::paginate(10);
        $sub_title = 'Users List';
        $lead = 'Ini adalah halaman untuk manajemen user';
        return view('admin.users.v_user', compact('sub_title', 'lead', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_title = 'Users Add';
        $lead = 'Ini adalah halaman untuk tambah user';

        return view('admin.users.v_user_create', compact('sub_title', 'lead'));

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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);

        $emailExist = User::where('email', $request->email)->exists();
        // dd($emailExist);

        if($emailExist){
            return redirect()->back()->with('error', 'User dengan email tersebut sudah ada');
        }else{
            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gambar' => $request->gambar,
                'type' => $request->type
            ]);

            return redirect()->back()->with('success', 'User Berhasil ditambahkan');
        }
        // dd($request->all());
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
        $data = User::findorfail($id);
        $sub_title = 'Users Edit';
        $lead = 'Ini adalah halaman untuk Edit user';
        return view('admin.users.v_user_edit', compact('sub_title', 'lead', 'data'));


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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);

        $user = User::findorfail($id);

        if($request->has('password')){
            $request_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gambar' => $request->gambar,
                'type' => $request->type
            ];
        }else{
            $request_data = [
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'gambar' => $request->gambar

            ];
        }

        $user->update($request_data);
        return redirect()->back()->with('success', 'Data user berhasil di ubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return redirect()->back()->with('success', 'Data user berhasil di hapus');

        //
    }
}
