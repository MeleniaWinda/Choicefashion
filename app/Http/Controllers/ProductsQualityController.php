<?php

namespace App\Http\Controllers;

use App\Models\ProductsQuality;
use App\Models\Product;
use App\Models\CategoriesSub;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class ProductsQualityController
 * @package App\Http\Controllers
 */
class ProductsQualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsQualities = ProductsQuality::orderBy('categories_sub_id', 'asc')->paginate(10);

        return view('products-quality.index', compact('productsQualities'))
            ->with('i', (request()->input('page', 1) - 1) * $productsQualities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productsQuality = new ProductsQuality();
        $products = Product::pluck('name', 'id')->all();
        // $categoriesSubs = categoriesSub::pluck('name', 'id')->all();
        $categories = Category::all();
        $categoriesSubs = [];
        foreach ($categories as $key => $value) {
            $categoriesSubs[$value->name] = $value->categoriesSubs->pluck('name', 'id');
        }

        return view('products-quality.create', compact('productsQuality', 'products', 'categoriesSubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductsQuality::$rules);

        $productsQuality = ProductsQuality::create($request->all());

        return redirect()->route('products-qualities.index')
            ->with('success', 'ProductsQuality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productsQuality = ProductsQuality::find($id);

        return view('products-quality.show', compact('productsQuality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productsQuality = ProductsQuality::find($id);
        $products = Product::pluck('name', 'id')->all();
        // $categoriesSubs = categoriesSub::pluck('name', 'id')->all();
        $categories = Category::all();
        $categoriesSubs = [];
        foreach ($categories as $key => $value) {
            $categoriesSubs[$value->name] = $value->categoriesSubs->pluck('name', 'id');
        }

        return view('products-quality.edit', compact('productsQuality', 'products', 'categoriesSubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductsQuality $productsQuality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsQuality $productsQuality)
    {
        request()->validate(ProductsQuality::$rules);

        $productsQuality->update($request->all());

        return redirect()->route('products-qualities.index')
            ->with('success', 'ProductsQuality updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productsQuality = ProductsQuality::find($id)->delete();

        return redirect()->route('products-qualities.index')
            ->with('success', 'ProductsQuality deleted successfully');
    }
}
