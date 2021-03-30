@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Tutti gli articoli della categoria {{$category->name}}</h2>
        </div>
    </div>
    <div class="row">
        
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-4 my-3">
                <x-card 
                title="{{$announcement->title}}"
                price="{{$announcement->price}}"
                user="{{$announcement->user->name}}"
                route="{{route('categories.index', $announcement->category)}}"
                body="{{$announcement->body}}"
                date="{{$announcement->created_at->format('d/m/Y')}}"
                category="{{$announcement->category->name}}"
                show="{{route('announcements.show', $announcement)}}"
                    
                />
            </div>
            @endforeach
            
        {{$announcements->links()}}
    </div>
</div>
    
@endsection