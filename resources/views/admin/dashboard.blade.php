@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12 text-canter">
                <h2> Dashboard admin</h2>
            </div>
            <div class="d-flex justify-content-evenly">
                <div class="bg-white shadow d-inline-block rounded-3 ">
                    <p class="display-3"> {{$totalAnnouncements}}</p>
                    <p>Annunci Pubblicati</p>
                </div>
                <div class="bg-white shadow d-inline-block rounded-3" >
                    <p class="display-3">{{$totalUsers}}</p>
                    <p>Utenti Iscritti</p>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-12">
                <h2>Lista Utenti</h2>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Annunci Pubblicati</th>
                            <th scope="col">Iscritto Dal</th>
                            <th scope="col">Revisore</th>
                            <th scope="col">Blocca/Sblocca</th>
                            <th scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->name }}</th>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="text-dark"
                                        href="">
                                        {{ count($user->announcements) }}
                                    </a>
                                </td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($user->is_revisor == false)
                                    <a href="{{route('users.toggle',$user)}}" class="btn btn-warning">Abilita</a>
                                @else
                                    <a href="{{route('users.toggle',$user)}}" class="btn btn-primary">Disabilita</a>
                                @endif
                                </td>
                                <td>
                                    @if ($user->disable == false)
                                        <a href="{{ route('users.toggleUserDisable', $user) }}" class="btn btn-warning">Disabilità</a>
                                    @else
                                        <a href="{{ route('users.toggleUserDisable', $user) }}" class="btn btn-primary">Abilita</a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
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
    {{ $users->links() }}
    @endif
@endsection
