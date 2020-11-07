@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="col-12 row justify-content-center">
            <div class="col-sm-8 mt-5">
                @foreach($categories as $category)
                    <form method="post" enctype="multipart/form-data" action="{{route('cateup.edit', $category->id)}}">
                        @csrf
                        <h3 class="mb-5">Category</h3>

                        <span class="">Nama :</span>
                        <input type="text" class="form-control mb-2" value="{{ $category->name }}" id="name" name="name">

                        <span class="">Panjang :</span>
                        <input type="text" class="form-control mb-2" value="{{ $category->l }}" id="l" name="l">

                        <span class="">Lebar :</span>
                        <input type="text" class="form-control mb-2" value="{{ $category->w }}" id="w" name="w">

                        <span class="">Deskripsi :</span>
                        <input type="text" class="form-control mb-2" value="{{ $category->descriptions }}" id="descriptions" name="descriptions">

                        <div class="form-group">
                            <label for="customizable">Bisa dicustome ? :</label>
                            <select class="form-control" id="customizable" name="customizable">
                                @if($category->customizable == 0)
                                    <option value="{{ $category->customizable }}">Tidak</option>
                                    <option value="1">Ya</option>
                                @elseif($category->customizable == 1)
                                    <option value="{{ $category->customizable }}">Ya</option>
                                    <option value="0">Tidak</option>
                                @endif
                            </select>
                        </div>

                        <div class="mt-3 row float-right pr-3">
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <button href="/home" class="btn btn-danger">Batal</button>
                        </div>

                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
