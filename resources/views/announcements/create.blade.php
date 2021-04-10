@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row text-center my-5">
        <div class="col-12">
          <h2>{{__('ui.create_announcement')}}</h2>
        </div>
      </div>
    </div>
    <div class="container mb-5 pb-5">
        <div class="row justify-content-center px-3 mb-3">
            <div class="col-12 col-md-8 col-lg-6 bg-white p-5 form-custom">
                <form method="POST" action="{{route('announcements.store')}}">
                  @csrf
                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                    <div class="mb-3">
                      <label for="title" class="form-label">{{__('ui.title')}}</label>
                      <input placeholder="{{__('ui.insert_title_announcement')}}" required value="{{old('title')}}" autofocus name="title" type="text" class="form-control input-shadow-form rounded-pill" id="title" aria-describedby="title">
                      @error('title')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">{{__('ui.price')}}</label>
                      <input placeholder="{{__('ui.insert_price_announcement')}}" required autofocus name="price" type="number" min="0" value="{{old('price')}}" step=".01" class="form-control input-shadow-form rounded-pill" id="price" aria-describedby="price">
                      @error('price')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="descrizione" class="form-label">{{__('ui.description')}}</label>
                      <textarea placeholder="{{__('ui.insert_description_announcement')}}" required autofocus class="form-control input-shadow-form " name="body" id="descrizione" cols="30" rows="10">{{old('body')}}</textarea>
                      @error('body')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="categoria">{{__('ui.category')}}</label>
                      <select required class="form-control input-shadow-form rounded-pill" name="category_id" id="categoria">
                        <option selected disabled value="">{{__('ui.choose_category')}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" 
                              {{old('category_id') == $category->id ? 'selected' : ' '}}
                              >{{$category->name}}</option>
                        @endforeach
                          
                      </select>
                      
                    </div>
                    <div class="mb-3">
                      <label for="images" class="form-label">{{__('ui.images')}}</label>
                      <div class="dropzone" id="drophere"></div>
                      @error('images')
                            <div class="alert background-accent d-inline-block my-3 text-dark text-uppercase">
                                {{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-card rounded-pill text-white ">{{__('ui.create')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection