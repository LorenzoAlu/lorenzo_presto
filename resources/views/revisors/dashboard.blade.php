


@extends('layouts.app')

@section('content')
@if($announcement != null)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Annuncio # {{$announcement->id}}
                    
                </div>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <h3>Utente</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        #{{$announcement->user->id}},
                        {{$announcement->user->name}},
                        {{$announcement->user->email}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <h3>Titolo</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        {{$announcement->title}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <h3>Descrizione</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        {{$announcement->body}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <h3>Immagini</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="row mb-2">
                            <div class="col-12 col-md-4">
                                <img src="http://picsum.photos/1920/1080" class="img-fluid d-block" alt="#">
                            </div>
                            <div class="col-12 col-md-8">
                                ...
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-md-4">
                                <img src="http://picsum.photos/1920/1080" class="img-fluid d-block" alt="#">
                            </div>
                            <div class="col-12 col-md-8">
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
            
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Rifiuta
                  </button>
                  
                
            
        </div>
        <div class="col-12 col-md-6">
            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    Accetta
                </button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Elimina annuncio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro?
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">
              Sì
          </button>
            </form>
          </div>
      </div>
    </div>
  </div>
@else
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-12">
            <h2 class="text-center">Non sono presenti annunci da rivisionare</h2>
        </div>
    </div>
</div>
@endif

{{-- <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Elimina annuncio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Sei sicuro?</p>
        </div>
        <div class="modal-footer">
            
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
            @csrf
          <button type="submit" class="btn btn-danger">
            Sì
        </button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  
@endsection