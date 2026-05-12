<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $womenJourneys = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'womens-journey');
            })
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $skillTrainings = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'skill-training');
            })
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $dormitories = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'dormitory');
            })
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $souvenirs = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'souvenirs');
            })
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        return view('frontend.pages.home', compact(
            'womenJourneys',
            'skillTrainings',
            'dormitories',
            'souvenirs'
        ));
    }
}
