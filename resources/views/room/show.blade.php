@extends('layouts.app')

@section('title')
    {{ $room->name ? $room->name : 'Kamar XXX' }}
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('home')}}" class="btn btn-primary">Kembali</a>
            <div class="card my-3">
                <div class="card-header">{{ $room->name ?? 'Kamar XXX' }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <img src="https://source.unsplash.com/random/300x300?sig=1" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            {{$room->name}}
                            <br>
                            Deskripsi: {{$room->description ?? "Lorem ipsum"}}
                            <br>
                            Kapasitas: {{$room->capacity ?? 0}}
                            <br>
                            Tipe: {{$room->type ?? "Unknown"}}
                            <br>
                            Harga: {{$room->price ?? 0}}
                            <br>
                            <a href="{{route('transaction.create', $room->id)}}" class="btn btn-primary my-2">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection