<?php

namespace App\Http\Controllers;

use App\Models\sidebar;
use Illuminate\Http\Request;
use Auth;
use DB;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user_id = Auth::user()->id;

        $sidebar=sidebar::where('user_id',$user_id)->get();

        return view("pages.bar.sidebar")
               ->with('sidebar',$sidebar);
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
            $user_id = Auth::user()->id;
            $s =new sidebar();
            $s->name=$request->input('name');
            $s->user_id=$user_id;
            $s->icon="icon icon-shape icon-sm";
            $s->link="";
            $s->save();


        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function show(sidebar $sidebar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function edit(sidebar $sidebar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sidebar $sidebar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function destroy(sidebar $sidebar)
    {
        //
    }
}
