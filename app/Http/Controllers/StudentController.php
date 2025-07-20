<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'class' => 'nullable|exists:classes,id',
            'academic_year' => 'nullable|exists:academic_years,id',
        ]);

        $students = User::query()->with(['class', 'academicYear'])->where('role', 'student')->latest();

        if ($request->filled('class')) {
            $students->where('class_id', $request->get('class'));
        }

        if ($request->filled('academic_year')) {
            $students->where('academic_year_id', $request->get('academic_year'));
        }

        $students = $students->get();
        $academicYears = AcademicYear::all();
        $classes = Classes::all();

        return view('admin.student.index', compact('students', 'academicYears', 'classes'));
    }
    public function create()
    {
        $classes = Classes::all();
        $academicYears = AcademicYear::all();

        return view('admin.student.create', compact('classes', 'academicYears'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|exists:classes,id',
            'academic_year' => 'required|exists:academic_years,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|numeric|min:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'admission_date' => 'required|date',
        ]);

        $student = new User();
        $student->class_id = $request->class;
        $student->academic_year_id = $request->academic_year;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile_no = $request->mobile_no;
        $student->address = $request->address;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->dob = $request->dob;
        $student->admission_date = $request->admission_date;
        $student->password = Hash::make($request->password);
        $student->role = 'student';
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student Register successfully.');
    }

    public function edit($id)
    {
        $classes = Classes::all();
        $academicYears = AcademicYear::all();
        $student = User::findOrFail($id);
        return view('admin.student.edit', compact('student', 'classes', 'academicYears'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'class' => 'required|exists:classes,id',
            'academic_year' => 'required|exists:academic_years,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'mobile_no' => 'required|numeric|min:15',
            'address' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'admission_date' => 'required|date',
        ]);

        $student = User::findOrFail($request->id);
        $student->class_id = $request->class;
        $student->academic_year_id = $request->academic_year;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile_no = $request->mobile_no;
        $student->address = $request->address;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->dob = $request->dob;
        $student->admission_date = $request->admission_date;

        $student->save();

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $feeStructure = User::findOrFail($id);
        $feeStructure->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
