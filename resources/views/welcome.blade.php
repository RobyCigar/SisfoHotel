@extends('layouts.app')

@section('title')
    Hotel
@endsection

@section('content')
  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold">Sistem Informasi Hotel</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
      </div>
    </div>
  </div>


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