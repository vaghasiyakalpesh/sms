<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('admin.academic_year.index', compact('academicYears'));
    }
    public function create()
    {
        return view('admin.academic_year.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:academic_years,name',
        ]);
        $academicYear = new AcademicYear();
        $academicYear->name = $request->name;
        $academicYear->save();
        return redirect()->route('academic-year.index')->with('success', 'Academic Year created successfully.');
    }

    public function edit($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        return view('admin.academic_year.edit', compact('academicYear'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:academic_years,id',
            'name' => 'required|string|unique:academic_years,name,' . $request->id,
        ]);

        $academicYear = AcademicYear::findOrFail($request->id);
        $academicYear->name = $request->name;
        $academicYear->save();

        return redirect()->route('academic-year.index')->with('success', 'Academic Year updated successfully.');
    }

    public function destroy($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->delete();
        return redirect()->route('academic-year.index')->with('success', 'Class deleted successfully.');
    }
}
