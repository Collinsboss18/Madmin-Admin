<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all()->count();
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $roles = Role::pluck('name', 'id')->all();
        $category = Category::pluck('name', 'id')->all();
        return view('admin.index', compact(['users', 'posts', 'categories', 'roles', 'category']));
    }

}
