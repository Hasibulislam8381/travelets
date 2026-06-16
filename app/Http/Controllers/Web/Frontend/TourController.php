<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function details(string $slug): View
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return match ($product->category->type) {
            'womens_journey' => view('frontend.pages.product.tour-show', compact('product')),
            'skill_training' => view('frontend.pages.product.training-show', compact('product')),
            'souvenirs'      => view('frontend.pages.product.souvenir-show', compact('product')),
            default          => abort(404),
        };
    }
    public function travels(Request $request): View
    {
        $currentType = $request->get('type', 'all');

        $products = Product::with('category')
            ->whereHas('category', fn($q) => $q->where('type', 'womens_journey'))
            ->where('status', 'active')
            ->when($currentType !== 'all', fn($q) => $q->where('tour_type', $currentType))
            ->latest()
            ->paginate(12);

        return view('frontend.pages.womans_travel.index', compact('products', 'currentType'));
    }

    public function training(): View
    {
        $products = Product::with('category')
            ->whereHas('category', fn($q) => $q->where('type', 'skill_training'))
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('frontend.pages.training.index', compact('products'));
    }

    public function souvenirs(): View
    {
        $products = Product::with('category')
            ->whereHas('category', fn($q) => $q->where('type', 'souvenirs'))
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('frontend.pages.souvenirs.index ', compact('products'));
    }
    public function dormatory(): View
    {
        return view('frontend.pages.dormatory.index');
    }
}
