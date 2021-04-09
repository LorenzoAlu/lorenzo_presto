
@extends('layouts.app')
@section('content')
    
<div class="container">

    <div class="row justify-content-center align-items-center text-center my-5">
         <div class="col-12 col-md-8 ">
        <h1 class="text-main-color fw-bold display-1">Errore 404</h1>
        <h3 class="text-second-color">Ops qualcosa è andato storto!</h3>
        <div class="col-12">  
            <img src="/media/20945436.jpg" class="img-fluid mx-auto w-75 w-md-50" alt="pagina-non-trovata">
            
            </div>
            <div class="col-12">
                <p class="lead">Ritorna alla pagina principale e ritenta che sarai più fortunato/a.</p>
                <button class="btn btn2 shadow fw-normal rounded-pill text-white my-4 fs-5 fw-normal" >
                   <a class="text-white" href="{{ route('home') }}">Home</a> 
                </button>  
            </div>
    </div>
    </div>
   
</div>

@endsection
