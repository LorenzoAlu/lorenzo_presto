@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h2>Aggiungi annuncio</h2>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('announcements.store')}}">
                  @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo</label>
                      <input required value="{{old('title')}}" autofocus name="title" type="text" class="form-control" id="title" aria-describedby="title">
        
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Prezzo</label>
                      <input required value="" autofocus name="price" type="number" class="form-control" id="price" aria-describedby="price">
        
                    </div>
                    <div class="mb-3">
                      <label for="descrizione" class="form-label">Descrizione</label>
                      <textarea required autofocus class="form-control" name="body" id="descrizione" cols="30" rows="10">{{old('body')}}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="categoria">Categoria</label>
                      <select required class="form-control" name="category_id" id="categoria">
                        {{-- <option selected disabled value="">Seleziona categoria</option> --}}
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" 
                              {{old('category') == $category->id ? 'selected' : ' '}}
                              >{{$category->name}}</option>
                        @endforeach
                          
                      </select>
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>

            </div>
        </div>
    </div>

@endsection