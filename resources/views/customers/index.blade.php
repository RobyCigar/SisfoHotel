@extends('layouts.app')

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
                                <h4 class="card-title">Daftar Customer</h4>
                                <p class="card-description"> Hotel OYO Jl Magelang KM 9</p>
                            </div>
                            <div>
                                <a href="{{route('customer.create')}}" class="btn btn-primary">Tambah Customer</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->check_in}}</td>
                                        <td>{{$customer->check_out}}</td>
                                        <td>
                                            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">   
                                                <a class="btn btn-info" href="{{ route('customer.show', $customer->id) }}">Show</a>    
                                                <a class="btn btn-primary" href="{{ route('customer.edit', $customer->id) }}">Edit</a>   
                                                @csrf
                                                @method('DELETE')      
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $customers->links() }}
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection