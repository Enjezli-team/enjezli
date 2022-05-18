<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class WalletController extends Controller
{
    public function showTransactions()
    {

        $balance = Auth::user()->balance;
        $data = DB::table('transactions')
            ->where('payable_id', Auth::user()->id)
            ->get();
        return view('website.users.wallet.index', compact('data', 'balance'));
    }

    public function showWallets()
    {
        $data = DB::table('transactions')
            ->get();
        return view('website.users.wallet.index', compact('data'));
    }
    /**----------------------
     *      admin show single wallet
     *------------------------**/

    public function showUserTransactions($user_id)
    {
        $wallet = DB::table('wallets')
            ->where('holder_id', $user_id)
            ->first();
        $balance = $wallet->balance;
        $data = DB::table('transactions')
            ->where('payable_id', $user_id)
            ->get();
        // return response($transactions);
        // return view('website.users.offers.transactions', compact('data', 'balance'));
        return view('website.users.wallet.index', compact('data', 'balance'));
    }
}
