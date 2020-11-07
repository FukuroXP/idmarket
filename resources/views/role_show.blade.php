@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Role
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Create at</th>
                        <th>Update at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->title }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td>
                            <div class="row">
                                <div class="mr-2 pb-2"><a href="/category_update/{{$role->id}}" class="btn btn-outline-primary"><i class="la la-edit"></i> </a>
                                </div>
                            <form method="POST" action="{{ route('category.destroy', [$role->id]) }}">
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
