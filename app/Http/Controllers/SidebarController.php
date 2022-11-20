<?php

namespace App\Http\Controllers;
use App\Models\sidebarsub;
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

        $sidebar=sidebar::where('user_id',$user_id)->orderBy('priority', 'asc')->get();
        $subbar=sidebarsub::Join('sidebars', 'sidebars.id', '=', 'main_id')->orderBy('priority', 'asc')->get(['sidebarsubs.name','sidebarsubs.id','sidebarsubs.main_id','sidebarsubs.created_at','sidebarsubs.updated_at','sidebarsubs.priority']);
// dd($subbar);
        return view("pages.bar.sidebar")
               ->with('sidebar',$sidebar)
               ->with('subbar',$subbar);
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
            $s->icon=$request->input("icon");
            $s->link="";
            $s->status="0";
            $s->save();


    return back();
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
    public function edit(Request $request)
    {
        //
        $sidebar= sidebar::find($request->input('id'));

        return $sidebar;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $s = sidebar::find($request->input('id'));

        $s->name=$request->input('name');
        $s->icon=$request->input("icon");
        $s->link=$request->input("link");
        $s->priority=$request->input("priority");
        $s->status=$request->input("status");;

        $s->update();
        return redirect()->route('sidebar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user = sidebar::find($request->id);
        $user->delete();

        return "success";
    }
}
