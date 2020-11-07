@extends('layouts.app')

@section('content')

    <div class="top2">
        <div class="col-4">
            <h3><i class="fas fa-edit"></i> Pilih Layout</h3>
        </div>
    </div>


    <div class="container col-9">
        <div class="mt-3 row justify-content-center">
            @foreach($categories as $category)
                <form class="col-2 p-0 m-3" method="post" enctype="multipart/form-data" action="/attgo" >
                    @csrf
                    <div>
                        <input class="form-control" type="hidden" value="{{ $category->id }}" name="category_id">
                    </div>

                    <button class="card w-100 p-0 pb-3 border-0 btn btn-secondary" type="submit">
                        <h1 class="text-dark w-100" style="font-size: 140px; text-align: center; opacity: 0.3"><b>{{ $category->name }}</b></h1>
                        <div class="cate1">
                            <div class="cate2 text-left">
                                <h4>{{ $category->l }} x {{ $category->w }}</h4>
                                <h5>{{ $category->descriptions }}</h5>
                            </div>
                        </div>
                    </button>
                </form>
            @endforeach
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
