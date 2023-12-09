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
    public function index()
    {
        $user_role = auth()->user()->user_role;
        if ($user_role == 1) {

            $transactions = Transaction::whereHas('product', function ($query) {
                $user_id = auth()->user()->user_id;
                $query->where('user_id', $user_id);
            })->get();
            return response()->json([
                "status" => "success",
                "data" => $transactions
            ]);
        }
    }
}
