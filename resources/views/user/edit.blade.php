@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<div class="card">
    <form action="{{route('user.update', $user->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name ??  ''}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$user->email ??  ''}}" readonly>
            </div>
            <div class="form-group">
                <label for="phone">No Telp</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone ??  ''}}">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" name="address" id="address" class="form-control" value="{{$user->address ??  ''}}">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" class="form-control" value="{{$user->country ??  ''}}">
            </div>
            <button class="btn btn-primary my-3">Submit</button>
            <div
    </form>
</div>
</div>

@endsection