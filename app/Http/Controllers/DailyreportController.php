<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyreportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->get();
        $ts = 0;
        $ta = 0;
        if (count($payments) > 0){
            $ts = count($payments);
            foreach ($payments as $p){
                $ta = $ta + $p->amount;
            }
        }
        $paymentsToday = Payment::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->get();
        $tst = 0;
        $tat = 0;
        if (count($paymentsToday) > 0){
            $tst = count($paymentsToday);
            foreach ($paymentsToday as $pp){
                $tat = $tat + $pp->amount;
            }
        }
        return view('dailyReport.index', compact('ts', 'ta', 'tst', 'tat'));
    }



}
