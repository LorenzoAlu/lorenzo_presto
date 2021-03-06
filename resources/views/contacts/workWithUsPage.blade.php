@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center text-center my-5">
    <div class="col-12 mb-3">
      <h2>{{__('ui.become_revisor')}}</h2>
    </div>
    <div class="col-12 col-md-6">
      @if (session('message'))
                <div class="alert alert-success-mail rounded-pill text-center">
                    {{ session('message') }}
                </div>
                @endif
    </div>
  </div>
</div>
<div class="container mb-5 py-5">
    <div class="row justify-content-center mx-3 mb-3">
        <div class="col-12 col-md-8 col-lg-6 bg-white p-5 form-custom">
            <form method="POST" action="{{route('contacts.workWithUs')}}">
              @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">{{__('ui.name')}}</label>
                  <input placeholder="{{Auth::user()->name}}" required value="{{Auth::user()->name}}" autofocus name="name" type="text" class="form-control input-shadow-form rounded-pill" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input required autofocus name="email" type="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" class="form-control input-shadow-form rounded-pill" id="email" aria-describedby="email">
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">{{__('ui.reasons')}}</label>
                  <textarea placeholder="{{__('ui.insert_reasons')}}" required autofocus class="form-control input-shadow-form" name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>
                <button type="submit" class="btn btn-card rounded-pill text-white">{{__('ui.send')}}</button>
            </form>

        </div>
    </div>
</div>
</div>
    
@endsection