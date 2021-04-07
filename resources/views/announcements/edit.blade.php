@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center my-5">
            <div class="col-12">
                <h2>Modifica annuncio</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 bg-white p-5 form-custom">
                <form method="POST" action="{{ route('announcements.update', $announcement) }}">
                    @csrf
                    <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input placeholder="Inserisci qui il titolo del tuo annuncio" required
                            value="{{ $announcement->title }}" autofocus name="title" type="text"
                            class="form-control input-shadow-form rounded-pill" id="title" aria-describedby="title">
                        @error('title')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input placeholder="Inserisci qui il prezzo del tuo annuncio" required autofocus name="price"
                            type="number" min="0" value="{{ $announcement->price }}" step=".01"
                            class="form-control input-shadow-form rounded-pill" id="price" aria-describedby="price">
                        @error('price')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descrizione" class="form-label">Descrizione</label>
                        <textarea placeholder="Inserisci qui la descrizione del tuo annuncio" required autofocus
                            class="form-control input-shadow-form " name="body" id="descrizione" cols="30"
                            rows="10">{{ $announcement->body }}</textarea>
                        @error('body')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="categoria">Categoria</label>
                        <select required class="form-control input-shadow-form rounded-pill" name="category_id"
                            id="categoria">
                            <option selected disabled value="">Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $announcement->category->id == $category->id ? 'selected' : ' ' }}>
                                    {{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Immagini</label>
                        <div class="dropzone" id="drophere"></div>
                        @error('images')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-card rounded-pill text-white ">Modifica</button>
                </form>
                <div class="row my-3">
                  <div class="col-12">
                    <h3 class="text-center">Immagini Caricate</h3>
                  </div>
                  @foreach ($announcement->images as $image)
                      <div class="col-12 col-md-4 mb-3 d-flex flex-column justify-content-between">
                          <div>
                              <img src="{{ Storage::url($image->file) }}" class="img-fluid d-block mx-auto mb-2"
                                  height="100%" alt="">
                          </div>
                          <div class="text-center">
                              <form action="{{route('announcement.images.destroyImage',$image)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <button type="submit" class="btn btn-danger text-white">
                                      Elimina
                                  </button>
                              </form>
                          </div>
                      </div>
                  @endforeach
              </div>
            </div>

        </div>

    </div>
    </div>

@endsection
