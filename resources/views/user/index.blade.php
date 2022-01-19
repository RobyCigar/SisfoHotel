@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-dark" role="alert">
                {{$message}}
                </div>
            @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Daftar User</h4>
                                <p class="card-description"> Hotel OYO Jl Magelang KM 9</p>
                            </div>
                            <form action="" method="GET" class="my-3">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control" placeholder="Search">
                                    <button type="button input-group-text" class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">   
                                                <a class="btn btn-info" href="{{ route('user.show', $user->id) }}">Show</a>    
                                                <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>   
                                                @csrf
                                                @method('DELETE')      
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection