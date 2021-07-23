<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateProducts()
    {
        $products = Product::all();
        $categories = Category::all();
        $results = [];

        // Pengumpulan data & kriteria
        foreach ($products as $p) {
            $results[$p->id]['id'] = $p->id;
            $results[$p->id]['name'] = $p->name;
            $results[$p->id]['file'] = $p->file;
            $results[$p->id]['count'] = 0;
            $results[$p->id]['value'] = 0;
            foreach ($categories as $c) {
                foreach ($p->productsQualities as $pp) {
                    if ($c->id == $pp->categoriesSubs->category_id) {
                        $results[$p->id]['categories'][$c->id]['id'] = $pp->categoriesSubs->id;
                        $results[$p->id]['categories'][$c->id]['name'] = $pp->categoriesSubs->name;
                        $results[$p->id]['categories'][$c->id]['quality'] = $pp->categoriesSubs->quality;
                        $results[$p->id]['categories'][$c->id]['normaled_quality'] = 0;
                    }
                }
            }
        }

        // Normalisasi
        foreach ($categories as $c) {
            $pembagi = 0;
            foreach ($results as $r) {
                $pembagi += pow($r['categories'][$c->id]['quality'], 2);
            }
            foreach ($results as $pid => $r) {
                $results[$pid]['categories'][$c->id]['normaled_quality'] = round($r['categories'][$c->id]['quality'] / round(sqrt($pembagi), 3), 5);
            }
        }

        // Menghitung nilai optimasi
        foreach ($results as $pid => $r) {
            foreach ($categories as $c) {
                $results[$pid]['value'] += round($results[$pid]['categories'][$c->id]['normaled_quality'] * ($c->_type == "benefit" ? 1 : -1) * $c->quality, 5);
            }
        }

        // Mengurutkan raking dari nilai yang terbesar
        $sortedResults = $results;
        usort($sortedResults, function ($a, $b) {
            return $a['value'] < $b['value'];
        });

        return compact('results', 'sortedResults');
    }
}
