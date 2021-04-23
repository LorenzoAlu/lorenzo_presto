@extends('layouts.app')

@section('content')
    <main class="background">
        {{-- prima parte della home --}}
        <header class="m-header-fix vh100">

            <div class="container-fluid mt-5">
                <div class="row justify-content-center ">
                    <div class="col-12 col-md-6 ">
                        @if (session('message'))
                            <div class="alert alert-success-custom rounded-pill text-center m-allert-fix">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('negato'))
                            <div class="alert alert-danger-custom rounded-pill text-center m-allert-fix">
                                {{ session('negato') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center justify-content-around">
                    <div class="col-12 col-lg-6 col-xxl-4 ps-lg-100 my-5 text-center text-lg-start pt-md-5">
                        <h3 class="font-size25 text-white fw-light mb-3">{{ __('ui.welcome') }}</h3>
                        <h2 class="text-white display-3 fw-bold mb-5">{{ __('ui.claim') }}</h2>
                        <form class="d-flex home-search" action="{{ route('announcements.search') }}" method="GET">
                            <input class="form-control btn bg-white rounded-pill input-shadow " type="text" name="q"
                                placeholder="{{ __('ui.search_announcements') }}">
                            <button class="btn btn-card rounded-pill input-shadow btn-position-search " type="submit"> <i
                                    class="fas fa-search text-white"></i> </button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-6 mt-3 pt-5 order-first order-md-last">
                        <img class="img-new img-fluid mt-5 mt-lg-0 d-block mx-auto" src="/media/tipa1.png" width="700px"
                            alt="">
                    </div>
                </div>
            </div>
        </header>
        {{-- seconda parte della home --}}

        <section class="container-fluid ">
            <div class="pt-5 mt-2">
                <div class="row align-items-start  mb-lg-1 h-30 justify-content-center mt-5 pt-5 ">
                    <!-- DESCRIZIONE PRESTO.IT -->
                    <div class="col-12 col-md-6 d-flex  justify-content-center ">
                        <p class="font-size20 text-align-center text-white  text-center text-md-start ">
                            <span class="fs-2"> <b>Presto.it </b></span>
                            {{ __('ui.description_home') }}<br>
                    </div>
                </div>
                <div class="row pt-5 mt-5 justify-content-center">
                    <!-- ICONE SOCIAL AL LATO -->

                    <div class="row justify-content-center">
                        <div class=" col-md-2 d-flex flex-md-column justify-content-evenly  align-items-center mt-5 pt-5 ">
                            <a href=""><i
                                    class="fab fa-facebook-square a-hover shadow-lg icon-socials text-second-color text-lg-white"></i></a>
                            <a href=""><i
                                    class="fab fa-instagram shadow-lg  a-hover icon-socials text-second-color text-lg-white"></i></a>
                            <a href=""><i
                                    class="fab fa-twitter shadow-lg  a-hover icon-socials text-second-color text-lg-white"></i></a>
                         </div>


                        <!-- BOTTONI CATEGORIE  -->
                        
                        <div class=" col-12 col-md-10  d-flex  justify-content-center align-items-center mt-md-5 pt-5 ">
                            <div class="row justify-content-center text-center mt-md-5 pt-md-5">
                                <div>
                                    <button class="btn btn2 shadow fw-bold fs-5 mx-auto my-5 "> <a
                                            class="text-decoration-none text-white p-3 text-center"
                                            href="{{ route('announcements.index') }}">{{ __('ui.announcements') }}</a></button>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="col-12  col-md-4 d-none d-md-block text-align-mobile text-center">
                                        <button class="btn  btn3 btn3-1 shadow bg-white  my-3">
                                            <a class="text-decoration-none text-main-color p-3 text-center"
                                                href="{{ route('categories.index', $category) }}">{{ $category->name }}</a>
                                        </button>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- category mobile --}}
            <div class="container-fluid d-block d-md-none">
                <div class="row justify-content-center">
                    {{-- Icono Categories Mobile --}}
                    <div class="col-12 d-flex no-wrap overflow  col-md-5 col-xxl-4 d-md-block text-align-mobile text-center ">
                        @foreach ($categories as $category)
                            <button class="btn  btn3 btn3-1 shadow  bg-white m-3">
                                <a class="text-decoration-none text-main-color p-3 text-center"
                                    href="{{ route('categories.index', $category) }}">{{ $category->name }}</a>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        {{-- SEZIONE 3  CARD --}}
        <section class="bg3 ">
            <div class="container mt-5 ">
                @if (count($announcements) > 0)
                    <div class="row ">
                        <div class="col-12 text-center  my-5">
                            <h3>{{ __('ui.last_announcements') }}</h3>
                        </div>
                        @foreach ($announcements as $announcement)
                            <div class="col-12 col-md-6 col-xl-4 mb-5 p-md-5">
                                <x-card image="{{ $announcement->getCover() }}" title="{{ $announcement->title }}"
                                    price="{{ $announcement->price }}" user="{{ $announcement->user->name }}"
                                    route="{{ route('categories.index', $announcement->category) }}"
                                    date="{{ $announcement->created_at->format('d/m/Y') }}"
                                    category="{{ $announcement->category->name }}"
                                    show="{{ route('announcements.show', $announcement) }}"
                                    addlike="{{ route('announcements.addLiked', $announcement) }}"
                                    lesslike="{{ route('announcements.lessLiked', $announcement) }}"
                                    liked='{{ $announcement->DoYouLikeIt() }}' />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-12 my-5">
                            <h3 class="text-center" {{ __('ui.missing_announcements') }}>Non ci sono ancora annunci</h3>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        {{-- sezione 4 newsletter --}}
        @if (Auth::user() != null)
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-10 form-custom p-5">
                        @if (Auth::user() && Auth::user()->active_newsletter == false)
                            <h4 class="text-center">
                                Vuoi essere sempre aggiornato? Iscriviti alla nostra newsletter per ricevere le ultime news!
                            </h4>
                            <div class="row justify-content-center">
                                <button class="btn btn2 shadow fw-bold fs-5 mx-auto text-white my-5">
                                    <a class="text-decoration-none text-white"
                                        href="{{ route('users.activeNewsletter') }}">
                                        Iscriviti
                                    </a>!
                                </button>
                            </div>

                        @else

                            <h4 class="text-center">
                                L'iscrizione alla newsletter è andata a buon fine.
                            </h4>
                            <div class="row justify-content-center">
                                <button class="btn btn2 shadow fw-bold fs-5 mx-auto text-white my-5">
                                    <a class="text-decoration-none text-white"
                                        href="{{ route('users.deleteNewsletter') }}">
                                        Annulla iscrizione
                                    </a>!
                                </button>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
            <img src="/media/aeroplano.png" class="aeroplano" alt="aeroplano">

    </main>

    @endif



@endsection
