<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;



class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //retieve

        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::all();
        //instead of the aboce , this pulls specific data in a collection/array format
        $roles = Role::pluck('name','id');
        return view('admin.users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        //persist data
        //User::create($request->all());
        //return redirect('/admin/users');

        //lets see if the photo_id is there
        // if($request->file('photo_id')){
        //     return "photo exists";
        // }

        $input = $request->all();

        //if there is a photo
         //$request->file('photo_id') returnsss C:\xampp\tmp\phpA16A.tmp

        if($file = $request->file('photo_id')){

        //concatinate time before the real name of the photo
        $photoName = time().$file->getClientOriginalName();
        //move to images folder in the public dir if not present make one
        $file->move('images',$photoName);
        $photo = Photo::create(['path' => $photoName]);
        //after persisiting data to photo table above, the attribute
        //of 'id' come to exist
        $input['photo_id'] = $photo->id;

        }

    $input['password'] = bcrypt($request->password);
    User::create($input);
    redirect('/admin/users');

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
        return view('admin.users.edit');
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
