<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Auth;
use DateTime;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Auth::user()->authorizeRoles(['user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()->paginate(20);
        return view('blog.home')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255|unique:posts',
            'short_content' => 'required',
            'content' => 'required',
            ]);

        $post = new Posts;
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->image = '';
        $post->posted_at = new DateTime();
        $post->save();
        session()->flash('message', 'Create successfully!');
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Posts::find($id);
        return view('blog.edit', compact('blog'));
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
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'short_content' => 'required',
            'content' => 'required',
            ]);

        $post = Posts::find($id);
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->image = '';
        $post->posted_at = new DateTime();
        $post->save();
        session()->flash('message', 'Update successfully!');
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        session()->flash('message', 'Delete successfully!');
        return redirect('blog');
    }
}
