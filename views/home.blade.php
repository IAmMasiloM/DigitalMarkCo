@extends('main')

@section('title',' | Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card-group">
            <div class="card">

            
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        
                        <span>
                        <strong>Menubar</strong> 

                    </span> 
                    <span>
                        
                      <img src="{{url("svg/dashboard.svg")}}" height="25" width="25" class="iconic">   
                    </span>

                    </li>
                   
                     <li class="list-group-item">
                        <a href="">My Profile</a>

                    </li>
               
                
                     @hasrole('administrator')
                                    
 <li class="list-group-item"><a href="{{ route('admin.users.index')}}">Manage Users</a>

    <img src="{{url("svg/organization.svg")}}" height="25" width="25" class="iconic">

 </li>

 

                                   

                                  
                                   @endhasrole
                   
                    <li class="list-group-item">
                        <a href="{{ route('posts.index')}}">All Posts</a>

                    </li>
                    <li class="list-group-item">
                        
                        <a href="{{ route('categories.index')}}">Categories</a>

                    </li>
                    <li class="list-group-item">
                        <span> 

                            <a href="{{ route('tags.index')}}">Tags</a>

                        </span>
                        <span class="">
                            
                            <img src="{{url("svg/tag.svg")}}" height="25" width="25" class="iconic">

                        </span>
                        
                         

                    </li>
                    
                     
                </ul>

            </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="card-text">You are logged in!</p>
                    <p class="card-text"></p>

                </div>
            </div>
        </div>
        </div>
    
</div>
@endsection
