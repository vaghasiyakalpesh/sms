<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    public function index()
    {
        $fee_heads = FeeHead::all();
        return view('admin.fee_head.index', compact('fee_heads'));
    }
    public function create()
    {
        return view('admin.fee_head.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:fee_heads,name',
        ]);
        $fee_head = new FeeHead();
        $fee_head->name = $request->name;
        $fee_head->save();
        return redirect()->route('fee-head.index')->with('success', 'Fee Head created successfully.');
    }

    public function edit($id)
    {
        $fee_head = FeeHead::findOrFail($id);
        return view('admin.fee_head.edit', compact('fee_head'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_heads,id',
            'name' => 'required|string|unique:fee_heads,name,' . $request->id,
        ]);

        $fee_head = FeeHead::findOrFail($request->id);
        $fee_head->name = $request->name;
        $fee_head->save();

        return redirect()->route('fee-head.index')->with('success', 'Fee Head updated successfully.');
    }

    public function destroy($id)
    {
        $fee_head = FeeHead::findOrFail($id);
        $fee_head->delete();
        return redirect()->route('fee-head.index')->with('success', 'Fee Head deleted successfully.');
    }
}
