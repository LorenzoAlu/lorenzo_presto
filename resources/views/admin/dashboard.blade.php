@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12  my-5 text-center">
                <h2>{{__('ui.dashboard_admin')}}</h2>
            </div>
            <div class="d-flex justify-content-evenly my-5 ">
                <div class=" input-shadow-form  border-custom-card-dashboard shadow">
                    <p class="display-5 "> {{$totalAnnouncements}}</p>
                    <p class="text-center">{{__('ui.announcements1')}}</p>
                </div>
                <div class=" input-shadow-form  border-custom-card-dashboard shadow" >
                    <p class="display-5 ">{{$totalUsers}}</p>
                    <p class="text-center">{{__('ui.users')}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row justify-content-center my-5 p-4">
            <div class="col-12  my-5 text-center">
                <h2>{{__('ui.list_users')}}</h2>
            </div>
            <div class="col-12 col-md-6 ">
                @if (session('message'))
                <div class="alert alert-success-custom rounded-pill text-center">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="table-responsive form-custom p-5">
                <table class="table ">
                    <thead>
                        <tr class="p-5">
                            <th scope="col">{{__('ui.name')}}</th>
                            <th scope="col">Email</th>
                            <th scope="col">{{__('ui.published_announcements')}}</th>
                            <th scope="col">{{__('ui.subscribed_on')}}</th>
                            <th scope="col">{{__('ui.revisor')}}</th>
                            <th scope="col">{{__('ui.block_unblock')}}</th>
                            <th scope="col">{{__('ui.delete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="p-5">
                                <td class="text-second-color fw-bold py-3" scope="row"><a href="{{route('users.profile')}}">{{ $user->name }}</a></td>
                                <td class="py-3">{{ $user->email }}</td>
                                <td class="text-center py-3">
                                    <a class="text-dark"
                                        href="">
                                        {{ count($user->announcements) }}
                                    </a>
                                </td>
                                <td class="py-3">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="py-3">
                                    @if ($user->is_revisor == false)
                                    <a href="{{route('users.toggle',$user)}}" class="btn btn-modifica rounded-pill w-100">{{__('ui.able')}}</a>
                                @else
                                    <a href="{{route('users.toggle',$user)}}" class="btn btn-card rounded-pill text-white w-100">{{__('ui.disable')}}</a>
                                @endif
                                </td>
                                <td class="py-3">
                                    @if ($user->disable == false)
                                        <a href="{{ route('users.toggleUserDisable', $user) }}" class="btn btn-card rounded-pill text-white w-100">{{__('ui.block')}}</a>
                                    @else
                                        <a href="{{ route('users.toggleUserDisable', $user) }}" class="btn btn-modifica rounded-pill w-100">{{__('ui.unblock')}}</a>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <form action="{{route('users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-elimina rounded-pill w-100">{{__('ui.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($users != null)
    <div class="col-12 d-flex justify-content-center">
        {{ $users->links() }} 
    </div>
   
    @endif
@endsection
