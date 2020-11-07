@extends('layouts.app')

@section('content')
    @foreach($products as $product)
    <div class="col-12">
        <div class="row justify-content-center mt-5">
            <div class="">
                <img style="max-width: 300px" src="{{ asset('product_images/'.$product->primary_image) }}">
            </div>
            <div class="col-4  pl-5 text-light">

                <table cellpadding="10">
                    <tbody style="font-size: 15px; vertical-align: top;">
                    <tr>
                        <td>Nama</td>
                        <td class="w-100"><h4>{{ $product->name }}<hr class="bg-secondary"></h4></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        @if(empty($product->price))
                            <td class="w-100"><h3><span class="badge badge-success">Gratis</span> </h3><hr class="bg-secondary"></td>
                        @else
                            <td class="w-100"><h3>Rp. {{ $product->price }}</h3><hr class="bg-secondary"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Categori</td>
                        <td class="w-100"><h4>{{ $product->catename }}<hr class="bg-secondary"></h4></td>
                    </tr>
                    <tr>
                        <td>Tanggal Unggah</td>
                        <td class="w-100"><h5>{{$product->created_at}}<hr class="bg-secondary"></h5></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-8 mt-5 text-light">

                <h4>Deskripsi</h4>
                <textarea style="font-size: 18px; max-width: 85%;" readonly class="form-control" rows="4">{{$product->descriptions}}</textarea>
            </div>
        </div>
    </div>


@endforeach
        <hr class="col-8 bg-light mt-5 mb-5">
    <div class="col-12 row justify-content-center mb-5">
        <div class="col-9 pr-5 pl-5 mb-5">
            <h2 class="text-light pl-5">Rekomendasi untuk anda</h2>

            <div class="row justify-content-start mt-5 mb-5 pl-5">
                @foreach($products2 as $product)

                    <a href="/product_detail/{{ $product->id }}">

                        <div class="card m-2 bg-dark" style="width: 16rem;">
                            <img class="card-img-top" src="{{asset('product_images/'.$product->primary_image)}}" alt="Card image cap">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="ml-3">
                                        <p class="card-title pt-2">{{ $product->name }}</p>
                                    </div>
                                    <div class="float-right">
                                        <p type="button" class="btn text-light" data-toggle="tooltip" data-placement="bottom" title="{{ $product->descriptions }}">
                                            <i class="fal fa-info-circle align-top" style="font-size: 25px;"></i>
                                        </p>
                                    </div>
                                </div>


                                @if(empty($product->price))
                                    <div>
                                        <p class="card-text"><b>Gratis</b></p>
                                        <hr class="mb-2">
                                        <a href="/product_detail/{{ $product->id }}" class="btn btn-primary">Gratis</a>
                                    </div>
                                @else
                                    <div>
                                        <p class="card-text"><b>Rp. {{ $product->price }}</b></p>
                                        <hr class="mb-2">
                                        <a href="/product_detail/{{ $product->id }}" class="btn btn-primary">Beli</a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </a>

                @endforeach


            </div>
        </div>
    </div>

    @foreach($products as $product)
    <div class="footer1 bg-dark">
        <div class="col-9 pr-5">
            <div class="row float-right">

                @if(empty($product->price))

                <div class="mr-5">
                    <label>Total</label>
                    <h3>Gratis</h3>
                </div>
                <div>
                    <a href="/trans_detail/{{ $product->id }}" class="btn btn-success p-3 pr-5 pl-5">Dapatkan</a>
                </div>

                @else

                <div class="mr-5">
                    <label>Total</label>
                    <h3>Rp. {{ $product->price }}</h3>
                </div>
                <div>
                    <a href="/trans_detail/{{ $product->id }}" class="btn btn-success p-3 pr-5 pl-5">Beli</a>
                </div>

                @endif

            </div>
        </div>
    </div>
    @endforeach
@endsection
