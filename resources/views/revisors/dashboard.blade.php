


@extends('layouts.app')

@section('content')
@if($announcement != null)
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="revisor-shadow">
                <div class="revisor-header text-center text-white py-2">
                    {{__('ui.announcement')}} # {{$announcement->id}}
                    
                </div>
                <div class="form-custom2 p-4">
                    <div class="row mb-3 mt-3">
                        <div class="col-12 col-md-2">
                            <h3 class="fs-4">{{__('ui.user')}}</h3>
                        </div>
                        <div class="col-12 col-md-10">
                            #{{$announcement->user->id}},
                            {{$announcement->user->name}},
                            {{$announcement->user->email}}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12 col-md-2">
                            <h3 class="fs-4">{{__('ui.title')}}</h3>
                        </div>
                        <div class="col-12 col-md-10">
                            {{$announcement->title}}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12 col-md-2">
                            <h3 class="fs-4">{{__('ui.description')}}</h3>
                        </div>
                        <div class="col-12 col-md-10">
                            {{$announcement->body}}
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12 col-md-2">
                            <h3 class="fs-4">{{__('ui.images')}}</h3>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="row mb-2">
                                @foreach ($announcement->images as $image)
                                    <div class="col-12 col-md-4 mb-3">
                                        <img src="{{$image->getUrl(300,150)}}" class="img-fluid d-block border-card" alt="#">
                                        <div class="ms-2 my-3">
                                            <button class="btn-labels fw-bold text-gray" type="button" data-bs-toggle="collapse" data-bs-target="#d{{$image->id}}" aria-expanded="false" aria-controls="d{{$image->id}}">
                                                Show Labels
                                              </button>
                                              <div class="collapse" id="d{{$image->id}}">
                                                <div class="card card-body">
                                                    <ul>
                                                        @if($image->labels)
                                                            @foreach ($image->labels as $label)
                                                                <li>{{$label}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="col-12 col-md-8 mb-5">
                                       {{-- Adult:{{$image->adult}} <br>  --}}
                                       <span>Adult: {{$image->adult}}%</span>
                                       <div class="progress mb-2">
                                         <div class="progress-bar bg-accent-color" role="progressbar" style="width: {{$image->adult}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <span>Spoof: {{$image->spoof}}%</span>
                                       <div class="progress mb-2">
                                        <div class="progress-bar bg-accent-color" role="progressbar" style="width: {{$image->spoof}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <span>Medical: {{$image->medical}}%</span>
                                      <div class="progress mb-2">
                                        <div class="progress-bar bg-accent-color" role="progressbar" style="width: {{$image->medical}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <span>Violence: {{$image->violence}}%</span>
                                      <div class="progress mb-2">
                                        <div class="progress-bar bg-accent-color" role="progressbar" style="width: {{$image->violence}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <span>Racy: {{$image->racy}}%</span>
                                      <div class="progress mb-2">
                                        <div class="progress-bar bg-accent-color" role="progressbar" style="width: {{$image->racy}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>

                                      
                                        

                                        <div style="overflow: auto">
                                            <p><strong>ID: </strong>{{$image->id}} </p> 
                                            <p><strong>Url: </strong>{{$image->file}} </p>
                                            <p><strong>Crop_Url: </strong>{{$image->getUrl(300,150)}}</p>
                                        </div>

                                        
                                    </div>
                                    {{-- {{dd($image->getUrl(300,150))}} --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-6 text-center">
            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-modifica rounded-pill">
                    {{__('ui.accept')}}
                </button>
            </form>
        </div>
        <div class="col-6 text-center">
            
            <button type="button" class="btn btn-elimina mb-5 rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                {{__('ui.reject')}}
              </button>  
    </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h5 class="modal-title text-gray" id="exampleModalLabel">{{__('ui.delete_announcement')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-gray">
          {{__('ui.are_you_sure')}}
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-modifica rounded-pill" data-bs-dismiss="modal">{{__('ui.no')}}</button>
            <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
              @csrf
            <button type="submit" class="btn btn-elimina rounded-pill">
              {{__('ui.yes')}}
          </button>
            </form>
          </div>
      </div>
    </div>
  </div>
@else
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-12">
            <h2 class="text-center">{{__('ui.no_announcement_revised')}}</h2>
        </div>
    </div>
</div>
@endif

  
@endsection