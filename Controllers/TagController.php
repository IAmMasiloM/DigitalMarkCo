<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
//use App\Post;

class TagController extends Controller
{

    public function __construct()
    {

     $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [

            'name'=>'required|max:255',
            'slug'=>'required|alpha_dash|max:255|unique:tags,slug'


        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('tags.index')->with('success','Tag has been created');
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
        $tag =Tag::find($id);
        return view('tags.show')->withTag($tag);
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
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
          $tag = Tag::find($id);
          $this->validate($request, [

            'name'=>'required|max:255',
            'slug' => "required|alpha_dash|max:255|unique:posts,slug,$id",
            
          ]);

          $tag->name = $request->name;
          $tag->slug = $request->slug;
          $tag->save();

          return redirect()->route('tags.show',$tag->id)->with('success','Tag updated');
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

        $tag = Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        return redirect()->route('tags.index')->with('success','Tag was successfully deleted');
    }


   
}
