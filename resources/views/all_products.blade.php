@extends('layouts.app')

@section('content')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <div class="col-12 search2">
        <div class="col-10">
            <div class="col-4 float-right mt-4">
                <form method="post" enctype="multipart/form-data" action="/search">
                    @csrf
                    <input type="text" class="form-control" placeholder="Cari" name="key">
                </form>
            </div>
        </div>
    </div>


    <div class="top2">
        <div class="col-4">
            @if (url()->current() == 'http://127.0.0.1:8000/allfree')
                <h3 class="text-light mr-3">GRATIS</h3>
            @elseif(url()->current() == 'http://127.0.0.1:8000/allpay')
                <h3 class="text-light mr-3">PREMIUM</h3>
            @else
                <h3 class="text-light mr-3">Hasil Pencarian</h3>
            @endif
        </div>
    </div>

    <div class="row justify-content-center col-12">

        <div class="row justify-content-center col-9">

            @forelse($products as $product)
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
            @empty
                    <div class="container col-12 bg-secondary row justify-content-center mt-5 p-2 pt-3" style="border-radius: 10px;">
                        <h1 class="text-light">Kata kunci tidak ditemukan</h1>
                    </div>
            @endforelse
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
    </
@endsection
