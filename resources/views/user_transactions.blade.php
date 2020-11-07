@extends('layouts.app')

@section('content')

    <div class="col-12 row justify-content-center">

        <div class="top2">
            <div class="col-4">
                <h3><i class="fas fa-shopping-cart"></i> My Transactions</h3>
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
                            @if($transaction->confirm==0)
                                <h5><span class="badge badge-pill badge-warning"><i class="fas fa-clock"></i> Menunggu Pembayaran</span></h5>
                            @else
                                <h5><span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Selesai</span></h5>
                            @endif
                        </td>
                        <td>
                            @if($transaction->confirm==0)
                                <div class="mb-4">
                                    <a href="/transaction_detail/{{ $transaction->trans_id }}" class="btn btn-outline-info mr-2"><i class="fas fa-info-circle"></i> Detail</a>
                                    <button class="btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                                <a href="/payment_upload/{{ $transaction->trans_id }}" class="btn btn-success"><i class="fas fa-upload"></i> Unggah Bukti Pembayaran</a>
                            @else
                                <a href="/transaction_detail/{{ $transaction->trans_id }}" class="btn btn-outline-info mr-2"><i class="fas fa-info-circle"></i> Detail</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="float-right">
                <a href="/user_items" class="btn btn-lg btn-primary mt-4 mb-2"><i class="fas fa-box"></i> My Items</a>
            </div>


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
