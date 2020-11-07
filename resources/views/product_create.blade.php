@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="col-12 row justify-content-center">
            <div class="col-sm-8 mt-5">

                <form method="post" enctype="multipart/form-data" action="/admin/prodgo">
                    @csrf
                    <h3 class=" mb-5">Product</h3>

                    <span class="">Nama :</span>
                    <input type="text" class="form-control mb-2" id="name" name="name">

                    <span class="">Deskripsi :</span>
                    <input type="text" class="form-control mb-2" id="descriptions" name="descriptions">

                    <span class="">Harga :</span>
                    <input type="text" class="form-control mb-2" id="price" name="price">

                    <span class="">kategori :</span>
                    <div class="form-group">
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <span class="">Gambar :</span>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="primary_image">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>

                    <span class="">File :</span>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="file">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>

                    <div class="mt-3 row float-right pr-3">
                        <button type="submit" class="btn btn-success mr-2"><spam class="fas fa-check"> </spam> Simpan</button>
                        <button href="/home" class="btn btn-danger"><spam class="fas fa-times"> </spam> Batal</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
