@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="col-12 row justify-content-center">
            <div class="col-sm-8 mt-5">
@foreach($products as $product)
                <form method="post" enctype="multipart/form-data" action="{{route('produp.edit', $product->id)}}">
                    @csrf
                    <h3 class="text-light mb-5">Product</h3>

                    <span class="text-light">Nama :</span>
                    <input type="text" class="form-control mb-2" value="{{ $product->name }}" id="name" name="name">

                    <span class="text-light">Deskripsi :</span>
                    <input type="text" class="form-control mb-2" value="{{ $product->descriptions }}" id="descriptions" name="descriptions">

                    <span class="text-light">Harga :</span>
                    <input type="text" class="form-control mb-2" value="{{ $product->price }}" id="price" name="price">

                    <span class="text-light">kategori :</span>
                    <div class="form-group">
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <span class="text-light">Gambar :</span>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" value="{{ $product->primary_image }}" name="primary_image">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>
                    <span class="">File :</span>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" value="{{ $product->file }}" name="file">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>

                    <div class="mt-3 row float-right pr-3">
                        <button type="submit" class="btn btn-success mr-2"><i class="fas fa-check"></i> Simpan</button>
                        <a href="/admin/product_show" class="btn btn-danger">Batal</a>
                    </div>

                </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
