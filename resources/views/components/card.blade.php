<div class="card border-0 card-shadow border-card p-4 h-100">
  <div class="img-card">

  </div>
    {{-- <img src="http://picsum.photos/400/300" class="card-img-top" alt="..."> --}}
    <div class="card-body card-text px-0 ">
      <h4 class="card-title">{{$title}}</h4>
      <p class="fs-3 fw-bold">{{$price}} €</p>
      <a href="{{$route}}" class="fs-4 fw-bold card-text d-block">Categoria: {{$category}}</a>
      <div class="d-flex justify-content-between">
        <small class="card-text">{{$user}}</small>
        <small class="card-text pe-2">{{$date}}</small>
      </div>
      
      <button class="mt-3 mx-auto btn btn-card rounded-pill d-block shadow"><a href="{{$show}}">Info</a></button>
    </div>
</div>