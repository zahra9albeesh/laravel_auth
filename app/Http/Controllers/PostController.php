<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Taq;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Taq::all();
        $post = Post::orderBy('created_at' , 'DESC')->get();
        return view('post.index')->with('post',$post)->with('tags',$tags);
    }
    public function trashed()
    {
        $post = Post::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('post.trash')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Taq::all();
        if (count($tags) == 0){
            return redirect()->route('tag.create');

        }
        return view('post.create')->with('tags',$tags);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content'=> 'required',
            
            'tag'=> 'required',
            'photo' =>'required|image'
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
    

        $post= Post::create([

            'user_id'=> Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'photo'=> 'uploads/posts/'.$newPhoto,
            'slug' =>   str::slug($request->title),
        ]);
        $post->tags()->attach($request->tag);
        return redirect()->back();
    }

    
    public function show($slug)
    {
        $tags= Taq::all();
        $post = Post::where('slug',$slug)->first();
        return view('post.show')->with('post',$post)->with('tags',$tags);
        
    }

    
    public function edit($id)
    {
        $tags= Taq::all();
        $post = Post::find($id);
        return view('post.edit')->with('post',$post)->with('tags',$tags);
    }

    
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title' => 'required',
            'content'=> 'required',
        
        ]);
        if($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newPhoto);
            $post->photo = 'uploads/posts/'.$newPhoto; 
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $post->tags()->sync($request->tag);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();

    }
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back();
    }
}
