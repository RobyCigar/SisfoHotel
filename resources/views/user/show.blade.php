@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{route('user.index')}}" class="btn btn-primary my-3">Kembali</a>
<div class="card">
  <h5 class="card-header">Data Customer</h5>
  <div class="card-body">
    <p class="card-title">Nama: {{$user->name}}</p>
    <div class="row">
      <p class="card-text col-6">
          Email: {{$user->email}} <br>
          Phone: {{$user->phone}} <br>
          Alamat: {{$user->address}} <br>
          Negara: {{$user->country}} <br>
          Updated At: {{$user->updated_at ?? 'Ini adminnya wkwkw'}} <br>
          Created At: {{$user->created_at}} <br>
          Role: {{$user->role == 1 ? "Customer" : "Admin"}} <br>
      </p>
    </div>
  </div>
</div>
<div class="card">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Kamar</th>
        <th scope="col">Check In</th>
        <th scope="col">Check Out</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($user->transaction as $transaction)
        <tr>
          <th scope="row">1</th>
          <td>{{$transaction->room_id}}</td>
          <td>{{$transaction->total_price}}</td>
          <td>{{$transaction->check_in}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection