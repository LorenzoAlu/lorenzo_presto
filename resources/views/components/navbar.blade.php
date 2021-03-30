<div class="row justify-content-between">
    <nav class="navbar navbar-dark bg-gradient-navbar" aria-label="First navbar example">
        <div class="container-fluid ps-5">
            <div class="d-flex align-items-center">
                <button class="navbar-toggler collapsed outline-transition-none border-0 ps-2 py-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="true" aria-label="Toggle navigation">
                    <i class="fas p-3 fa-bars text-white font-size25"></i>
                <!-- <span class="fw-600 navbar-toggler-icon"></span> -->
                </button>
                <a class="text-decoration-none px-3" href="{{route('home')}}"> <h1 class="mb-0 font-size25 text-white"> Presto.it </h1></a>
                <a class="text-decoration-none px-3" href="{{route('announcements.create')}}"> <h3 class="mb-0 font-size25 text-white"> Aggiungi annuncio </h3></a>
            </div>
            <div class="px-5 py-5 d-none d-md-block">
                
                
            
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                        <button class="btn1 shadow text-white mx-5"  data-bs-toggle="modal" data-bs-target="#exampleModal"> <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a> 
                        </button>
                        
                        @endif
                        
                        @if (Route::has('register'))
                                <button class="btn1 shadow me-5 text-white"  data-bs-toggle="modal" data-bs-target="#exampleModal">  <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                        @endif
                    @else

                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
            </div>
    
          <div class="navbar-collapse collapse" id="navbarsExample01" style="">
            <ul class="navbar-nav me-auto mb-2">
              <li class="nav-item">
                <a class="nav-link active pt-5 pt-md-1 pb-3 fw-600 text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item py-3 fw-600 text-white">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item py-3 fw-600 text-white">
                <a class="nav-link" href="#">Link2</a>
              </li>
              <li class="nav-item py-3 fw-600 text-white">
                <a class="nav-link" href="#">Link3</a>
              </li>
            
            

            </ul>

          </div>
        </div>
      </nav>
</div>




{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="{{route('announcements.create')}}" class="">Aggiungi annuncio</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}