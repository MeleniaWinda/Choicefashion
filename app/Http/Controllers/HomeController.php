<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $sortedResults = [];

    public function index()
    {
        // $categories = Category::all();
        $products = Product::all();

        $data = $this->generateProducts();
        $results = $data['results'];
        $sortedResults = $data['sortedResults'];

        return view('home.index', compact('products', 'results', 'sortedResults'));
    }

    public function detail($id)
    {
        $product = Product::find($id);

        return view('home.detail', compact('product'));
    }

    public function chose(Request $request)
    {
        $sortedResults = [];

        if ($request->method() == "POST") {
            $input = $request->all();
            $total = count($input['answer']);

            $data = $this->generateProducts();
            $this->sortedResults = $data['sortedResults'];
            $sortedResults = $data['sortedResults'];

            $sortedResults = $this->counting($sortedResults, $input, $total);

            // $sortedResults = array_values($sortedResults);

            // if (!empty($sortedResults[0])) {
            //     return redirect()->route('home.detail', ['id' => $sortedResults[0]['id'], 'result' => true])
            //         ->with('chose', true);
            // }

            // new
            usort($sortedResults, function($first, $second){
                return $first['count'] < $second['count'];
            });
            $sortedResults = array_slice($sortedResults, 0 , 4);
        }
        $categories = Category::all();

        return view('home.chose', compact('categories', 'sortedResults'));
    }

    private function counting($sortedResults, $input, $total)
    {
        foreach ($sortedResults as $k => $s) {
            foreach ($s['categories'] as $kk => $ss) {
                if ($ss['id'] == $input['answer'][$kk]) {
                    $sortedResults[$k]['count'] += 1;
                }
            }

            // if ($sortedResults[$k]['count'] != $total) {
            //     unset($sortedResults[$k]);
            // }
        }

        // if (count($sortedResults) < 1) {
        //     $sortedResults = $this->sortedResults;
        //     return $this->counting($sortedResults, $input, ($total - 1));
        // }

        return $sortedResults;
    }
}
