@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="col-12 row justify-content-center">
            <div class="col-sm-8 mt-5">
@foreach($users as $user)
                <form method="post" enctype="multipart/form-data" action="{{route('userup.edit', $user->id)}}">
                    @csrf
                    <h3 class="mb-5">Role</h3>

                    <span class="">Name :</span>
                    <input type="text" class="form-control mb-2" value="{{ $user->name }}" id="name" name="name">
                    <span class="">Email :</span>
                    <input type="text" readonly class="form-control mb-2" value="{{ $user->email }}" id="email" name="email">
                    <span class="">Password :</span>
                    <input type="password" readonly class="form-control mb-2" value="{{ $user->password }}" id="password" name="password">
                    <span class="">Role :</span>
                    <select type="text" class="form-control mb-2" id="role_id" name="role_id">
                        <option selected value="{{ $user->role_id }}">{{ $user->role_id }} - {{ $user->rolename }}</option>
                      @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->id }} - {{ $role->title }}</option>
                        @endforeach
                    </select>

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
