<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $data = Category::latest();

            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('name', 'LIKE', "%$searchTerm%")
                     ->orWhere('type', 'LIKE', "%$searchTerm%");
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    $src = $data->image
                        ? Storage::url($data->image)
                        : asset('backend/images/default.png');
                    return '<img src="' . $src . '" height="45" style="border-radius:6px;object-fit:cover;width:70px;">';
                })
                ->addColumn('type', function ($data) {
                    $colors = [
                        'tour'     => 'primary',
                        'training' => 'success',
                        'souvenir' => 'warning',
                    ];
                    $color = $colors[$data->type] ?? 'secondary';
                    return '<span class="badge bg-' . $color . '">' . ucfirst($data->type) . '</span>';
                })
                ->addColumn('status', function ($data) {
                    $checked = $data->status == 'active' ? 'checked' : '';
                    return '
                        <div class="form-check form-switch d-flex">
                            <input onclick="showStatusChangeAlert(' . $data->id . ')"
                                   type="checkbox"
                                   class="form-check-input status-toggle"
                                   id="switch' . $data->id . '"
                                   data-id="' . $data->id . '"
                                   name="status" ' . $checked . '>
                            <label class="form-check-label ms-2" for="switch' . $data->id . '"></label>
                        </div>
                    ';
                })
                ->addColumn('action', function ($data) {
                    return '
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="' . route('admin.category.edit', $data->id) . '"
                               class="text-white btn btn-primary" title="Edit">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="#" onclick="showDeleteConfirm(' . $data->id . ')"
                               class="text-white btn btn-danger" title="Delete">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    ';
                })
                ->rawColumns(['image', 'type', 'status', 'action'])
                ->make();
        }

        return view('backend.layouts.category.index');
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            return view('backend.layouts.category.create');
        }
        return redirect()->route('admin.category.index');
    }

    /**
     * Store a newly created category in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            if (User::find(auth()->user()->id)) {
                $validator = Validator::make($request->all(), [
                    'name'        => 'required|string|max:255',
                    'type'        => 'required|in:tour,training,souvenir',
                    'icon'        => 'nullable|string|max:100',
                    'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'description' => 'nullable|string',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $category              = new Category();
                $category->name        = $request->name;
                $category->slug        = Str::slug($request->name);
                $category->type        = $request->type;
                $category->icon        = $request->icon;
                $category->description = $request->description;

                if ($request->hasFile('image')) {
                    $category->image = $request->file('image')->store('categories', 'public');
                }

                $category->save();
            }

            return redirect()->route('admin.category.index')
                ->with('t-success', 'Category created successfully.');
        } catch (Exception) {
            return redirect()->route('admin.category.index')
                ->with('t-error', 'Category failed to create.');
        }
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            $data = Category::findOrFail($id);
            return view('backend.layouts.category.edit', compact('data'));
        }
        return redirect()->route('admin.category.index');
    }

    /**
     * Update the specified category in the database.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            if (User::find(auth()->user()->id)) {
                $validator = Validator::make($request->all(), [
                    'name'        => 'required|string|max:255',
                    'type'        => 'required|in:tour,training,souvenir',
                    'icon'        => 'nullable|string|max:100',
                    'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'description' => 'nullable|string',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $category              = Category::findOrFail($id);
                $category->name        = $request->name;
                $category->slug        = Str::slug($request->name);
                $category->type        = $request->type;
                $category->icon        = $request->icon;
                $category->description = $request->description;

                if ($request->hasFile('image')) {
                    if ($category->image && Storage::disk('public')->exists($category->image)) {
                        Storage::disk('public')->delete($category->image);
                    }
                    $category->image = $request->file('image')->store('categories', 'public');
                }

                $category->save();
            }

            return redirect()->route('admin.category.index')
                ->with('t-success', 'Category updated successfully.');
        } catch (Exception) {
            return redirect()->route('admin.category.index')
                ->with('t-error', 'Category failed to update.');
        }
    }

    /**
     * Change the status of the specified category.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = Category::findOrFail($id);

        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }

    /**
     * Remove the specified category from the database.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $category = Category::findOrFail($id);

        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
