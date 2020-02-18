<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Models\Marketingcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $datalist['converse_with'] = DB::select(DB::raw('SELECT converse_with FROM marketingcomments GROUP BY converse_with'));
        $marketings = Marketing::where('status', null)->orderBy('created_at', 'desc')->get();
        foreach ($marketings as $m) {
            $m['comments'] = Marketingcomment::where('marketing_id', $m->id)->get();
        }
        return view('marketing.list', compact('marketings', 'datalist'));
    }


    public function admittedList()
    {
        $marketings = Marketing::where('status', 'admitted')->orderBy('created_at', 'desc')->get();
        foreach ($marketings as $m) {
            $m['comments'] = Marketingcomment::where('marketing_id', $m->id)->get();
        }
        return view('marketing.admittedList', compact('marketings'));
    }


    public function notInterestedList()
    {
        $marketings = Marketing::where('status', 'not-interested')->orderBy('created_at', 'desc')->get();
        foreach ($marketings as $m) {
            $m['comments'] = Marketingcomment::where('marketing_id', $m->id)->get();
        }
        return view('marketing.notInterestedList', compact('marketings'));
    }


    public function create()
    {
        $datalist['course'] = DB::select(DB::raw('SELECT course FROM marketings GROUP BY course'));
        $datalist['converse_with'] = DB::select(DB::raw('SELECT converse_with FROM marketingcomments GROUP BY converse_with'));
        return view('marketing.add', compact('datalist'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
            'date' => 'required|date',
            'nextDate' => 'required|date',
            'converseWith' => 'required',
            'comment' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $m = new Marketing;
            $m->name = $request->name;
            $m->course = $request->course;
            $m->mobile = $request->mobile;
            $m->email = $request->email;
            $m->address = $request->address;
            $m->next_date = $request->nextDate;
            $m->save();
            $mc = new Marketingcomment;
            $mc->marketing_id = $m->id;
            $mc->date = $request->date;
            $mc->converse_with = $request->converseWith;
            $mc->comment = $request->comment;
            $mc->save();
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('success', "The marketing info has been added successfully.");
            return redirect()->route('marketing.list');
        } else {
            Session::flash('error', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function storeComment(Request $request, $mid)
    {
        $request->validate([
            'date' => 'required|date',
            'converseWith' => 'required',
            'nextDate' => 'required|date',
            'comment' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $m = Marketing::find($mid);
            $m->next_date = $request->nextDate;
            $m->update();
            $mc = new Marketingcomment;
            $mc->marketing_id = $mid;
            $mc->date = $request->date;
            $mc->converse_with = $request->converseWith;
            $mc->comment = $request->comment;
            $mc->save();
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('success', "The marketing comment has been added successfully.");
            return redirect()->route('marketing.list');
        } else {
            Session::flash('error', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function destroy($mid)
    {
        DB::beginTransaction();
        try {
            Marketing::find($mid)->delete();
            Marketingcomment::where('marketing_id', $mid)->delete();
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('success', "The marketing info has been deleted successfully.");
            return redirect()->route('marketing.list');
        } else {
            Session::flash('error', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function admitted($mid)
    {
        $m = Marketing::find($mid);
        $m->status = 'admitted';
        $m->update();
        Session::flash('success', "The marketing info has been moved to admitted list successfully.");
        return redirect()->back();
    }


    public function notInterested($mid)
    {
        $m = Marketing::find($mid);
        $m->status = 'not-interested';
        $m->update();
        Session::flash('success', "The marketing info has been moved to not-interested list successfully.");
        return redirect()->back();
    }


    public function interested($mid)
    {
        $m = Marketing::find($mid);
        $m->status = null;
        $m->update();
        Session::flash('success', "The marketing info has been moved to default list successfully.");
        return redirect()->back();
    }

}
