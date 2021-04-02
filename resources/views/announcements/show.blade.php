@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row text-center justify-content-center">
        <div class="col-12">
            <h2>{{$announcement->title}}</h2>
        </div>

        <div class="col-12 col-md-6 mt-4">
            @if (session('message'))
                    <div class="alert alert-success-mail rounded-pill text-center">
                          {{ session('message') }}
                    </div>
            @endif
        </div>

    </div>

</div>


<div class="container my-5">
    <div class="row">
        
        <div class="col-12 col-md-6 my-3">
            
            
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">

                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="/media/computer.jpg" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                </div>
            </div>
              

        </div>

        <div class="col-12 col-md-6">
            <h3>{{$announcement->price}} €</h3>
            <p>{{$announcement->body}}</p>
            <p>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#contatta" aria-expanded="false" aria-controls="contatta">
                    Contatta Venditore
                  </button>
            </p>
            <div class="collapse" id="contatta">

                <div class="col-10 bg-white p-5 form-custom">
                        
                    <form method="POST" action="{{route('contacts.contactSeller', $announcement)}}">
                      @csrf
                      @if(Auth::user() != null)
                        <div class="mb-3 d-none">
                          <label for="name" class="form-label">Nome</label>
                          <input placeholder="{{Auth::user()->name}}" required value="{{Auth::user()->name}}" autofocus name="name" type="text" class="form-control input-shadow-form rounded-pill" id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3 d-none">
                          <label for="email" class="form-label">Email</label>
                          <input required autofocus name="email" type="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" class="form-control input-shadow-form rounded-pill" id="email" aria-describedby="email">
                        </div>
                        @endif
                        <div class="mb-3">
                          <label for="body" class="form-label">Contatta l'utente: {{$announcement->user->name}}</label>
                          <textarea placeholder="Inserisci qui le tue motivazioni" required autofocus class="form-control input-shadow-form" name="body" id="body" cols="12" rows="5">{{$announcement->body}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-card rounded-pill text-white">Invia</button>
                    </form>
        
                </div>
            </div>
            
        </div>

    </div>
</div>


<!-- Swiper JS -->
{{-- <script src="../package/swiper-bundle.min.js"></script> --}}
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>

<!-- Initialize Swiper -->
<script>

    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });

    
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });

</script>


@endsection