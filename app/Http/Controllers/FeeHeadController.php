<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    public function index()
    {
        $feeHeads = FeeHead::all();
        return view('admin.fee_head.index', compact('feeHeads'));
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
        $feeHead = new FeeHead();
        $feeHead->name = $request->name;
        $feeHead->save();
        return redirect()->route('fee-head.index')->with('success', 'Fee Head created successfully.');
    }

    public function edit($id)
    {
        $feeHead = FeeHead::findOrFail($id);
        return view('admin.fee_head.edit', compact('feeHead'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fee_heads,id',
            'name' => 'required|string|unique:fee_heads,name,' . $request->id,
        ]);

        $feeHead = FeeHead::findOrFail($request->id);
        $feeHead->name = $request->name;
        $feeHead->save();

        return redirect()->route('fee-head.index')->with('success', 'Fee Head updated successfully.');
    }

    public function destroy($id)
    {
        $feeHead = FeeHead::findOrFail($id);
        $feeHead->delete();
        return redirect()->route('fee-head.index')->with('success', 'Fee Head deleted successfully.');
    }
}
