<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\CmsContent;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CmsController extends Controller
{
    /**
     * Display CMS list
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {

            $data = CmsContent::orderBy('id', 'desc');

            if (!empty($request->input('search.value'))) {
                $search = $request->input('search.value');

                $data->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%$search%")
                        ->orWhere('page', 'LIKE', "%$search%")
                        ->orWhere('section', 'LIKE', "%$search%");
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function ($data) {
                    $src = $data->image
                        ? Storage::url($data->image)
                        : asset('backend/images/default.png');

                    return '<img src="' . $src . '" height="45" style="border-radius:6px;width:70px;object-fit:cover;">';
                })

                ->addColumn('page', function ($data) {
                    return '<span class="badge bg-primary">' . ucfirst($data->page) . '</span>';
                })

                ->addColumn('section', function ($data) {
                    return '<span class="badge bg-success">' . ucfirst($data->section) . '</span>';
                })

                ->addColumn('status', function ($data) {
                    $checked = $data->status == 'active' ? 'checked' : '';

                    return '
                    <div class="form-check form-switch">
                        <input onclick="showStatusChangeAlert(' . $data->id . ')"
                               type="checkbox"
                               class="form-check-input"
                               ' . $checked . '>
                    </div>
                ';
                })

                ->addColumn('action', function ($data) {
                    return '
                    <div class="btn-group btn-group-sm">
                        <a href="' . route('admin.cms.edit', $data->id) . '" class="btn btn-primary">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                ';
                })

                ->rawColumns(['image', 'page', 'section', 'status', 'action'])
                ->make();
        }

        return view('backend.layouts.cms.index');
    }

    /**
     * Create page
     */
    public function create(): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            return view('backend.layouts.cms.create');
        }
        return redirect()->route('admin.cms.index');
    }

    /**
     * Store CMS
     */
    public function store(Request $request): RedirectResponse
    {
        try {

            if (User::find(auth()->user()->id)) {

                $validator = Validator::make($request->all(), [
                    'page'        => 'required|string|max:255',
                    'section'     => 'required|string|max:255',
                    'title'       => 'nullable|string|max:255',
                    'subtitle'    => 'nullable|string|max:255',
                    'description' => 'nullable|string',
                    'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $cms = new CmsContent();

                $cms->page        = $request->page;
                $cms->section     = $request->section;
                $cms->title       = $request->title;
                $cms->subtitle    = $request->subtitle;
                $cms->description = $request->description;
                $cms->status      = 1;

                if ($request->hasFile('image')) {
                    $cms->image = $request->file('image')->store('cms', 'public');
                }

                $cms->save();
            }

            return redirect()->route('admin.cms.index')
                ->with('t-success', 'CMS created successfully.');
        } catch (Exception) {
            return redirect()->route('admin.cms.index')
                ->with('t-error', 'CMS failed to create.');
        }
    }

    /**
     * Edit
     */
    public function edit(int $id): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            $data = CmsContent::findOrFail($id);
            return view('backend.layouts.cms.edit', compact('data'));
        }

        return redirect()->route('admin.cms.index');
    }

    /**
     * Update
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            if (User::find(auth()->user()->id)) {

                $validator = Validator::make($request->all(), [
                    'page'        => 'required|string|max:255',
                    'section'     => 'required|string|max:255',
                    'title'       => 'nullable|string|max:255',
                    'subtitle'    => 'nullable|string|max:255',
                    'description' => 'nullable|string',
                    'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $cms = CmsContent::findOrFail($id);

                $cms->page        = $request->page;
                $cms->section     = $request->section;
                $cms->title       = $request->title;
                $cms->subtitle    = $request->subtitle;
                $cms->description = $request->description;

                if ($request->hasFile('image')) {
                    if ($cms->image && Storage::disk('public')->exists($cms->image)) {
                        Storage::disk('public')->delete($cms->image);
                    }

                    $cms->image = $request->file('image')->store('cms', 'public');
                }

                $cms->save();
            }

            return redirect()->route('admin.cms.index')
                ->with('t-success', 'CMS updated successfully.');
        } catch (Exception) {
            return redirect()->route('admin.cms.index')
                ->with('t-error', 'CMS failed to update.');
        }
    }

    /**
     * Status toggle
     */
    public function status(int $id): JsonResponse
    {
        $data = CmsContent::findOrFail($id);

        $data->status = !$data->status;
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
            'data'    => $data,
        ]);
    }

    /**
     * Delete
     */
    public function destroy(int $id): JsonResponse
    {
        $cms = CmsContent::findOrFail($id);

        if ($cms->image && Storage::disk('public')->exists($cms->image)) {
            Storage::disk('public')->delete($cms->image);
        }

        $cms->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
