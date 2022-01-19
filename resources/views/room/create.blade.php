@extends('layouts.app')

@section('title')
    Form Pembayaran
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                <div class="card-header">
                    Form Transaksi
                </div>
                <div class="card-body">
                    <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="email">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Description</label>
                                <textarea style="resize: vertical" name="description" class="form-control" cols="10" rows="5" charswidth="23"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Kapasitas</label>
                                <input type="number" name="capacity" class="form-control">
                            </div>
                           <div class="form-group">
                                <label for="phone">Total Room</label>
                                <input type="number" name="total_room" class="form-control">
                            </div>
                           <div class="form-group">
                                <label for="phone">Available Room</label>
                                <input type="number" name="available_room" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Gambar (opsional)</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <button class="btn btn-primary mt-3">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection