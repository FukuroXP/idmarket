@extends('layouts.admin')

@section('content')


    <div class="m-portlet m-portlet--mobile mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Payment
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <div class="row">
                @foreach($payments as $payment)

                    <div class="mr-3">
                        <img style="max-width: 400px" src="{{ asset('proof_image/'.$payment->proof_image) }}"><br>
                        <div class="row">
                            <form method="post" enctype="multipart/form-data" action="{{route('payment.edit', $payment->transaction_id)}}">
                                @csrf
                                <input type="hidden" name="confirm" value="1">
                                <button type="submit" class="btn btn-outline-success mt-2 mb-3 mr-3 ml-4"><i class="fas fa-check"></i> Confirm</button>
                            </form>
                            <form method="POST" action="{{ route('proof.destroy', [$payment->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger mt-2 mb-3"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
        </div>
    </div>

@endsection
