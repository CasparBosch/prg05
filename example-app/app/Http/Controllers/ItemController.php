<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $user_id=app('request')->user()->id;
            $positions = Position::where('category_id', '=', $request->query('category'))->where('user_id',$user_id)->get();
        } elseif(Auth::user()->role){
            $positions = Position::all();
        } else {
            $user_id=app('request')->user()->id;

            $positions = Position::where('user_id',$user_id )->get();
        }

        $categories = Category::all();

        return view('positions.index', compact('positions', 'categories'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('positions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_1' => 'required',
            'position_2' => 'required',
            'description' => 'required',
            'visibility' => 'required',
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
            'visibility' => 'required',
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
