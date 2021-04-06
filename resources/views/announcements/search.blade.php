@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 text-center">
            <div class="col-12 col-md-6">
                <h2>Risultati di ricerca per: {{$q}}</h2>
            </div>
        </div>
       
        @if (count($announcements)==0)
        <div class="row justify-content-center">
            <div class="col-6 my-5 ">
                <x-searchbar></x-searchbar>
            </div>
        </div>
        <div class="row  text-center justify-content-center">
            
            <h3 class="my-5">Non ci sono annunci</h3>
            <div class="col-12">  
            <img src="/media/20945436.jpg" class="img-fluid mx-auto w-75 w-md-50" alt="non-ci-sono-annunci">
            
            </div>
            <div class="col-12">
                <button class="btn btn2 shadow fw-normal rounded-pill text-white my-4 fs-5 fw-normal" >
                   <a class="text-white" href="{{ route('home') }}">Home</a> 
                </button>  
            </div>
        
           
        </div>
        @else 
        
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-6 my-5 ">
                    <x-searchbar></x-searchbar>
                </div>
            </div>
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
                addlike="{{route('announcements.addLiked', $announcement)}}"
                lesslike="{{route('announcements.lessLiked', $announcement)}}" 
                liked='{{$announcement->DoYouLikeIt()}}'      
                />
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection