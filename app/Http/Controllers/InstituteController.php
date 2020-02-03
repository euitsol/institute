<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituteController extends Controller
{

    public function index()
    {
        $institutes = Institute::latest()->get();
        return view('institute.index', compact('institutes'));
    }


    public function create()
    {
        return view('institute.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:170',
            'district' => 'required|max:170',
            'division' => 'required|max:170',
            'website' => 'max:170',
            'address' => 'max:170'
        ]);

        $i = new Institute;
        $i->name = $request->name;
        $i->website = $request->website;
        $i->district = $request->district;
        $i->division = $request->division;
        $i->address = $request->address;
        $i->user_id = Auth::id();
        $i->save();

        $this->message('success', 'Institute info added successfully');
        return redirect()->route('institutes');
    }


    public function show($iid)
    {
        $institute = Institute::find($iid);
        return view('institute.show', compact('institute'));
    }


    public function edit($iid)
    {
        $institute = Institute::findOrFail($iid);
        return view('institute.edit', compact('institute'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:170',
            'district' => 'required|max:170',
            'division' => 'required|max:170',
            'website' => 'max:170',
            'address' => 'max:170'
        ]);

        $i = Institute::findOrFail($request->id);
        $i->name = $request->name;
        $i->website = $request->website;
        $i->district = $request->district;
        $i->division = $request->division;
        $i->address = $request->address;
        $i->update();

        $this->message('success', 'Institute info update successfully');
        return redirect()->route('institutes');
    }


    public function destroy($iid)
    {
        $institute = Institute::findOrFail($iid);
        if ($institute->teachers->count() > 0) {
            $this->message('error', 'Institute can not deleted');
            return redirect()->back();
        } elseif ($institute->students->count() > 0) {
            $this->message('error', 'Institute can not deleted');
            return redirect()->back();
        } else {
            $institute->delete();
            $this->message('success', 'Institute info delete successfully');
            return redirect()->back();
        }
    }
}
