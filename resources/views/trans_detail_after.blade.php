@extends('layouts.app')

@section('content')

        <div class="col-12 pb-5">
            <div class="row justify-content-center mt-5">
                <div class="col-6 p-5 text-light bg-dark" style="border-radius: 10px">
                    <h3>Detail Transaksi</h3>
                    @foreach($transactions as $transaction)
                        <div class="row pl-4">
                            <div>
                                <span>{{ $transaction->transaction_date }}</span>
                            </div>
                            <div class="ml-2">
                                @if($transaction->confirm==0)
                                    <h5><span class="badge badge-pill badge-warning"><i class="fas fa-clock"></i> Menunggu pembayaran</span></h5>
                                @else
                                    <h5><span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Selesai</span></h5>
                                @endif
                            </div>
                        </div>
                    <hr class="bg-light mb-5">



                        <h4 class="mb-5"><b>Detail Pembeli</b></h4>

                        <input type="hidden" name="user_id" value="{{ $transaction->id }}">

                        <table cellpadding="5">
                            <tbody style="font-size: 15px; vertical-align: top;">
                            <tr>
                                <td>Nama</td>
                                <td class="w-100"><h4>{{ $transaction->name }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="w-100"><h4>{{ $transaction->email }}</h4><hr class="bg-secondary"></td>
                            </tr>
                            </tbody>
                        </table>


                    <hr class="bg-light mb-5">

                        <h4 class="mb-5"><b>Detail Produk</b></h4>

                        <input type="hidden" name="product_id" value="{{ $transaction->id }}">

                        <table cellpadding="5">
                            <tbody style="font-size: 15px; vertical-align: top;">
                            <tr>
                                <td>Nama</td>
                                <td class="w-100"><h4>{{ $transaction->product_name }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                @if(empty($transaction->price))
                                    <td class="w-100"><h3>Gratis</h3><hr class="bg-secondary"></td>
                                @else
                                    <td class="w-100"><h3>Rp. {{ $transaction->price }}</h3><hr class="bg-secondary"></td>
                                @endif
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td class="w-100"><h4>{{ $transaction->catename }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td class="w-100"><h5>{{$transaction->descriptions}}<hr class="bg-secondary"></h5></td>
                            </tr>
                            <tr>
                                <td>Tanggal Unggah</td>
                                <td class="w-100"><h5>{{$transaction->created_at}}<hr class="bg-secondary"></h5></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td class="w-100">
                                    <img style="max-width: 200px" src="{{ asset('product_images/'.$transaction->primary_image) }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    @endforeach


                    @foreach($payments as $payment)

                        @if(empty($payment->id))
                        @else

                        <hr class="bg-light mb-5">

                        <h4 class="mb-5"><b>Detail Pembayaran</b></h4>


                        <table cellpadding="5">
                            <tbody style="font-size: 15px; vertical-align: top;">
                            <tr>
                                <td>ID Pembayaran</td>
                                <td class="w-100"><h4>{{ $payment->id }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td class="w-100">
                                    <img style="max-width: 200px" src="{{ asset('proof_image/'.$payment->proof_image) }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        @endif

                    @endforeach

                    <hr class="bg-light mb-5">

                    <div class="mt-5">
                        <a href="/user_items" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
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
