<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')->get();
        return response()->json($reports);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $report = Report::create($request->all());
        return response()->json($report);
    }

    public function show($id)
    {
        $report = Report::with('user')->findOrFail($id);
        return response()->json($report);
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $report->update($request->only('title', 'content'));

        return response()->json($report);
    }

    public function destroy($id)
    {
        Report::findOrFail($id)->delete();
        return response()->json(['message' => 'Report deleted successfully']);
    }
}
