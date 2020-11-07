@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Category
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Deskripsi</th>
                        <th>Create at</th>
                        <th>Update at</th>
                        <th>Customizable</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->l }}</td>
                        <td>{{ $category->w }}</td>
                        <td>{{ $category->descriptions }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            @if($category->customizable == 0)
                                Tidak
                            @elseif($category->customizable == 1)
                            Ya
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="mr-2 pb-2"><a href="/category_update/{{$category->id}}" class="btn btn-outline-primary"><i class="la la-edit"></i> </a>
                                </div>
                            <form method="POST" action="{{ route('category.destroy', [$category->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div><button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-outline-danger"><i class="la la-trash"></i></button></div>
                            </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        </div>
    </div>

@endsection
