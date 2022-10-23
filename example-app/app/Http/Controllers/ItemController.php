<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $positions = Position::orderBy('id', 'desc')->paginate(5);
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_1' => 'required',
            'position_2' => 'required',
            'description' => 'required',
        ]);
        position::create($request->post());


        return redirect()->route('positions.index')->with('success', 'Position has been created successfully.');
    }

    public function show(position $position)  {
        return view('positions.index',compact('position'));
    }
    public function edit(position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, position $position)
    {
        $request->validate([
            'position_1' => 'required',
            'position_2' => 'required',
            'description' => 'required',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'position Has Been updated successfully');
    }

    public function destroy(position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'position has been deleted successfully');

    }
}
