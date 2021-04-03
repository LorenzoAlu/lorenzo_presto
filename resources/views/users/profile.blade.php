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



@endsection