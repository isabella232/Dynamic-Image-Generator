<?php

namespace App\Http\Controllers;

use App\attend;
use Illuminate\Http\Request;
use Image;
use session;

class AttendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'avatar'=>'required'
        ]);

        $avatars = $request->hasfile('avatar');
        if($avatars)
        {
            $background = Image::make('public/img/mov2017.jpeg');
            $file = $request->file('avatar');
            $filename = $request->phone.'.'.$file->getClientOriginalExtension();
            $avatar = Image::make($file)->resize('540','540');
            $mov2017 = Image::make('public/img/avatar.png')->resize('540', '540');
            $avatar->insert($mov2017);
            $background->insert($avatar, 'top', 150, 70);
            
            $background->save(public_path('img/'.$filename));
            
            session()->put('avatar',$filename);
            return view('attending');
            //->save(public_path('public/img/'.$filename));
        }
    }

    public function attend()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attend  $attend
     * @return \Illuminate\Http\Response
     */
    public function show(attend $attend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attend  $attend
     * @return \Illuminate\Http\Response
     */
    public function edit(attend $attend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attend  $attend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attend $attend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attend  $attend
     * @return \Illuminate\Http\Response
     */
    public function destroy(attend $attend)
    {
        //
    }
}
