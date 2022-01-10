<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\{ Transaction, Room };

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        $user = auth()->user();

        return view('transaction.create', [
            'room' => $room,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(auth()->user());
        // make validation 
        $this->validate($request, [
            'room_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);

        try {
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'room_id' => $request->room_id,
                'total_price' => $request->total_price,
                'payment_status' => 1,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
            ]);
            // dd($transaction);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('transaction.show', $transaction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaction->load('room');
        $res = $transaction->load('user');
        
        $snapToken = $transaction->snap_token;

        if(empty($snapToken)) {
            $midtrans = new CreateSnapTokenService($transaction);
            $snapToken = $midtrans->getSnapToken();

            $transaction->snap_token = $snapToken;
            $transaction->save();
        }

        return view('transaction.show', compact('transaction', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
