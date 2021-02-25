<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-success" style="color: #ffffff;">
  <a class="navbar-brand" href="{{ url('/')}}"> <img src="{{ asset('img/The-digital-market-Co.png')}}" class="img-fluid" style="width:90px; height: 60px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" style="color: #ffffff;">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
        <a class="nav-link" href="{{  url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
        <a class="nav-link" href="{{ url('/about')}}">About</a>
      </li>

       <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
        <a class="nav-link" href="{{ url('/blog')}}">Blog</a>
      </li>

       <li class="nav-item {{ Request::is('service') ? "active" : "" }}">
        <a class="nav-link" href="{{ url('/service')}}">Our Services</a>
      </li>

       <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
        <a class="nav-link" href="{{ url('/contact')}}">Contact Us</a>
      </li>


       

     <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>-->
    </ul>

    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                   <a href="{{ route('home')}}" class="dropdown-item">Dashboard</a>
                                 

                                  

                                    @impersonate()

                                    <a href="{{ route('admin.impersonate.destroy')}}" class="dropdown-item">Stop impersonating</a>

                                    @endimpersonate
                                  
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>


    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>