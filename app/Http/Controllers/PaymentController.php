<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $payments = DB::table('payments')
            ->select('payments.*')
            ->where('payments.transaction_id', $id)
            ->get();

        $transactions = DB::table('transactions')
            ->select('transactions.*')
            ->where('transactions.id', $id)
            ->get();

        return view('payment_upload', compact('transactions','payments'));
    }

    public function show($id)
    {

        $payments = DB::table('payments')
            ->select('payments.*')
            ->where('payments.transaction_id', $id)
            ->get();

        $transactions = DB::table('transactions')
            ->select('transactions.*')
            ->where('transactions.id', $id)
            ->get();

        return view('payment_show', compact('transactions','payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'proof_image' => 'required'
        ]);

        $pay = new Payment;
        $pay->transaction_id = $request->transaction_id;

        if($request->hasFile('proof_image')){
            $file = $request->file('proof_image');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('proof_image');
            $file->move($ServicesPath, $fileName);
            $pay->proof_image = $fileName;

        }

        $pay->save();

//        dd($pay);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $request->validate([
                'confirm' => 'required',

            ]);

            $transactions = Transaction::where('id', $id)->first();
            $transactions->confirm = $request->confirm;

            }

            $transactions->save();

            return redirect('/transactions_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::where('id',$id)->first();

        if ($payment != null) {
            $payment->delete();
            return redirect()->back()->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->back()->with(['message'=> 'Wrong ID!!']);
    }
}
