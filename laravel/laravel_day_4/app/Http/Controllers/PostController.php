<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use DB;

class PostController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::all();  // Get all recode for table.

        // Give order by on particuler field and give order value.
        // $posts = Post::orderBy('title', 'desc')->get();

        // Take first of number of data using below commend
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        // Pagination with data
        // $posts = Post::orderBy('title', 'desc')->paginate(1);

        // Where fucation use with collon name.
        // $posts = Post::where('title', 'Post two')->get();

        // Use raw sql query direct using DB lib.
        // $posts = DB::select('select * from posts');
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);
        echo $request;
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get file with extention
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just file name.
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extention.
            $extention = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Insert Post data in table
        $post = new Post;
        $post-> title = $request->input('title');
        $post-> body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post-> user_id = auth()->user()->id;
        $post-> save();

        return redirect('/posts')->with('success', 'Post Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        // login user not create post user that time redirect to post page with error message.
        if(auth()->user()->id !== $posts->user_id){
            return redirect('/posts')-> with('error', 'Unauthorized page.');
        }
        return view('posts.edit')->with('posts', $posts);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get file with extention
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just file name.
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extention.
            $extention = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Insert Post data in table
        $post = Post::find($id);
        $post-> title = $request->input('title');
        $post-> body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post-> save();

        return redirect('/posts')->with('success', 'Post Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')-> with('error', 'Unauthorized page.');
        }

        if($post->cover_image !== 'noimage.jpg'){
            Storage::delete('public/cover_images'.$post->cover_image);
        }

        $post-> delete();
        return redirect('/posts')->with('success', 'Post Remove.');
    }
}
