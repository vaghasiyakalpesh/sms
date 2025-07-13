<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function index()
    {
        $feeStructures = FeeStructure::with(['feeHead', 'class', 'academicYear'])->get();
        return view('admin.fee_structure.index', compact('feeStructures'));
    }
    public function create()
    {
        $classes = Classes::all();
        $feeHeads = FeeHead::all();
        $academicYears = AcademicYear::all();

        return view('admin.fee_structure.create', compact('classes', 'feeHeads', 'academicYears'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fee_head' => 'required|exists:fee_heads,id',
            'class' => 'required|exists:classes,id',
            'academic_year' => 'required|exists:academic_years,id',
            'january' => 'numeric',
            'february' => 'numeric',
            'march' => 'numeric',
            'april' => 'numeric',
            'may' => 'numeric',
            'june' => 'numeric',
            'july' => 'numeric',
            'august' => 'numeric',
            'september' => 'numeric',
            'october' => 'numeric',
            'november' => 'numeric',
            'december' => 'numeric',

        ]);

        $feeStructure = new FeeStructure();
        $feeStructure->fee_head_id = $request->fee_head;
        $feeStructure->class_id = $request->class;
        $feeStructure->academic_year_id = $request->academic_year;
        $feeStructure->january = $request->january;
        $feeStructure->february = $request->february;
        $feeStructure->march = $request->march;
        $feeStructure->april = $request->april;
        $feeStructure->may = $request->may;
        $feeStructure->june = $request->june;
        $feeStructure->july = $request->july;
        $feeStructure->august = $request->august;
        $feeStructure->september = $request->september;
        $feeStructure->october = $request->october;
        $feeStructure->november = $request->november;
        $feeStructure->december = $request->december;
        $feeStructure->save();
        return redirect()->route('fee-structure.index')->with('success', 'Fee Structure created successfully.');
    }

    public function edit($id)
    {
        $classes = Classes::all();
        $feeHeads = FeeHead::all();
        $academicYears = AcademicYear::all();
        $feeStructure = FeeStructure::findOrFail($id);
        return view('admin.fee_structure.edit', compact('feeStructure', 'classes', 'feeHeads', 'academicYears'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'fee_head' => 'required|exists:fee_heads,id',
            'class' => 'required|exists:classes,id',
            'academic_year' => 'required|exists:academic_years,id',
            'january' => 'numeric',
            'february' => 'numeric',
            'march' => 'numeric',
            'april' => 'numeric',
            'may' => 'numeric',
            'june' => 'numeric',
            'july' => 'numeric',
            'august' => 'numeric',
            'september' => 'numeric',
            'october' => 'numeric',
            'november' => 'numeric',
            'december' => 'numeric',
        ]);

        $feeStructure = FeeStructure::findOrFail($request->id);
        $feeStructure->fee_head_id = $request->fee_head;
        $feeStructure->class_id = $request->class;
        $feeStructure->academic_year_id = $request->academic_year;
        $feeStructure->january = $request->january;
        $feeStructure->february = $request->february;
        $feeStructure->march = $request->march;
        $feeStructure->april = $request->april;
        $feeStructure->may = $request->may;
        $feeStructure->june = $request->june;
        $feeStructure->july = $request->july;
        $feeStructure->august = $request->august;
        $feeStructure->september = $request->september;
        $feeStructure->october = $request->october;
        $feeStructure->november = $request->november;
        $feeStructure->december = $request->december;
        $feeStructure->save();

        return redirect()->route('fee-structure.index')->with('success', 'Fee Structure updated successfully.');
    }

    public function destroy($id)
    {
        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->delete();
        return redirect()->route('fee-structure.index')->with('success', 'Fee Structure deleted successfully.');
    }
}
