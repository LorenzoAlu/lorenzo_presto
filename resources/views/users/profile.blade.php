@extends('layouts.app')

@section('content')

<div class="container pt-5">
    <div class="row text-center my-5">
        <div class="col-12">
        <h2>Profilo utente, {{ $user->name}}</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 ">
            @if (session('message'))
            <div class="alert alert-success-custom rounded-pill text-center">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8">
            <div class="form-custom p-5 table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4" scope="col">titolo</th>
                            <th scope="col">descrizione</th>
                            <th scope="col">modifica</th>
                            <th scope="col">elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->announcements as $announcement)
                        
                        <tr>
                            <td class="ps-4">
                                <a href="{{ route('announcements.show', $announcement) }}" class="d-block mt-2"><strong>{{ $announcement->title }}</strong></a>
                            </td>
                            <td><div class="mt-2">{{ substr($announcement->body, 0, 20) }} ...</div></td>
                            <td>
                                
                                 <a href="{{ route('announcements.edit', $announcement) }}" class="mt-2 btn btn-modifica rounded-pill me-2">Modifica</a>
                            </td>    
                            <td>  
                                <form action="{{ route('announcements.destroy', $announcement) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="#" class="btn btn-elimina rounded-pill mt-2" alt="cancella" > Elimina </button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Annunci Preferiti</h3>
        </div>
        @if (count(Auth::user()->likes()->get())== 0)
            <p class="text-center">Non Ci sono annunci salvati nei preferiti</p>
        @else
        @foreach ($user->likes as $like)
        <div class="col-12 col-md-6 col-lg-4 my-5 p-5">
            <x-card 
            title="{{$like->announcement->title}}"
            price="{{$like->announcement->price}}"
            user="{{$like->announcement->user->name}}"
            route="{{route('categories.index', $like->announcement->category)}}"  
            date="{{$like->announcement->created_at->format('d/m/Y')}}"
            category="{{$like->announcement->category->name}}"
            show="{{route('announcements.show', $like->announcement)}}" 
            {{-- addlike="{{route('announcements.addLiked',$announcement)}}"
            lesslike="{{route('announcements.lessLiked',$announcement)}}"    --}}
            />
        </div>
        @endforeach
        @endif
    </div>
</div>


@endsection