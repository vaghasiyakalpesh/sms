<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('admin.class.index', compact('classes'));
    }
    public function create()
    {
        return view('admin.class.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:classes,name',
        ]);
        $class = new Classes();
        $class->name = $request->name;
        $class->save();
        return redirect()->route('class.index')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('admin.class.edit', compact('class'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:classes,id',
            'name' => 'required|string|unique:classes,name,' . $request->id,
        ]);

        $class = Classes::findOrFail($request->id);
        $class->name = $request->name;
        $class->save();

        return redirect()->route('class.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        return redirect()->route('class.index')->with('success', 'Class deleted successfully.');
    }

}
