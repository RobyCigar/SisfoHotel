@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3>Daftar Room</h3>
            <div class="d-flex justify-content-between">
                <a href="{{route('room.create')}}" class="btn btn-primary my-3">Tambah</a>
                <form action="" method="GET" class="my-3">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                        <button type="button input-group-text" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-dark" role="alert">
                    {{$message}}
                    </div>
                @endif
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Room Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Type</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <th scope="row">{{$room->id}}</th>
                                <td>{{$room->name}}</td>
                                <td>{{\Carbon\Carbon::parse($room->updated_at)->diffForHumans()}}</td>
                                <td>{{$room->type}}</td>
                                <td>{{$room->capacity}}</td>
                                <td>
                                    @if ($room->available_room > 0)
                                        <span class="badge bg-primary">Available</span>
                                    @else
                                        <span class="badge bg-danger">Not Available</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('room.destroy',$room->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection