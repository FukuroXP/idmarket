@extends('layouts.app')

@section('content')

<div class="col-12 row justify-content-center">
    <div style="border-radius: 10px; overflow: hidden" class="col-6 bg-dark p-5 mt-5">

        <h3 class="text-light mb-3">Bukti pembayaran</h3>

       <div class="row">
           @foreach($payments as $payment)

               <div class="mr-3">
                   <form method="POST" action="{{ route('proof.destroy', [$payment->id]) }}">
                       {{ csrf_field() }}
                       {{ method_field('DELETE') }}
                       <img style="max-width: 100px" src="{{ asset('proof_image/'.$payment->proof_image) }}"><br>
                       <button type="submit" class="btn btn-outline-danger mt-2 mb-3"><i class="fas fa-trash"></i> Hapus</button>
                   </form>
               </div>

           @endforeach
       </div>

        <hr class="bg-secondary">

        <form method="post" enctype="multipart/form-data" action="/paygo">
            @csrf
            <h3 class="text-light mt-5 mb-3">Unggah bukti pembayaran</h3>
            @foreach($transactions as $transaction)
            <input name="transaction_id" class="form-control" type="hidden" value="{{ $transaction->id }}">
            @endforeach

            <input name="proof_image" class="form-control-file form-control-lg text-light" type="file">

            <button type="submit" class="btn btn-success mt-3"><i class="fas fa-upload"></i> Ungggah</button>
            <a href="/user_transactions" class="btn btn-primary mt-3 ml-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        </form>
    </div>
</div>

@endsection

