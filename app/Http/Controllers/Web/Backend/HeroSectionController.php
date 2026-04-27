<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HeroSectionController extends Controller
{
    /**
     * Display the hero section settings page.
     *
     * @return View
     */
    public function index(): View
    {
        $data = HeroSection::latest()->first();
        return view('backend.layouts.hero_section.index', compact('data'));
    }

    /**
     * Store or update the hero section in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'badge_text'         => 'nullable|string|max:255',
                'title'              => 'required|string|max:255',
                'subtitle'           => 'required|string|max:255',
                'description'        => 'nullable|string',
                'primary_btn_text'   => 'nullable|string|max:100',
                'primary_btn_url'    => 'nullable|string|max:255',
                'secondary_btn_text' => 'nullable|string|max:100',
                'secondary_btn_url'  => 'nullable|string|max:255',
                'banner_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'stat_1_value'       => 'nullable|string|max:50',
                'stat_1_label'       => 'nullable|string|max:100',
                'stat_2_value'       => 'nullable|string|max:50',
                'stat_2_label'       => 'nullable|string|max:100',
                'stat_3_value'       => 'nullable|string|max:50',
                'stat_3_label'       => 'nullable|string|max:100',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $hero = HeroSection::latest()->first() ?? new HeroSection();

            $hero->badge_text         = $request->badge_text;
            $hero->title              = $request->title;
            $hero->subtitle           = $request->subtitle;
            $hero->description        = $request->description;
            $hero->primary_btn_text   = $request->primary_btn_text;
            $hero->primary_btn_url    = $request->primary_btn_url;
            $hero->secondary_btn_text = $request->secondary_btn_text;
            $hero->secondary_btn_url  = $request->secondary_btn_url;
            $hero->stat_1_value = $request->stat_1_value;
            $hero->stat_1_label = $request->stat_1_label;
            $hero->stat_2_value = $request->stat_2_value;
            $hero->stat_2_label = $request->stat_2_label;
            $hero->stat_3_value = $request->stat_3_value;
            $hero->stat_3_label = $request->stat_3_label;

            if ($request->hasFile('banner_image')) {
                if ($hero->banner_image && Storage::disk('public')->exists($hero->banner_image)) {
                    Storage::disk('public')->delete($hero->banner_image);
                }
                $hero->banner_image = $request->file('banner_image')->store('hero', 'public');
            }

            $hero->save();

            return redirect()->route('admin.hero_section.index')->with('t-success', 'Hero Section updated successfully.');
        } catch (Exception) {
            return redirect()->route('admin.hero_section.index')->with('t-error', 'Hero Section failed to update.');
        }
    }

    /**
     * Change the status of the hero section.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = HeroSection::findOrFail($id);

        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Hero Section unpublished successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Hero Section published successfully.',
                'data'    => $data,
            ]);
        }
    }
}
