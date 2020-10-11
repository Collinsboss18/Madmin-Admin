<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                $photo->move('assets/img/users', $name);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggleActive(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if ($user->is_active !== null) {
            $user->is_active > 0 ? $user->is_active = 0 : $user->is_active = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function toggleAdmin(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if ($user->role_id !== null) {
            $user->role_id !== 1 ? $user->role_id = 1 : $user->role_id = 2;
        }
        $user->save();
        return redirect()->back();
    }
}
