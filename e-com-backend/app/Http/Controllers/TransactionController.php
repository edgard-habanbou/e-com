<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function get_all_transactions()
    {
        // Get the only transactions related to the logged in user
        $user_role = auth()->user()->user_role;
        if ($user_role == 1) {

            $user_id = auth()->user()->id;

            $transactions = Transaction::join('products', 'transactions.product_id', '=', 'products.id')
                ->where('products.user_id', $user_id)
                ->select('transactions.*')
                ->get();
            return response()->json([
                'success' => true,
                'data' => $transactions
            ], 200);
        }
    }
}
