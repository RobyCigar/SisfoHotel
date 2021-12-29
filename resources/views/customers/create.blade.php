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
    <form action="{{route('customer.store')}}" method="post">
        @csrf
        <div class="card-header">
            <h3>Edit Customer</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">No Telp</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" class="form-control">
            </div>
            <div class="d-flex">
              <div class="form-group">
                  <label for="country">Check In</label>
                  <input type="date" name="check_in" id="check_in" class="form-control">
              </div>
              <div class="form-group">
                  <label for="country">Check Out</label>
                  <input type="date" name="check_out" id="check_out" class="form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="country">Total Harga</label>
                <input type="number" name="total_price" id="total_price" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Submit</button>
            <div
    </form>
</div>
</div>

@endsection