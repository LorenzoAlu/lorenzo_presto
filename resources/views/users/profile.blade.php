@extends('layouts.app')

@section('content')

<div class="container pt-5">
    <div class="row text-center my-5">
        <div class="col-12">
        <h1>Profilo utente, {{ $user->name}}</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">titolo</th>
                        <th scope="col">descrizione</th>
                        <th scope="col">modifica</th>
                        <th scope="col">elimina</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->announcements as $announcement)
                    
                    <tr>
                        
                        <td>
                            <a href="{{ route('announcements.show', $announcement) }}" class="btn "><strong>{{ $announcement->title }}</strong></a>
                        </td>
                        <td>{{ substr($announcement->body, 0, 20) }} ...</td>
                        <td>
                            
                             <a href="{{ route('announcements.edit', $announcement) }}" class="btn bg-danger rounded-pill mx-2">Modifica articolo</a>
                        </td>    
                        <td>  
                            <form action="{{ route('announcements.destroy', $announcement) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="#" class="btn btn-warning rounded-pill " alt="cancella" > elimina </button>
                            </form> 
                             
                            
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection