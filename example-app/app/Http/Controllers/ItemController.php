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


        if (Auth::user()->role) {
            if ($request->has('category')) {
                $positions = Position::where('category_id', '=', $request->query('category'))->get();
            } else {
                $positions = Position::all();
            }
            $categories = Category::all();

            return view('positions.index', compact('positions', 'categories'));

        }

        if (Auth::user()) {
            if ($request->has('category')) {
                $user_id = app('request')->user()->id;
                $positions = Position::where('category_id', '=', $request->query('category'))->where('user_id', $user_id)->get();
            } else {
                $user_id = app('request')->user()->id;

                $positions = Position::where('user_id', $user_id)->get();
            }
            $categories = Category::all();

            return view('positions.index', compact('positions', 'categories'));
        }


    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $positions = Position::where('position', 'like', '%' . $request->search . '%')
            ->orWhere('move_1', 'like', '%' . $request->search . '%')
            ->orWhere('description_1', 'like', '%' . $request->search . '%')
            ->orWhere('move_2', 'like', '%' . $request->search . '%')
            ->orWhere('description_2', 'like', '%' . $request->search . '%')
            ->get();
        return view('positions.index', compact('positions','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('positions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'move_1' => 'required',
            'description_1' => 'required',
            'move_2' => 'required',
            'description_2' => 'required',
            'visibility' => 'required',
        ]);
        position::create($request->post());


        return redirect()->route('positions.index')->with('success', 'Position has been created successfully.');
    }

    public function show(position $position)  {
        return view('positions.index',compact('position'));
    }
    public function edit($id)
    {
        $position = Position::find($id);
        if (!auth()->user()->role == 1 && auth()->user()->id != $position->user_id) {

            abort(403);

        } else
            $categories = Category::all();

        return view('positions.edit', compact('position', 'categories'));
    }

    public function update(Request $request, position $position )
    {
        $request->validate([
            'position' => 'required',
            'move_1' => 'required',
            'description_1' => 'required',
            'move_2' => 'required',
            'description_2' => 'required',
            'visibility' => 'required',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'position Has Been updated successfully');
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        if (!auth()->user()->role == 1 && auth()->user()->id != $position->user_id) {

            abort(403);

        } else
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'position has been deleted successfully');

    }
    public function updateVisibility(Request $request)
    {
        $position = Position::find($request->position_id);
        $position->visibility = $request->visibility;
        $position->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
