<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostsRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        $category = Category::pluck('name', 'id')->all();
        return view('admin.posts.index', compact(['posts', 'category']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();

        if($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $photo = $request->file('photo');
                $name = time().'_'.$photo->getClientOriginalName();
                $photo->move('assets/img', $name);
                $c_photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $c_photo->id;
            }
        };
        Post::create($input);
        $request->session()->flash('msg', 'Created new post successful');
        return redirect()->back();
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
        $post = Post::findOrFail($id);
        $category = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact(['post', 'category']));
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
        $rules = [
            'title'=>'required',
            'category_id'=>'required',
            'body'=>'required'
        ];
        $this->validate($request, $rules);

        $user = Post::findOrFail($id);
        $input = $request->all();
        $input['user_id'] = Auth::id();

        if($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $photo = $request->file('photo');
                $name = time().'_'.$photo->getClientOriginalName();
                $photo->move('assets/img', $name);
                $c_photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $c_photo->id;
            }
        }
        $user->update($input);
        $request->session()->flash('msg', 'Post update successful');
        return redirect()->back();
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
        $post = Post::findOrFail($id);
        unlink(public_path().$post->photo->file);
        $post->delete();
        return redirect('/admin/posts');
    }
}
