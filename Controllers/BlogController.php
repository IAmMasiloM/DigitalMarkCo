<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Image;
use App\PostTags;
class BlogController extends Controller
{
    //

    public function getIndex(){
        //$post = Post::find($id);

    	$posts = Post::orderby('id','desc')->paginate(4);
    	$tags = Tag::all();
    	//$tag =  Tag::where('id')->posts()->associate($post);
    	$categories = Category::all();
    	return view('blog.index')->withPosts($posts)->withTags($tags)->withCategories($categories); 


    }

    public function getSingle($slug){

    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->withPost($post);

    }


     public function category($name){

        $category = Category::all()->where('name','=',$name)->first();
     
        if($category != null){
        $posts = Post::all()->where('category_id','=',$category->id);

        return view('blog.categories')->withPosts($posts)->withCategory($category);

        }else{
           // $posts = Post::orderby('id','desc')->paginate(4);
           // $categories = Category::all();

            return redirect('')->route('/blog');

        }
 

    }

     public function tag($name){

         $tag = Tag::all()->where('name','=',$name)->first();
     
        if($tag != null){
        $posts = Post::all()->where('id','=',$tag->id);

        return view('blog.tags')->withPosts($posts)->withTag($tag);

        }else{
           // $posts = Post::orderby('id','desc')->paginate(4);
            //$tag = Tag::all();

            return view('blog.tags')->withPosts($posts);

        }

    }

}



