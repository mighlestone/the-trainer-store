<?php

namespace App\Http\Controllers\Stock;

use App\Fee;
use App\StockTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeController extends Controller
{
    /**
     * Return a list of fees on a given transaction
     *
     * @param StockTransaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(StockTransaction $transaction)
    {
        $fees = Fee::where('stock_transaction_id', $transaction->id)->get();

        return response()->json([
            'data' => $fees
        ], 200);
    }

    /**
     * Store a new fee entry
     *
     * @param Request $request
     * @param StockTransaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StockTransaction $transaction)
    {
        $fee = Fee::create([
            'stock_transaction_id' => $transaction->id,
            'label' => $request->label,
            'sum_type' => $request->sum_type,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'data' => $fee->id
        ], 200);
    }

    /**
     * Update a fee on a transaction
     *
     * @param Request $request
     * @param StockTransaction $transaction
     * @param Fee $fee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StockTransaction $transaction, Fee $fee)
    {
        $fee->update([
            'stock_transaction_id' => $transaction->id,
            'label' => $request->label,
            'sum_type' => $request->sum_type,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'data' => $fee->id
        ], 200);
    }

    /**
     * Delete a fee
     *
     * @param StockTransaction $transaction
     * @param Fee $fee
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(StockTransaction $transaction, Fee $fee)
    {
        $fee->delete();

        return response()->json([
            'data' => [
                'message' => 'success'
            ]
        ], 200);
    }
}
