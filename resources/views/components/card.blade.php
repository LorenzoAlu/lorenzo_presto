<div class="card border-0 card-shadow d-flex align-items-center border-card p-4 h-100">
  <div class="img-card">

  </div>
    {{-- <img src="http://picsum.photos/400/300" class="card-img-top" alt="..."> --}}
    <div class="card-body card-text px-0 d-flex flex-column justify-content-between">
      <div>
        <h4 class="card-title">{{$title}}</h4>
        <div class="d-flex justify-content-between">
          <p class="fs-3 fw-bold">{{$price}} €</p>
          @if ($liked == false)
                    <form action="{{$addlike}}" method="POST">
                        @csrf
                        <button type='submit' class="btn">
                            <i class="btn-like far fa-heart fa-2x"></i>
                        </button>
                    </form>
                @else
                    <form action="{{$lesslike}}" method="POST">
                        @csrf
                        <button type='submit' class="btn ">
                            <i class="btn-like fas fa-heart fa-2x"></i>
                        </button>
                    </form>
                @endif
        </div>
      </div>
      <div>
        <a href="{{$route}}" class="fs-4 fw-bold card-text d-block">Categoria: {{$category}}</a>
        <div class="d-flex justify-content-between">
        <small class="card-text">{{$user}}</small>
        <small class="card-text pe-2">{{$date}}</small>
        </div>
      </div>
      
      <button class="mt-3 mx-auto btn btn-card rounded-pill d-block shadow"><a href="{{$show}}">Info</a></button>
    </div>
</div>