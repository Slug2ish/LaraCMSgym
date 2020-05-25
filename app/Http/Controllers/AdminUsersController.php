<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        //for DB::table include use Illuminate\Support\Facades\DB; on the top
        //pluck(key,value)
        $roles = DB::table('roles')->pluck('name','id');
        $roles = ['0'=>'Choose Options'] + collect($roles)->toArray();

        $active = DB::table('users')->pluck('is_active');
        $active = ['0'=>'Not Active', '1'=>'Active']; 
        
        // + collect($active)->toArray();

        return view('admin.users.create', compact('roles','active'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        // User::create($request->all()); 


        // $user = new User();

        // if($request->hasFile('cover_image')){

        //     $fileNameWithExtension = $request->file('photo_id')->getClientOriginalName();
        //     $filename = pathinfo($fileNameWithExtension.PATHINFO_FILENAME);
        //     $ext = $request->file('photo_id')->getClientOriginalExtension();
        //     $fileNameToStore = $filename.'_'.time().'.'.$ext;
        //     $path = $request->file('photo_id')->storeAs('public/images',$fileNameTOStore);
        // }

        // else
        //     $fileNameTOStore = 'noimg.png'
        
        // $user->photo_id = $fileNameToStore;
        // $user->save();


        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{
            $input['password'] = bcrypt($request->password);
        }

        User::create($input);

        Session::flash('created_user','The user has been created');

        return redirect('admin/users');

        // return $request->all();
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
        return view('admin.users.show');
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

        $user = User::findOrFail($id);

        $roles = DB::table('roles')->pluck('name','id');
        // $roles = ['0'=> $user->role->name] + collect($roles)->toArray();
        $roles = ['0'=> !empty($user->role) ? $user->role->name:''] + collect($roles)->toArray();

        $active = DB::table('users')->pluck('is_active','id');
        $active =[ $user->is_active == 1 ? 'Active': 'Not Active','0'=>'Not Active', '1'=>'Active'];
       
        return view('admin.users.edit', compact('user','roles','active'));
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
        //
        $user = User::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){

            // save the new photo into the public folder
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);

            // delete the previous profile picture from database as well as public folder
            $photo_delete_in_project =  public_path(). "/images/" . $user->photo->file;        

            unlink($photo_delete_in_project);

            $photo_delete_in_db = Photo::findOrFail($user->photo_id);

            $photo_delete_in_db->delete();

            // insert the new photo file name into photo table and photo_id in user table
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

            // $file = $request->file('photo_id');
            
            // $name = time().$file->getClientOriginalName();
            // $file->move('images',$name);

            // $photo = Photo::create(['file'=>$name]);
            // $input['photo_id'] = $photo->id;

            // this below gives error when password is not entered and photo is chosen
            // if(trim($request->password) == ''){

            // $input = $request->except('password');

            // trying to retrieve the old value , proble in decrypt
            // $old = old($request->password);
            // $input['password'] = decrypt($old);

            // $input['password'] = old($request->password);
            // }
            // else{
            //     $input['password'] = bcrypt($request->password);
            // }

        $input['password'] = bcrypt($request->password);



        $user->update($input);

        Session::flash('edited_user','The user has been updated');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        // unlink(public_path(). "/images/" . $user->photo->file);

        $photo_delete_in_project =  public_path(). "/images/" . $user->photo->file;        

        unlink($photo_delete_in_project);

        $photo_delete_in_db = Photo::findOrFail($user->photo_id);

        $photo_delete_in_db->delete();

        $user->delete();

        Session::flash('deleted_user','The user has been deleted');

        return redirect('admin/users');

    }

}
