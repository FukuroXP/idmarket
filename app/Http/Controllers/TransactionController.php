<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS catename')
            ->where('products.id',$id)
            ->get();

        $users = DB::table('users')
            ->select('users.*')
            ->where('users.id',auth()->id())
            ->get();

        return view('trans_detail', compact('products','users'));
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

    public function process()
    {

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
            'user_id' => 'required',
            'product_id' => 'required'
        ]);

        $transactions = new transaction;
        $transactions->user_id = $request->user_id;
        $transactions->product_id = $request->product_id;
        $transactions->confirm = $request->confirm;

        $transactions->save();

        return redirect('/user_transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.*',
                'products.*','users.name AS user_name',
                'products.name AS product_name',
                'transactions.created_at AS transaction_date',
                'transactions.id AS trans_id',
                'products.id AS prod_id',
                'products.name AS prod_name',
                'users.id AS us_id',
                'users.name AS us_name')
            ->get();

        return view('transactions_show', compact('transactions'));
    }

    public function showUser(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.*',
                'products.*','users.name AS user_name',
                'products.name AS product_name',
                'transactions.created_at AS transaction_date',
                'transactions.id AS trans_id',
                'products.id AS prod_id',
                'users.id AS us_id')
            ->where('transactions.user_id',auth()->id())
            ->get();

        return view('user_transactions', compact('transactions'));
    }

    public function showUserItems(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.*',
                'products.*','users.name AS user_name',
                'products.name AS product_name',
                'transactions.created_at AS transaction_date',
                'transactions.id AS trans_id',
                'products.id AS prod_id',
                'users.id AS us_id')
            ->where('transactions.user_id',auth()->id())
            ->where('transactions.confirm','1')
            ->get();

        return view('user_items', compact('transactions'));
    }

    public function trDetail(Transaction $transaction, Payment $payment,$id)
    {
        $payments =DB::table('payments')
            ->select('payments.*')
            ->where('payments.transaction_id',$id)
            ->get();
        $transactions = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('products', 'transactions.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('transactions.*',
                'products.*',
                'users.*',
                'users.name AS user_name',
                'products.name AS product_name',
                'transactions.created_at AS transaction_date',
                'transactions.id AS trans_id',
                'products.id AS prod_id',
                'categories.name AS catename',
                'users.id AS us_id')
            ->where('transactions.id',$id)
            ->get();

        return view('trans_detail_after', compact('transactions','payments'));
    }

    public function download($file)
    {
//        $transactions = DB::table('transactions')
//            ->join('users', 'transactions.user_id', '=', 'users.id')
//            ->join('products', 'transactions.product_id', '=', 'products.id')
//            ->select('products.file')
//            ->where('transactions.product_id',$id)
//            ->where('transactions.user_id',auth()->id())
//            ->where('transactions.confirm','1')
//            ->get();

        $url=public_path('/file/'.$file);

        //dd($url);

        return response()->download($url);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
