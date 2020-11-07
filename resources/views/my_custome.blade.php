@extends('layouts.app')

@section('content')

    <div class="top2">
        <div class="col-4">
            <h3><i class="fas fa-edit"></i> Custome</h3>
        </div>
    </div>

    <div class="container col-9">
        <div class="row justify-content-center">

            <div class="col-7 mt-1 p-3 text-light" style="border-radius: 10px; background: #212529;">
                <table style="border-radius: 10px; overflow: hidden;" class="table table-hover table-dark" id="m_table_1">
                    <thead>
                    <tr>
                        <th class="align-text-top">ID</th>
                        <th class="align-text-top">Nama</th>
                        <th class="align-text-top">Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                   @foreach($customes as $custome)
                       <tr>
                           <td>{{ $custome->id }}</td>
                           <td class="w-50">{{ $custome->name }}</td>
                           <td>
                               <a href="custome/{{ $custome->id }}/att/{{ $custome->attribute_id }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Ubah</a>
                               <button class="btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                           </td>
                       </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>

                <div class="mt-3">

                    <h4 class="ml-3 text-secondary"><b>Buat Baru</b></h4>
                    <a href="c_layout" class="card w-100 p-4 border-0 m-3 btn btn-secondary">
                        <i class="fas fa-plus text-secondary" style="font-size: 150px; opacity: 0.5;"></i>
                    </a>

            </div>

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
