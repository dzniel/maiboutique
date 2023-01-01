<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * View user's transaction history page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('pages.history', [
            'transactions' => $transactions
        ]);
    }
}
