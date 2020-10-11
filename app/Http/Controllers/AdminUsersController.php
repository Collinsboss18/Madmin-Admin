<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
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
        //
        $users = User::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.index', compact('users', 'roles'));
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
     * @param  \Illuminate\Http\UsersRequest  $request
     * @return \Illuminate\Http\UsersResponse
     */
    public function store(UsersRequest $request)
    {
        //
        $input = $request->all();

        if($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $photo = $request->file('photo');
                $name = time().'_'.$photo->getClientOriginalName();
                $photo->move('img/users', $name);
                $c_photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $c_photo->id;
            }
        };
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect()->back();
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
