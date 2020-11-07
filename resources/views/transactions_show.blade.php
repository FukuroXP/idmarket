@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Transactions
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                    <tr>
                        <th>Transaction Id</th>
                        <th>User Id Id</th>
                        <th>User Name</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Create at</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->trans_id }}</td>
                        <td>{{ $transaction->us_id }}</td>
                        <td>{{ $transaction->us_name }}</td>
                        <td>{{ $transaction->prod_id }}</td>
                        <td>{{ $transaction->prod_name }}</td>
                        <td>
                            @if(empty($transaction->price))
                                <p>Free</p>
                            @else
                                <p>Rp. {{ $transaction->price }}</p>
                            @endif
                        </td>
                        <td><img style="max-width: 100px" src="{{ asset('product_images/'.$transaction->primary_image) }}"></td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                            @if($transaction->confirm==0)
                                <h5><span class="badge badge-pill badge-warning"><i class="fas fa-clock"></i> Waiting</span></h5>
                            @else
                                <h5><span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Complete</span></h5>
                            @endif
                        </td>
                        <td>
                            <div class="">
                                <div class="row">
                                    <div class="mr-2 pb-2"><a href="/product_update/{{$transaction->id}}" class="btn btn-outline-primary ml-4 mr-4"><i class="la la-edit"></i> </a>
                                    </div>
                                    <form method="POST" action="{{ route('product.destroy', [$transaction->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div><button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-outline-danger"><i class="la la-trash"></i></button></div>
                                    </form>
                                </div>
                                <div>
                                    <a href="/payment_show/{{ $transaction->trans_id }}" class="btn btn-outline-success">Check payment</a>
                                </div>
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
