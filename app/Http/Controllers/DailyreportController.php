<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
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
        if (count($payments) > 0) {
            $ts = count($payments);
            foreach ($payments as $p) {
                $ta = $ta + $p->amount;
            }
        }
        $paymentsToday = Payment::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->get();
        $tst = 0;
        $tat = 0;
        if (count($paymentsToday) > 0) {
            $tst = count($paymentsToday);
            foreach ($paymentsToday as $pp) {
                $tat = $tat + $pp->amount;
            }
        }
        return view('dailyReport.index', compact('ts', 'ta', 'tst', 'tat'));
    }


    public function drajax()
    {
        if (request()->ajax()) {
            $date = $_GET['date'];
            $payments = Payment::where('user_id', Auth::id())->whereDate('created_at', $date)->get();
            $ts = 0;
            $ta = 0;
            if (count($payments) > 0) {
                $ts = count($payments);
                foreach ($payments as $p) {
                    $ta = $ta + $p->amount;
                }
            }
            $data = [$ts, $ta];
            return $data;
        } else {
            abort(403);
        }
    }


    public function birthday()
    {
        if (Auth::user()->role == 'admin') {
            $students = Student::whereRaw('DAYOFYEAR(curdate()) =  dayofyear(dob)')->orderByRaw('DAYOFYEAR(dob)')->get();
            foreach ($students as $s) {
                $s['institute'] = $s->institute->name;
                $bn = [];
                $bs = $s->batches;
                foreach ($bs as $batch) {
                    $bn[] = batch_name($batch->course->title_short_form, $batch->year, $batch->month, $batch->batch_number);
                }
                $s['batches'] = $bn;
            }
            return view('birthday.index', compact('students'));
        } else {
            abort(403);
        }
    }


}
