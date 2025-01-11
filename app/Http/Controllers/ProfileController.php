<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id= Auth::id();
        if( $user->profile == null){
            $profile = Profile::create([
            'province'=>'province',
            'user_id'=>$id,
            'gender'=>'gender',
            'bio'=>'bio',
            'facebook'=>'facebook',
        ]);
        }
        return view('user.profile')->with('user',$user);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'facebook' => 'required',
            'gender'    => 'required',
            'bio'	   => 'required',
        ]);
        $user=Auth::user();
        //$user->profiles->name = $request->input('name');
        //$user = User::find($id);
        $user->name = $request->name;
        $user->profile->facebook = $request->facebook ;
        $user->profile->gender = $request->gender;
        $user->profile->bio = $request->bio;
        $user->save();
        $user->profile->save();
        if($request->has('password')){
            $user->password=  Hash::make($request->input('password'));
            $user->save();
        
        }
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
    }
}
