@extends('layouts.app')

@section('content')

    <div class="col-12 row justify-content-center">

        <div class="top2">
            <div class="col-4">
                <h3><i class="fas fa-box"></i> My Items</h3>
            </div>
        </div>

        <div class="col-8 mt-5 p-3 text-light" style="border-radius: 10px; background: #212529;">

            <table style="border-radius: 10px; overflow: hidden;" class="table table-hover table-dark" id="m_table_1">
                <thead>
                <tr>
                    <th class="align-text-top">ID Transaksi</th>
                    <th class="align-text-top">Nama</th>
                    <th class="align-text-top">Harga</th>
                    <th class="align-text-top">Gambar</th>
                    <th class="align-text-top">Tanggal Transaksi</th>
                    <th class="align-text-top">Status</th>
                    <th class="align-text-top">Aksi</th>
                </tr>
                </thead>

                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td><b>{{ $transaction->trans_id }}</b></td>
                        <td>{{ $transaction->product_name }}</td>
                        <td>
                            @if(empty($transaction->price))
                                <p><b>Gratis</b></p>
                            @else
                                <p><b>Rp. {{ $transaction->price }}</b></p>
                            @endif
                        </td>
                        <td><img style="max-width: 100px" src="{{ asset('product_images/'.$transaction->primary_image) }}"></td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>

                            <h5><span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Selesai</span></h5>
                        </td>
                        <td>
                            <div class="mb-4">
                                <a href="/transaction_detail/{{ $transaction->trans_id }}" class="btn btn-outline-info mr-2"><i class="fas fa-info-circle"></i> Detail</a>
                                <a href="/product_download/{{ $transaction->file }}" class="btn btn-outline-success"><i class="fas fa-download"></i> Unduh</a>
                            </div>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>

    <div class="col-12 mb-5 mt-5">

    </div>

    <div class="footer3">
        <div class="col-9 pt-4 pr-5">
            <div class="float-right">
                <h4>
                    Idmarket 2020
                </h4>
            </div>
        </div>
    </div>

@endsection
