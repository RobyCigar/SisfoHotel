@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-4 col-10">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Pembayaran
                </div>
                <div class="card-body">
                <p>
                    Nama Pemesan: {{$transaction->user->name}}
                    <br>
                    Email: {{$transaction->user->email}}
                    <br>
                    Nama Kamar: {{$transaction->room->name}}
                    <br>
                    Tipe: {{$transaction->room->type}}
                    <br>
                    Harga: {{$transaction->room->price}}
                    <br>
                    Kapasitas: {{$transaction->room->capacity}}
                    <br>
                    Check In: {{$transaction->check_in}}
                    <br>
                    Check Out: {{$transaction->check_out}}    
                </p>
                </div>
                <div class="card-footer">
                        @if ($transaction->payment_status == 1)
                        <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                        @else
                            Pembayaran berhasil
                        @endif
                </div>
            </div>    
        
        </div> 

    </div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();
 
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
@endsection