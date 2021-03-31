@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('contacts.workWithUs')}}">
              @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nome</label>
                  <input placeholder="{{Auth::user()->name}}" required value="{{Auth::user()->name}}" autofocus name="name" type="text" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input required autofocus name="email" type="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" class="form-control" id="email" aria-describedby="email">
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">Motivazione</label>
                  <textarea placeholder="Inserisci qui le tue motivazioni" required autofocus class="form-control" name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>

        </div>
    </div>
</div>
</div>
    
@endsection