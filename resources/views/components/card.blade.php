<div class="card border-0 card-shadow d-flex align-items-center border-card p-4 h-100">
    <img src="{{$image}}" class="card-img-top border-card" alt="...">
    <div class="py-3 padding-card d-flex w-100 flex-column justify-content-between">
      <div>
        <h4 class="card-title"> {{substr($title, 0 , 10) }}...</h4>
        <div class="d-flex justify-content-between">
          <p class="fs-3 fw-bold">{{$price}} €</p>
          @if ($liked == true)
          
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
        <a href="{{$route}}" class="fs-4 fw-bold card-text d-block">{{$category}}</a>
        <div class="d-flex justify-content-between">
        <small class="card-text">{{$user}}</small>
        <small class="card-text pe-2">{{$date}}</small>
        </div>
      </div>
      
      <button class="mt-3 mx-auto btn btn-card rounded-pill d-block shadow"><a href="{{$show}}">Info</a></button>
    </div>
</div>