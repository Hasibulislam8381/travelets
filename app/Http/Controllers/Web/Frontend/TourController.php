<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class TourController extends Controller
{
    public function details(string $slug): View
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return match($product->category->type) {
            'womens_journey' => view('frontend.pages.product.tour-show', compact('product')),
            'skill_training' => view('frontend.pages.product.training-show', compact('product')),
            'souvenirs'      => view('frontend.pages.product.souvenir-show', compact('product')),
            default          => abort(404),
        };
    }
}
