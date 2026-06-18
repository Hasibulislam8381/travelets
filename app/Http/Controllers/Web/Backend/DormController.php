<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    public function edit()
    {
        $dorm = Dorm::first() ?? new Dorm();

        return view('backend.layouts.dorm.edit', compact('dorm'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'features'        => 'array',
            'features.*.title'       => 'required|string|max:255',
            'features.*.description' => 'required|string|max:255',
            'features.*.icon'        => 'required|string',
            'pricing'         => 'array',
            'pricing.*.amount' => 'required|string|max:100',
            'pricing.*.label'  => 'required|string|max:255',
            'room_types'      => 'array',
            'room_types.*'    => 'required|string|max:100',
        ]);

        $meta = [

            'features'      => $request->features ?? [],
            'pricing'       => $request->pricing ?? [],
            'room_types'    => $request->room_types ?? [],
        ];

        $dorm = Dorm::first();

        if ($dorm) {
            $dorm->update(['meta' => $meta]);
        } else {
            Dorm::create(['meta' => $meta]);
        }

        return back()->with('success', 'Dorm content updated successfully.');
    }
}
