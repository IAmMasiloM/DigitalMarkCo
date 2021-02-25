<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Image;
use Storage;
/*use App\Http\Request;*/

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //create a page that shows all posts
         return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories= Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'title'              => 'required|min:15|max:255',
            'slug'               => 'required|alpha_dash|min:10|max:255|unique:posts,slug',
            'category_id'        =>'required|integer',
            'body'               => 'required|min:25',
            'featured_image'     =>'sometimes|image'
        ));

        //store in database

        $post = new Post;
        $post->title = $request->title;
        //$post->user_id = auth()->id();
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        if($request->hasFile('featured_image')){

            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);
            Image::make($image)->resize(640,460)->save($location);
            $post->image = $filename;
        }



         $post->save();



         $post->tags()->sync($request->tags,false);

        //redirect to another page

         return redirect()->route('posts.show',$post->id)->with('success','Post successfully created!');
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
        //$user = User::find($id);
        $post = Post::find($id);

        //$allpost = $user->posts()->get();
        //var_dump($allpost);
        //$posts = User::find($user)->posts;
        return view('posts.show')->withPost($post);

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

        $post = Post::find($id);
        $categories= Category::all();
       
        $cats = [];
        foreach($categories as $category){

            $cats[$category->id] = $category->name;
        }

         $tags =Tag::all();
         $tags2 =[];
          foreach($tags as $tag){

           $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        //validate data
        $post = Post::find($id);
           /*if($request->input('slug') == $post->slug){

              $this->validate($request, [

            'title' => 'required|min:15|max:255',
            'category_id' => 'required|integer',
            'body' =>'required|min:25'

        ]);


        }else{*/

            
        $this->validate($request, [

            'title' => 'required|min:15|max:255',
            'slug' => "required|alpha_dash|min:10|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body' =>'required|min:25',
            'featured_image' => 'image'

        ]);




       /* }*/


        //

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        if($request->hasFile('featured_image')){

            //Add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);
            Image::make($image)->resize(640,460)->save($location);
            $oldFilename = $post->image;
            //update the database
            $post->image = $filename;


            //Delee the old photo
            Storage::delete($oldFilename);

        }



        $post->save();

         if(isset($request->tags)){
            
            $post->tags()->sync($request->tags);

         }else{

             $post->tags()->sync([]);

         }

         

         return redirect()->route('posts.show',$post->id)->with('success','This post was succesfully saved');
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

        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();

        return redirect()->route('posts.index')->with('success','Post successfully deleted.');
    }
}


