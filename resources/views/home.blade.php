@extends('layouts.app')

@section('content')

<header>
    <div class="container-fluid bg-img1 new-bg1">
        {{-- <div class="row justify-content-between">
        </div> --}}
        <div class="row h-75 align-items-center justify-content-around">
            <div class="col-12 col-lg-6 ps-lg-100 my-5 text-center text-lg-start pt-md-5">
                <h3 class="font-size25 text-white fw-light mb-3">Lorem Ipsum sit Facet</h3>
                <h2 class= "text-white display-3 fw-bold">Cerchi usato <br> a prezzi <br> vantaggiosi?</h2>
                <button class="btn2 shadow my-5 text-white font-size25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="text-decoration-none" href="{{route('announcements.create')}}"> <h2 class="mb-0 font-size25 text-white">Inizia</h2></a>
                </button>
            </div>
            <div class="col-12 col-lg-6 mt-3 pt-5 mt-lg-0 pt-lg-0 order-first order-lg-last">
                <img class="img-new img-fluid mt-5 mt-lg-0 d-block mx-auto" src="/media/tipa1.png" width="700px" alt="">
            </div>
        </div>
    </div>
</header>

{{-- <div class="container">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between">
            @foreach ($categories as $category)
            <a href="{{route('categories.index', $category)}}">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
</div> --}}

<div class="container mt-5">
    <div class="row">
        
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-5 p-5">
                <x-card 
                title="{{$announcement->title}}"
                price="{{$announcement->price}}"
                user="{{$announcement->user->name}}"
                route="{{route('categories.index', $announcement->category)}}"
                
                date="{{$announcement->created_at->format('d/m/Y')}}"
                category="{{$announcement->category->name}}"
                show="{{route('announcements.show', $announcement)}}"
                    
                />
            </div>
            @endforeach
            
        
    </div>
</div>
@endsection
