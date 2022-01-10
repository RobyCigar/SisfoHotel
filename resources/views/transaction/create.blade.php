@extends('layouts.app')

@section('title')
    Form Pembayaran
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                dd($errors);
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Form Transaksi
                </div>
                <div class="card-body">
                    <form action="{{route('transaction.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="email">Nama</label>
                                <input value="{{$user->name}}" type="text" name="name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Email</label>
                                <input value="{{$user->email}}" type="text" name="email" class="form-control" readonly>
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
                            <input value="{{$room->id}}" type="hidden" name="room_id">
                            <div class="form-group">
                                <label for="phone">Nama Kamar</label>
                                <input value="{{$room->nama ?? 'Nama Kamar'}}" type="text" name="room_name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Tipe Kamar</label>
                                <input value="{{$room->type}}" type="text" name="room_type" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="country">Total Harga</label>
                                <input value="{{$room->price ?? 0}}" type="number" name="total_price" id="total_price" class="form-control" readonly>
                            </div>
                            <button class="btn btn-primary mt-3">Selanjutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection