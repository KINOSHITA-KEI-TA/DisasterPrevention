<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
    public function index()
    {
        $data = Category::select('categories.*')
        ->leftJoin('topics', 'topics.category_id', '=', 'categories.id')
        ->leftJoin('topic_messages', 'topic_messages.topic_id', '=', 'topics.id')
        ->orderByRaw('MAX(topic_messages.created_at) DESC')
        ->groupBy('categories.id')
        ->get();

        // $data = Category::with(['category_tags'])->get();
        // dd($data);
        return view('main', compact('data'));
    }
}
