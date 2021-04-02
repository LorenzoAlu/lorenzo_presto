<nav class="navbar navbar-dark bg-gradient-navbar" aria-label="First navbar example">
    <div class="container-fluid ps-5">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler collapsed outline-transition-none border-0 ps-2 py-5" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01"
                aria-expanded="true" aria-label="Toggle navigation">
                <i class="fas p-3 fa-bars text-white font-size25"></i>
                <!-- <span class="fw-600 navbar-toggler-icon"></span> -->
            </button>
            <a class="text-decoration-none" href="{{ route('home') }}">
                <h1 class="mb-0 font-size25 text-white"> Presto.it </h1>
            </a>
            <button class="btn1-annuncio shadow me-5 text-white d-none d-md-block ms-5">
                <a class="text-decoration-none text-white" href="{{route('announcements.create')}}">Aggiungi annuncio</a>
            </button>
        </div>

        {{-- BARRA DI RICERCA --}}

        {{-- <form class="d-flex" action="{{route('announcements.search')}}" method="GET">
            <input class="form-control btn bg-white rounded-pill input-shadow" type="text" name="q" placeholder="cerca annunci">
            <button class="btn btn-card rounded-pill input-shadow btn-position-search" type="submit"> <i class="fas fa-search text-white"></i> </button>
        </form> --}}

    
        <div class="px-5 py-5 d-none d-md-block">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <button class="btn1 shadow text-white mx-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </button>

                @endif

                @if (Route::has('register'))
                    <button class="btn1 shadow me-5 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </button>
                @endif
            @else
                <div class="d-flex">
                @if(Auth::user() && Auth::user()->is_revisor)
                <div class="nav-item d-inline">
                    <button class="btn1 shadow me-5 text-white">
                    <a class="text-white" href="{{route('revisors.dashboard')}}">
                        Revisore
                        <span class="badge rounded-pill">
                            {{App\Models\Announcement::ToBeRevisionedCount()}}
                        </span>
                    </a>
                    </button>
                </div>
                @endif
                @if(Auth::user() && Auth::user()->is_admin)
                <div class="nav-item d-inline">
                    <button class="btn1 shadow me-5 text-white">
                    <a class="text-white" href="{{route('admin.dashboard')}}">
                        Admin
                    </a>
                    </button>
                </div>
                @endif
                <div class="nav-item dropdown">
                    <button class="btn1 shadow me-5 text-white">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </button>
                </div>
                </div>
            @endguest
            {{-- qui --}}
           
        </div>

        <div class="navbar-collapse collapse" id="navbarsExample01" style="">
            <ul class="navbar-nav me-auto mb-2 ">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item pt-2 fw-600 text-white d-block d-md-none">
                            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                    @endif
                    @if (Route::has('register'))

                        <li class="nav-item py-2 fw-600 text-white d-block d-md-none">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @endif
                @else
                    <div class="nav-item dropdown d-block d-md-none">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    
                @endguest
                <div class="nav-item d-block d-md-none">
                        <a class="text-decoration-none " href="{{route('announcements.create')}}"> <p class="mb-0 fw-bold text-white"> Aggiungi annuncio </p></a>
                </div>
            </ul>
        </div>
    </div>
</nav>