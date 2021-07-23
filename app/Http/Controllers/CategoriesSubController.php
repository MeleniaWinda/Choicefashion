<?php

namespace App\Http\Controllers;

use App\Models\CategoriesSub;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoriesSubController
 * @package App\Http\Controllers
 */
class CategoriesSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesSubs = CategoriesSub::orderBy('category_id', 'asc')->paginate(10);

        return view('categories-sub.index', compact('categoriesSubs'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriesSubs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesSub = new CategoriesSub();
        $categories = Category::pluck('name', 'id')->all();

        return view('categories-sub.create', compact('categoriesSub', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required|unique:categories_subs,name',
            'quality' => 'required',
        ]);

        $categoriesSub = CategoriesSub::create($request->all());

        return redirect()->route('categories-subs.index')
            ->with('success', 'CategoriesSub created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriesSub = CategoriesSub::find($id);

        return view('categories-sub.show', compact('categoriesSub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriesSub = CategoriesSub::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('categories-sub.edit', compact('categoriesSub', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriesSub $categoriesSub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesSub $categoriesSub)
    {
        request()->validate(CategoriesSub::$rules);

        $categoriesSub->update($request->all());

        return redirect()->route('categories-subs.index')
            ->with('success', 'CategoriesSub updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriesSub = CategoriesSub::find($id)->delete();

        return redirect()->route('categories-subs.index')
            ->with('success', 'CategoriesSub deleted successfully');
    }
}
