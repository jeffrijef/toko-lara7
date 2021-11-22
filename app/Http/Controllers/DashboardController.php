<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TransactionDetail;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){
                            $product->where('users_id', Auth::user()->id);
                        });
        $rev = $transaction->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });
        
        $cos = User::count();

        return view('pages.dashboard',[
            'tran_c' => $transaction->count(),
            'tran_d' => $transaction->get(),
            'rev' => $rev,
            'cos' => $cos
        ]);
    }
}
