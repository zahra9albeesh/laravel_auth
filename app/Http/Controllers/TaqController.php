<?php

namespace App\Http\Controllers;

use App\Models\Taq;
use App\Models\Post;
use Illuminate\Http\Request;


class TaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Taq::get()->all();
        return view('tag.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
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
            'title' => 'required',
        ]);
        
        $tags= taq::create([
            'tit' => $request->title,

        ]);
        return redirect()->back();
    }


    public function edit($id)
    {
        $tags = Taq::find($id);
        return view('tag.edit')->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taq  $taq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = Taq::find( $id ) ;
        $this->validate($request,[
            'tit' => 'required',
        ]);
        $tags->tit = $request->tag;
        $tags->save();
        return redirect()->back() ;
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taq  $taq
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $tags= Taq::find($id);
        $tags->delete();
        return redirect()->route('tags')->with('success','product deleted successfully');   
    }
}
