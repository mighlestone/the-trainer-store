<?php

namespace App\Http\Controllers;

use App\Shoe;
use App\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stockIndex()
    {
        $stock = StockTransaction::all();
        $index = $stock->groupBy('shoe_id');

        return response()->json([
            'data' => $index
        ], 200);
    }

    /**
     * Return an list of all the transactions
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function transactionIndex()
    {
        $transactions = StockTransaction::all();

        return response()->json([
            'data' => $transactions
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transactionStore(Request $request)
    {
        $transaction = StockTransaction::create([
            'action' => $request->action,
            'user_id' => $request->user()->id,
            'shoe_id' => $request->shoe_id,
            'shoe_size_id' => $request->shoe_size_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price
        ]);

        return response()->json([
            'data' => [
                'id' => $transaction->id
            ]
        ], 200);
    }

    /**
     * Return stock information of a particular shoe
     *
     * @param Shoe $shoe
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStock(Shoe $shoe)
    {
        $stock = StockTransaction::where('shoe_id', $shoe->id)->get();

        return response()->json([
            'data' => $stock
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param StockTransaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function getTransaction(StockTransaction $transaction)
    {
        return response()->json([
            'data' => $transaction
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param StockTransaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function transactionUpdate(Request $request, StockTransaction $transaction)
    {
        $transaction->update([
            'action' => $request->action,
            'shoe_id' => $request->shoe_id,
            'shoe_size_id' => $request->shoe_size_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price
        ]);

        return response()->json([
            'data' => [
                'id' => $transaction->id
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StockTransaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function transactionDestroy(StockTransaction $transaction)
    {
        $transaction->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
