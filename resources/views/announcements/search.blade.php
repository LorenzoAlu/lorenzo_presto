@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 text-center">
            <div class="col-12 col-md-6">
                <h2>Risultati di ricerca per: {{$q}}</h2>
            </div>
        </div>

        @if (count($announcements)==0)
        <div class="row my-5 text-center">
            <h3>Non ci sono annunci</h3>
            <div class="col-12">  
            <img src="/media/20945436.jpg" class="img-fluid mx-auto w-50" alt="non-ci-sono-annunci">
            
            </div>
            <div class="col-12">
                <button class="btn btn2 shadow fw-normal rounded-pill text-white my-4 fs-5 fw-normal" >
                   <a class="text-white" href="{{ route('home') }}">Home</a> 
                </button>  
            </div>
        
           
        </div>
        @else 

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
        @endif
    </div>
@endsection