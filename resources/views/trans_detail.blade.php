@extends('layouts.app')

@section('content')

    <form method="post" enctype="multipart/form-data" action="/transgo">
        @csrf

        <div class="col-12 pb-5">
            <div class="row justify-content-center mt-5">
                <div class="col-4  pl-5 text-light">
                    <h3>Detail Transaksi</h3>
                    <hr class="bg-light mb-5">

                    @foreach($users as $user)

                        <h4 class="mb-5"><b>Informasi Pembeli</b></h4>

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <table cellpadding="5">
                            <tbody style="font-size: 15px; vertical-align: top;">
                            <tr>
                                <td>Nama</td>
                                <td class="w-100"><h4>{{ $user->name }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="w-100"><h4>{{ $user->email }}</h4><hr class="bg-secondary"></td>
                            </tr>
                            </tbody>
                        </table>

                    @endforeach

                    <hr class="bg-light mb-5">

                    @foreach($products as $product)

                        <h4 class="mb-5"><b>Informasi Produk</b></h4>

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <table cellpadding="5">
                            <tbody style="font-size: 15px; vertical-align: top;">
                            <tr>
                                <td>Nama</td>
                                <td class="w-100"><h4>{{ $product->name }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td class="w-100"><h3>Rp. {{ $product->price }}</h3><hr class="bg-secondary"></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td class="w-100"><h4>{{ $product->catename }}<hr class="bg-secondary"></h4></td>
                            </tr>
                            <tr>
                                <td>Tanggal Unggah</td>
                                <td class="w-100"><h5>{{$product->created_at}}<hr class="bg-secondary"></h5></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td class="w-100">
                                    <img style="max-width: 200px" src="{{ asset('product_images/'.$product->primary_image) }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="footer2 bg-dark">
                            <div class="col-9 pr-5">
                                <div class="row float-right">

                                    @if(empty($product->price))

                                        <input type="hidden" name="confirm" value="1">

                                    <div class="mr-5">
                                        <label>Total</label>
                                        <h3>Gratis</h3>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success p-3 pr-5 pl-5">Dapatkan</button>
                                    </div>

                                    @else

                                        <input type="hidden" name="confirm" value="0">

                                    <div class="mr-5">
                                        <label>Total</label>
                                        <h3>Rp. {{ $product->price }}</h3>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success p-3 pr-5 pl-5">Beli</button>
                                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>

    </form>

@endsection
