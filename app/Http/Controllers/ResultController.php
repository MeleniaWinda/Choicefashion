<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ResultController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $data = $this->generateProducts();
        $results = $data['results'];
        $sortedResults = $data['sortedResults'];

        $print = request()->get('print');

        return view('result.index', compact('categories', 'results', 'sortedResults', 'print'));
    }
}
