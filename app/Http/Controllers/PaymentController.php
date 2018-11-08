<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function create(Contract $contract)
    {
        return view('dashboard.payment.create' , compact('contract'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request , Contract  $contract )
    {
        // TODO: Generate Receipt

        $this->validate($request , [
            'amount' => 'required|numeric|min:1|max:'.$contract->balance,
            'type' => 'required|string|in:cash,eco-cash',
            'reference' => 'required_if:type,==,eco-cash',
        ]);

        // TODO : Add Money to user

        // TODO : Initiate transaction

        // TODO : Debit and Credit Accounts

        /** @noinspection PhpUndefinedFieldInspection */

        $contract->update([
            'balance' => $contract->balance - $request->amount
        ]);

        return back()->with('message','Payment Was Successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

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
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
