<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(int $id)
    {
        $product = Product::with('category')
            ->where('status', 'active')
            ->findOrFail($id);

        return view('frontend.pages.product.checkout', compact('product'));
    }
}
