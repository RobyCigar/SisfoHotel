@extends('layouts.app')

@section('title')
    Hotel
@endsection

@section('content')

<section class="container">
    @foreach ($rooms as $room)
        @if($loop->iteration % 3 == 1)
            <div class="row">
        @endif
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    @if($room->image)
                        <img height="200" style="object-fit: cover" class="card-img-top" src="{{$room->image}}" alt="Card image cap">
                    @else
                        <img height="200" style="object-fit: cover" src="https://source.unsplash.com/random/300x300?sig={{$loop->iteration}}" />
                    @endif
                    <div class="m-3">
                        <h1>{{$room->name ? $room->name : "Nama Kamar"}}</h1>
                        <p>Description: {{$room->description ? $room->description : "Eos voluptatem sunt sed molestias ullam qui. Non id praesentium amet dicta quas rerum laudantium. Fugit dolore facere ipsum maxime vel tenetur. Ut laboriosam similique inventore ex culpa sint id." }}</p>
                        <p>Price: ${{$room->price}}</p>
                        <a href="{{route('rooms.show', $room->id)}}" class="btn btn-sm btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        @if($loop->iteration % 3 == 0)
            </div>
        @endif
    @endforeach
    </section>
@endsection