<div class="card border-0 card-shadow border-card p-4">
  <div class="img-card">

  </div>
    {{-- <img src="http://picsum.photos/400/300" class="card-img-top" alt="..."> --}}
    <div class="card-body card-text px-0">
      <h5 class="card-title">{{$title}}</h5>
      <p class="card-text">{{$price}} €</p>
      <a href="{{$route}}" class="card-text d-block">{{$category}}</a>
      <div class="d-flex justify-content-between">
        <small class="card-text">{{$user}}</small>
        <small class="card-text pe-2">{{$date}}</small>
      </div>
      
      <button class="mt-3 mx-auto btn btn-card rounded-pill d-block shadow"><a href="{{$show}}">Info</a></button>
    </div>
</div>