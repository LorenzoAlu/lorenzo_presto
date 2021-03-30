@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @if (count($announcements) == 0)
            <p class="text-center fst-italic">Non ci sono ancora articoli per questa categoria.</p>
        @else
        <div class="col-12">
            <h2>Tutti gli articoli della categoria {{$category->name}}</h2>
        </div>
    </div>
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
            
        {{$announcements->links()}}
        @endif
    </div>
</div>
    
@endsection