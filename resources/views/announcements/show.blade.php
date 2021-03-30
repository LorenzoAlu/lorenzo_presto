@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>{{$announcement->title}}</h2>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        
        <div class="col-12 col-md-6">
            
            
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">

                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>
                    <div class="swiper-slide"> <img src="https://picsum.photos/1920/1082" alt="prodotto"
                            class="img-fluid mx-auto d-block"> </div>

                </div>
            </div>
              

        </div>

        <div class="col-12 col-md-6">
            <h3>{{$announcement->body}}</h3>
            <p>{{$announcement->price}}</p>
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