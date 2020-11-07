@extends('layouts.app')

@section('content')

    <div class="top2">
        <div class="col-4">
            <h3><i class="fas fa-edit"></i> Nama Desain</h3>
        </div>
    </div>

<div class="row justify-content-center col-12">
    @foreach($attributes as $att)

        <div class="col-9 row justify-content-center">
            <div class="col-6 bg-dark pb-4 mt-4" style="border-radius: 15px">

                <form method="post" enctype="multipart/form-data" action="/cusgo">
                    @csrf
                    <input type="text" placeholder="Masukan Nama Desain..." class="form-control mb-4 mt-4" id="name" name="name">

                    <input type="hidden" class="form-control" id="attribute_id" name="attribute_id" value="{{ $att->id }}">
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->id() }}">

                    <button type="submit" class="btn btn-success mr-2"><i class="fas fa-arrow-right"></i> Lanjut</button>
                    <button class="btn btn-danger">Batal</button>
                </form>

            </div>
        </div>

    @endforeach
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
