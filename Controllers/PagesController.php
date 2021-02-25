<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Post;

class PagesController extends Controller
{
   
    public function index()
    {
        $posts = Post::orderby('id','desc')->paginate(4);

       // return view('blog.index')->withPosts($posts);
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        return view('pages.about');
    }

     public function getBlog()
    {
        return view('pages.blog');
    }

       public function getService()
    {
        return view('pages.service');
    }

       public function getContact()
    {
        return view('pages.contact');
    }

   

    public function postContact(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:10',
            'cell'  =>'required|min:10|max:10',
            'bodyMessage'=>'required|min:10'

        ]);

        $data =[

            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'subject' => $request->subject,
            'cell'  => $request->cell,
            'bodyMessage'=> $request->bodyMessage

        ];



        Mail::send('emails.contact', $data, function($message) use ($data){

            $message->from($data['email']);
            $message->to('thedmarket99@gmail.com');
            $message->subject($data['subject']);

        });

        return redirect()->route('pages.welcome')->with('success','your email was successfully sent');

        }

         public function postQoute(Request $request){


        try{


        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'bodyMessage' => 'required'
        ]);

        $data =[

         'name' => $request->name,
         'email' => $request->email,
         'subject' => $request->subject,
         'bodyMessage' => $request->bodyMessage


    ];
        
Mail::send('emails.qoute', $data, function($message) use ($data){

            $message->from($data['email']);
             $message->to('thedmarket99@gmail.com');
           $message->subject('Qoute request Alert!');

        });

        return redirect()->route('pages.welcome')->with('success','request sent successfully!');


        }catch(Exception $e){

            return redirect()->route('pages.welcome')->with('danger','Oops! something went wrong. Please try again later.');

        }
        
    }


         public function postNewsletter(Request $request){


        $this->validate($request,[
            'newsletter' => 'required|email'
        ]);

        $data =[ 'newsletter' => $request->newsletter];
        
Mail::send('emails.newsletter', $data, function($message) use ($data){

            $message->from($data['newsletter']);
             $message->to('thedmarket99@gmail.com');
           $message->subject('New Lead Alert!');

        });

        return redirect()->route('pages.welcome')->with('success','request sent successfully!');


      
        
    }



    
 
}
