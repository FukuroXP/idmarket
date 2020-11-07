@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Product
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


                <table class="table table-bordered table-hover table-light" id="m_table_1">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Create at</th>
                        <th>Update at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->descriptions }}</td>
                        <td>
                            @if(empty($product->price))
                                <p>Free</p>
                            @else
                                <p>Rp. {{ $product->price }}</p>
                            @endif
                        </td>
                        <td>{{ $product->category_id }} - {{ $product->catename }}</td>
                        <td><img style="max-width: 100px" src="{{ asset('product_images/'.$product->primary_image) }}"></td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <div class="row">
                                <div class="mr-2 pb-2"><a href="product_update/{{$product->id}}" class="btn btn-outline-primary"><i class="la la-edit"></i> </a>
                                </div>
                                <form method="POST" action="{{ route('product.destroy', [$product->id]) }}">
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

@endsection
