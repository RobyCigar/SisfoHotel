@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <h5 class="card-header">Data Customer</h5>
  <div class="card-body">
    <p class="card-title">Nama: {{$customer->name}}</p>
    <p class="card-text">
        Email: {{$customer->email}} <br>
        Phone: {{$customer->phone}} <br>
        Negara: {{$customer->country}} <br>
        Check in: {{$customer->check_in}} <br>
        Check out: {{$customer->check_out}}
    </p>
    <a href="{{route('customer.index')}}" class="btn btn-primary">Kembali</a>
  </div>
</div>
</div>

@endsection