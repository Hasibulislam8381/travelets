<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function details()
    {
        return view('frontend.pages.tour-details');
    }
}
