<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=> ['web']], function(){

//Athentications
//Auth::routes();

//Route::get('/admin', function(){ return 'you\'re Admin'; })->middleware(['auth','auth.admin']);



Route::auth();
Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('home','HomeController');
Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){

Route::resource('/users','UserController',['except'=>['create','store','show']]);
Route::get('/impersonate/user/{id}','ImpersonateController@index')->name('impersonate');

});

Route::get('/admin/Impersonate/destroy','Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');

//Posts
Route::resource('posts','PostController');
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');


//Route::resource('profile','ProfileController');
//Route::get('profile/{id}',['as'=>'profile.index','uses'=>'ProfileController@getSingle'])->where('id','[\w\d\-\_]+');

//Categories

Route::resource('categories','CategoryController',['except'=>'create']);
Route::resource('tags','TagController',['except'=>'create']);

//Comments
Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit', 'as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update', 'as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy', 'as'=>'comments.destroy']);
Route::get('comments/{id}/delete', ['uses'=>'CommentsController@delete', 'as'=>'comments.delete']);
//Pages
//Route::get('/','PagesController@postContact');
Route::get('/',['uses'=>'PagesController@index', 'as'=>'pages.welcome']);
Route::get('/about','PagesController@getAbout');
Route::get('/blog','BlogController@getIndex');
Route::get('/blog/tags','BlogController@index');
Route::get('/service','PagesController@getService');
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::post('/newsletter','PagesController@postNewsletter');
Route::post('/qoute','PagesController@postQoute');

//Route::get('blog/tag/{tag}','BlogController@getTag')->name('tag');

//Route::get('/emails/contact','PagesController@getEmail');
//Route::get('/contact',['PagesController@getContact');

Route::get('/blog/tag/{name}','BlogController@tag')->name('blog.tags');
Route::get('/blog/category/{name}','BlogController@category')->name('blog.categories');
//Route::get('/blog/category/{category}','BlogController@category')->name('category');


//where('slug','[\w\d\-\_]+')->



});

/*Route::get('/','PagesController@index');
Route::get('/about','PagesController@getAbout');
Route::get('/blog','PagesController@getBlog');
Route::get('/service','PagesController@getService');
Route::get('/contact','PagesController@getContact');

Route::resource('posts','PostController');*/
/*Route::get('/', function () {
    return view('pages.welcome');
});*/


/*Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blog', function () {
    return view('pages.blog');
});


Route::get('/service', function () {
    return view('pages.service');
});

Route::get('/contact', function () {
    return view('pages.contact');
});*/
