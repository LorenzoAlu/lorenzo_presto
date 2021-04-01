@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                Ricerca per parola chiave: {{$q}}
            </div>
        </div>

        @if (count($announcements)==0)
        <div class="row">
            <h2>Non ci sono articoli</h2>
        </div>
        @else 

        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-6">
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