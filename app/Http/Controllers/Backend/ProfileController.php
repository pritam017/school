<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image;
use File;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.view-profile', compact('user'));
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
        $id = Auth::user()->id;
        $edit = User::find($id);
        return view('admin.user.edit-profile', compact('edit'));
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
            'name' => 'required',
            'email' => 'required',
           ]);

        $edit = User::find(Auth::user()->id);
        $edit->name   = $request->name;
        $edit->email  = $request->email;
        if($request->password == $request->conpassword){
            $edit->password = bcrypt($request->password);
           }else{
               return redirect()->back()->with('error','Pasword Dose not match');
           }
        $edit->mobile = $request->mobile;
        $edit->address = $request->address;
        $edit->gender = $request->gender;
        $edit->status = $request->status;
        $image = $request->file('image');
        if(isset($image)){

                if(File::exists('uploads/user/'. $edit->image)){
                    File::delete('uploads/user/' . $edit->image);
                }
            $img =  time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('uploads/user/'. $img);
            Image::make($image)->save($location);
            $edit->image = $img;
        }
        $edit->save();
        return redirect()->route('profile.index')->with('success', 'Profile Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
