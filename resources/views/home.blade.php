@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between">
            @foreach ($categories as $category)
            <a href="{{route('categories.index', $category)}}">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
</div>

<div class="container mt-5">
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
            
        
    </div>
</div>
@endsection
