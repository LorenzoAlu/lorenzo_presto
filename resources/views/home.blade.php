@extends('layouts.app')

@section('content')

{{-- prima parte della home --}}
<header class="m-header-fix">
    
    <div class="container-fluid bg-img1 new-bg1 ">
        <div class="row justify-content-center m-0">
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
        
        <div class="row mb-3">
            {{-- <div class="col-12 d-flex justify-content-around">
                <a class="a-category" href="{{route('announcements.index')}}">Tutti gli articoli</a>
                {{-- @foreach ($categories as $category)
                    <a class="a-category" href="{{route('categories.index', $category)}}">{{$category->name}}</a>
                    @endforeach 
                </div> --}}
            </div>
            {{-- <div class="row justify-content-between">
            </div> --}}
            <div class="row h-75 align-items-center justify-content-around">
                <div class="col-12 col-lg-6 col-xxl-4 ps-lg-100 my-5 text-center text-lg-start pt-md-5">
                    <h3 class="font-size25 text-white fw-light mb-3">{{__('ui.welcome')}}</h3>
                    <h2 class= "text-white display-3 fw-bold mb-5">{{__('ui.claim')}}</h2>
                    {{-- <button class="btn2 shadow my-5 text-white font-size25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="text-decoration-none" href="{{route('announcements.create')}}"> <h2 class="mb-0 font-size25 text-white">Inizia</h2></a>
                    </button> --}}
                    <form class="d-flex home-search" action="{{route('announcements.search')}}" method="GET">
                        <input class="form-control btn bg-white rounded-pill input-shadow " type="text" name="q" placeholder="{{__('ui.search_announcements')}}">
                        <button class="btn btn-card rounded-pill input-shadow btn-position-search " type="submit"> <i class="fas fa-search text-white"></i> </button>
                    </form>
                </div>
                <div class="col-12 col-lg-6 mt-3 pt-5 mt-lg-0 pt-lg-0 order-first order-lg-last">
                    <img class="img-new img-fluid mt-5 mt-lg-0 d-block mx-auto" src="/media/tipa1.png" width="700px" alt="">
                </div>
            </div>
        </div>
    </header>
    
    
    
    {{-- seconda parte della home --}}
    
    <section>
        <div class="container-fluid bg-img2 bg-new2">
            <div class="row align-items-start mb-lg-5 bg-descrizione-md h-30 justify-content-center col-description">
                <!-- DESCRIZIONE PRESTO.IT -->
                <div class="col-12 col-md-7 d-flex bg-descrizione justify-content-center pt-xxl-5">
                    
                    <p class="font-size20  text-white line-height60 line-height40 position-custom position-custom-lg text-center text-lg-start mt-0 px-xl-5"> <span class="fs-2"> <b>Presto.it </b></span> 
                        {{__('ui.description_home')}}<br>
                        {{-- è uno dei portali più conosciuti dedicato agli annunci per vendite <br> e acquisti online. Esso permette a centinaia di migliaia di persone di  mettersi in <br> contatto e concludere numerosi affari vendendo in maniera diretta i propri prodotti. --}}</p>
                </div>
            </div>
            <div class="row pt-lg-5 mt-lg-100 bg-white1 h-md-50">
                <!-- ICONE SOCIAL AL LATO -->
                
                    <div class=" col-12 col-xxl-2 d-flex  flex-xxl-column  justify-content-evenly  align-items-center mt-md-5 pt-md-5 d-lg-hidden">
                    <a href=""><i class="fab fa-facebook-square a-hover shadow-lg icon-socials text-second-color text-lg-white"></i></a>
                    <a href=""><i class="fab fa-instagram shadow-lg  a-hover icon-socials text-second-color text-lg-white"></i></a>
                    <a href=""><i class="fab fa-twitter shadow-lg  a-hover icon-socials text-second-color text-lg-white"></i></a>
                    </div>
                
                
                <!-- BOTTONI CATEGORIE  -->
               {{--  <div class="col-12 col-md-2">

                </div> --}}
                
                <div class="col-12  col-xxl-8 offset-xxl-1 d-flex  justify-content-center align-items-center mt-lg-5 pt-lg-5">
                    <div class="row justify-content-end  row-justify-mobile text-center">
                        <div>
                        <button class="btn btn2 shadow fw-bold fs-5 mx-auto my-5"> <a class="text-decoration-none text-white p-3 text-center" href="{{route('announcements.index')}}">{{__('ui.announcements')}}</a></button>
                        </div>
                        @foreach ($categories as $category)
                        <div class="col-12  col-md-5 col-xxl-4 d-none d-md-block text-align-mobile text-center">
                            <button class="btn  btn3 btn3-1 shadow  my-3">
                                <a class="text-decoration-none text-main-color p-3 text-center" href="{{route('categories.index', $category)}}">{{$category->name}}</a>
                            </button>
                        </div>
                        @endforeach
                        {{-- <button class="btn3 shadow mx-5 my-3">
                            <a class="text-decoration-none text-main-color font-size20 p-5 text-center" href="">Motori</a>
                        </button> --}}
                        
                        {{--  <div class="col-12 col-md-6 col-xxl-3 text-center">
                            <button class="btn3 shadow mx-5 my-3">
                                <a class="text-decoration-none text-main-color font-size20 p-5 text-center" href="">Market</a>
                            </button>
                        </div>
                        <div class="col-12 col-md-6 col-xxl-3 text-center">
                            <button class="btn3 shadow mx-5 my-3">
                                <a class="text-decoration-none text-main-color font-size20 p-5 text-center"href="">Immobili</a>
                            </button>
                        </div>
                        <div class="col-12 col-md-6 col-xxl-3 text-center">
                            <button class="btn3 shadow mx-5 my-3">
                                <a class="text-decoration-none text-main-color font-size20 p-5 text-center" href="">Lavoro</a>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
            
        </div>
        
        
    </section>

    {{-- SEZIONE 3  CARD --}}
    <section class="bg-img3"> 
    <div class="container pt-5">
        @if (count($announcements) > 0)
        <div class="row ">
            <div class="col-12 text-center m-150 mb-5">
                <h3>{{__('ui.last_announcements')}}</h3>
            </div>
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-6 col-xl-4 mb-5 p-md-5">
                <x-card 
                image="{{$announcement->getCover()}}"
                title="{{$announcement->title}}"
                price="{{$announcement->price}}"
                user="{{$announcement->user->name}}"
                route="{{route('categories.index', $announcement->category)}}"
                date="{{$announcement->created_at->format('d/m/Y')}}"
                category="{{$announcement->category->name}}"
                show="{{route('announcements.show', $announcement)}}"
                addlike="{{route('announcements.addLiked', $announcement)}}"
                lesslike="{{route('announcements.lessLiked', $announcement)}}" 
                liked='{{$announcement->DoYouLikeIt()}}'    
                />
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12 my-5">
                <h3 class="text-center"{{__('ui.missing_announcements')}}>Non ci sono ancora annunci</h3>
            </div>
        </div>
        @endif
    </div>
</section> 
    
    
    
    
    @endsection
    
    
    
    
    
    