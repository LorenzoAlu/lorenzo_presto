@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        @if (count($announcements) == 0)
            <p class="text-center fst-italic mb-3">Non ci sono ancora articoli.</p>
            <div class="col-6 mt-3">
                <x-searchbar></x-searchbar>
            </div>
        @else
        <div class="col-12">
            <h2 class="text-center mb-3">Esplora tutti gli articoli</h2>
        </div>
        <div class="col-6 mt-3 w-search-mobile">
            <x-searchbar></x-searchbar>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-6 col-lg-4 my-2 my-md-5 p-5">
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
        <div class="col-12 d-flex justify-content-center">
            <div class="">{{$announcements->links()}}</div>
        </div>
        @endif
    </div>
</div>
    
@endsection