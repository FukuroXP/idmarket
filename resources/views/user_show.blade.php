@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @if (url()->current() == 'http://127.0.0.1:8000/user_show')
                            User
                        @elseif(url()->current() == 'http://127.0.0.1:8000/admin_show')
                            Admin
                        @endif
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
                    <th>Role</th>
                    <th>Create at</th>
                    <th>Update at</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role_name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <div class="row">
                                <div class="mr-2 pb-2"><a href="/user_update/{{$user->id}}" class="btn btn-outline-primary"><i class="la la-edit"></i> </a>
                                </div>
                                <form method="POST" action="{{ route('category.destroy', [$user->id]) }}">
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
