<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $positions = Position::where('category_id', '=', $request->query('category'))->where('visibility', '=', '1')->paginate(5);
        } else {
            $positions = Position::where('visibility', '=', '1')->paginate(5);
        }
        $categories = Category::all();
        return view('home', compact('positions', 'categories'));
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $positions = Position::where('move_1', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->orWhere('position', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->orWhere('move_2', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->orWhere('category_id', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->orWhere('description_1', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->orWhere('description_2', 'like', '%' . $request->search . '%')
            ->where('visibility', '=', '1')
            ->paginate(5);
        return view('home', compact('positions', 'categories'));
    }
}
