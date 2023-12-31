<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterviewRequest;
use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::latest();

        if (\request('search')) {
            $interviews->where('full_name', 'like', '%' . \request('search') . '%');
        }

        return view('interviews.index', [
            'interviews' => $interviews->paginate(50)
        ]);
    }

    public function create()
    {
        return view('interviews.create');
    }

    public function store(InterviewRequest $request)
    {
        Interview::create($request->all());

        return redirect()->route('interview');
    }

    public function edit(string $id)
    {

        return view('interviews.edit', [
            'interview' => Interview::findOrFail($id)
        ]);
    }

    public function update(InterviewRequest $request, Interview $interview)
    {
        $interview->update($request->all());

        return redirect()->route('interview');

    }

    public function destroy(string $id)
    {
        Interview::find($id)->delete();

        return back();
    }
}
