<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        request()->validate(Product::$rules);

        if (!empty($input['file'])) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/products'), $imageName);
            $input['file'] = '/assets/products/' . $imageName;
            $input['file_dir'] = '-';
        }

        if (!empty($input['file2'])) {
            $imageName = time() . '2.' . $request->file2->extension();
            $request->file2->move(public_path('assets/products'), $imageName);
            $input['file2'] = '/assets/products/' . $imageName;
        }

        if (!empty($input['file3'])) {
            $imageName = time() . '3.' . $request->file3->extension();
            $request->file3->move(public_path('assets/products'), $imageName);
            $input['file3'] = '/assets/products/' . $imageName;
        }

        $product = Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();

        if (!empty($input['file'])) {
            request()->validate(Product::$rules);
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/products'), $imageName);
            $input['file'] = '/assets/products/' . $imageName;
            $input['file_dir'] = '-';
        }

        if (!empty($input['file2'])) {
            $imageName = time() . '2.' . $request->file2->extension();
            $request->file2->move(public_path('assets/products'), $imageName);
            $input['file2'] = '/assets/products/' . $imageName;
        }

        if (!empty($input['file3'])) {
            $imageName = time() . '3.' . $request->file3->extension();
            $request->file3->move(public_path('assets/products'), $imageName);
            $input['file3'] = '/assets/products/' . $imageName;
        }

        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
