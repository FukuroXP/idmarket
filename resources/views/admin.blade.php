@extends('layouts.admin')

@section('content')

    <div class="container col-12 h-100"
         style="background-image: url('{{ asset('images/mc.png') }}');
             background-size: cover;
             background-position: center;
             background-repeat: no-repeat;">
        <div class="col-sm-12 row justify-content-center">

                <div class="card col-sm-6 bg-dark text-light p-5 mt-5">
                    <i class="fas fa-user float-left mb-2" style="font-size: 40px"></i>
                    <h1 style="text-align: center;">SELAMAT DATANG</h1>
                    <h2 style="text-align: center;">{{ auth()->user()->name }}</h2>
                    <h4 style="text-align: center;" class="mb-5">DI HALAMAN ADMIN IDMARKET</h4>
                </div>

        </div>
    </div>

@endsection
