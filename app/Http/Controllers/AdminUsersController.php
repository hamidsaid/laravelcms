<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use Illuminate\Support\Facades\Session;



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

    //creates a session flash message
    Session::flash('user_created','Successfully Created');


    return redirect("admin/users");

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

        $user = User::findOrFail($id);
        $roles = Role::pluck('name' ,'id');

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //when user doesn't want too update the password
        if(trim($request->password) == ''){

            //Get all of the input except for a specified array of items.
            $input = $request->except('password');

        } else{

            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }

        //if photo exists
        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);


            $input['photo_id'] = $photo->id;
        }

        //now update
        $user->update($input);
        return redirect('/admin/users/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        //delete tyhe users image from the images directory
        unlink(public_path(). $user->photo->path);
        //show message
        //pass the data below to the subsecuent request i.e admin/users (user.index)
        Session::flash('deleted_user','The user has been deleted');


        return redirect('/admin/users');
    }
}
