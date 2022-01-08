@extends('layouts.app')

@section('title')
    Halaman Payment
@endsection

@section('content')
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead class="thead-light">
                                <th scope="col">#</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>#{{ $transaction->id }}</td>
                                        <td>{{ number_format($transaction->total_price, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($transaction->payment_status == 1)
                                                Menunggu Pembayaran
                                            @elseif ($transaction->payment_status == 2)
                                                Sudah Dibayar
                                            @else
                                                Kadaluarsa
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-success">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @empty 
                                    <h1>Gaaddda</h1>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection