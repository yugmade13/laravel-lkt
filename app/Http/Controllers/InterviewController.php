<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::latest()->paginate(50);

        return view('interviews.index', compact('interviews'));
    }

    public function create()
    {
        return view('interviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50'],
            'phone_number' => ['required', 'max:50'],
            'email' => ['required', 'max:50'],
            'ip_address' => ['required', 'max:20'],
            'status' => ['required', 'max:9'],
        ]);

        Interview::create($request->all());

        return redirect()->route('interview');
    }

    public function edit(string $id)
    {

        return view('interviews.edit', [
            'interview' => Interview::findOrFail($id)
        ]);
    }

    public function update(Request $request, Interview $interview)
    {
        $request->validate([
            'full_name' => ['required', 'max:50'],
            'phone_number' => ['required', 'max:50'],
            'email' => ['required', 'max:50'],
            'ip_address' => ['required', 'max:20'],
            'status' => ['required', 'max:9'],
        ]);

        $interview->update($request->all());

        return redirect()->route('interview');

    }

    public function destroy(string $id)
    {
        Interview::find($id)->delete();

        return back();
    }
}
