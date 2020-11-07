@extends('layouts.app')

@section('content')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

        <div class="container col-12">
            <header class="row justify-content-center">
                <div class="row col-8 bg">
                    <div class="col-6">
                        <img class="bigicon" src="{{ asset('images/bigid.png') }}">
                    </div>
                    <div class="col-6">
                        <form method="post" enctype="multipart/form-data" action="/search">
                            @csrf
                            <div class="pb-4">
                                <input class="form-control" id="key" placeholder="Search" name="key">
                            </div>
                        </form>
                        <div class="text-light">
                            <h1>
                                IDMARKET
                            </h1>
                            <div class="textbann">
                                Cari atau buat desain idcard kalian disini
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container mt-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Gratis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Premium</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <div class="row align-items-baseline">
                            <h3 class="text-light mr-3">GRATIS</h3>
                                <b><a href="/allfree"><i class="fas fa-arrow-right"></i> Lihat Semua</a></b>
                        </div>

                        <div class="row justify-content-center">

                            @foreach($Fproducts as $product)

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


                    <div id="menu1" class="container tab-pane fade"><br>
                        <div class="row align-items-baseline">
                            <h3 class="text-light mr-3">PREMIUM</h3>
                            <b><a href="/allpay"><i class="fas fa-arrow-right"></i> Lihat Semua</a></b>
                        </div>
                        <div class="row justify-content-center">
                            @foreach($Pproducts as $product)

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
                                                    <a href="#" class="btn btn-primary">Gratis</a>
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
            </div>


        </div>

    <footer class="footer">
        <h4 class="text-light">
            Idmarket 2020
        </h4>
    </footer>
@endsection
