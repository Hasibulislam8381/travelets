<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $data = Product::with('category')->latest();

            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('title', 'LIKE', "%$searchTerm%")
                    ->orWhere('type', 'LIKE', "%$searchTerm%");
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('thumbnail', function ($data) {
                    $src = $data->thumbnail
                        ? Storage::url($data->thumbnail)
                        : asset('backend/images/default.png');
                    return '<img src="' . $src . '" height="45" style="border-radius:6px;object-fit:cover;width:70px;">';
                })
                ->addColumn('category', function ($data) {
                    return $data->category->name ?? '-';
                })
                ->addColumn('price', function ($data) {
                    return '৳' . number_format($data->price, 2);
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
                            <a href="' . route('admin.product.edit', $data->id) . '"
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
                ->rawColumns(['thumbnail', 'category', 'price', 'status', 'action'])
                ->make();
        }

        return view('backend.layouts.product.index');
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            $categories = Category::where('status', 'active')->get();
            return view('backend.layouts.product.create', compact('categories'));
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Store a newly created product in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            if (User::find(auth()->user()->id)) {
                $validator = Validator::make($request->all(), [
                    'category_id'       => 'required|exists:categories,id',
                    'title'             => 'required|string|max:255',
                    'badge'             => 'nullable|string|max:50',
                    'location'          => 'nullable|string|max:255',
                    'short_description' => 'nullable|string',
                    'description'       => 'nullable|string',
                    'price'             => 'required|numeric|min:0',
                    'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'gallery.*'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $product                    = new Product();
                $product->category_id       = $request->category_id;
                $product->title             = $request->title;
                $product->slug              = Str::slug($request->title);
                $product->type              = $request->type;
                $product->tour_type         = $request->tour_type;

                $product->badge             = $request->badge;
                $product->location          = $request->location;
                $product->short_description = $request->short_description;
                $product->description       = $request->description;
                $product->price             = $request->price;
                $category        = Category::findOrFail($request->category_id);
                $product->meta   = $this->buildMeta($request, $category->type);

                if ($request->hasFile('thumbnail')) {
                    $product->thumbnail = $request->file('thumbnail')->store('products/thumbnails', 'public');
                }

                if ($request->hasFile('gallery')) {
                    $galleryPaths = [];
                    foreach ($request->file('gallery') as $file) {
                        $galleryPaths[] = $file->store('products/gallery', 'public');
                    }
                    $product->gallery = $galleryPaths;
                }

                $product->save();
            }

            return redirect()->route('admin.product.index')
                ->with('t-success', 'Product created successfully.');
        } catch (Exception) {
            return redirect()->route('admin.product.index')
                ->with('t-error', 'Product failed to create.');
        }
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            $data       = Product::findOrFail($id);
            $categories = Category::where('status', 'active')->get();
            return view('backend.layouts.product.edit', compact('data', 'categories'));
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Update the specified product in the database.
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
                    'category_id'       => 'required|exists:categories,id',
                    'title'             => 'required|string|max:255',
                    'badge'             => 'nullable|string|max:50',
                    'location'          => 'nullable|string|max:255',
                    'short_description' => 'nullable|string',
                    'description'       => 'nullable|string',
                    'price'             => 'required|numeric|min:0',
                    'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'gallery.*'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $product                    = Product::findOrFail($id);
                $product->category_id       = $request->category_id;
                $product->title             = $request->title;
                $product->slug              = Str::slug($request->title);
                $product->type              = $request->type;
                $product->tour_type         = $request->tour_type;
                $product->badge             = $request->badge;
                $product->location          = $request->location;
                $product->short_description = $request->short_description;
                $product->description       = $request->description;
                $product->price             = $request->price;
                $category        = Category::findOrFail($request->category_id);
                $product->meta   = $this->buildMeta($request, $category->type);

                if ($request->hasFile('thumbnail')) {
                    if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
                        Storage::disk('public')->delete($product->thumbnail);
                    }
                    $product->thumbnail = $request->file('thumbnail')->store('products/thumbnails', 'public');
                }

                if ($request->hasFile('gallery')) {
                    if ($product->gallery) {
                        foreach ($product->gallery as $old) {
                            if (Storage::disk('public')->exists($old)) {
                                Storage::disk('public')->delete($old);
                            }
                        }
                    }
                    $galleryPaths = [];
                    foreach ($request->file('gallery') as $file) {
                        $galleryPaths[] = $file->store('products/gallery', 'public');
                    }
                    $product->gallery = $galleryPaths;
                }

                $product->save();
            }

            return redirect()->route('admin.product.index')
                ->with('t-success', 'Product updated successfully.');
        } catch (Exception) {
            return redirect()->route('admin.product.index')
                ->with('t-error', 'Product failed to update.');
        }
    }

    /**
     * Change the status of the specified product.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = Product::findOrFail($id);

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
     * Remove the specified product from the database.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        if ($product->gallery) {
            foreach ($product->gallery as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $product->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }

    /**
     * Build meta array based on product type.
     *
     * @param Request $request
     * @return array
     */
    private function buildMeta(Request $request, string $categoryType): array
    {
        return match ($categoryType) {
            'womens_journey' => [
                'duration'   => $request->duration,
                'group_size' => $request->group_size,
                'includes'   => array_filter($request->includes ?? []),
                'excludes'   => array_filter($request->excludes ?? []),
                'itinerary'  => array_filter($request->itinerary ?? []),
            ],
            'skill_training' => [
                'sessions'        => array_filter($request->sessions ?? []),
                'levels'          => array_filter($request->levels ?? []),
                'satisfied_count' => $request->satisfied_count,
            ],
            'dormitory' => [
                'features'    => array_filter($request->features ?? []),
                'price_plans' => array_filter($request->price_plans ?? []),
                'room_types'  => array_filter($request->room_types ?? []),
            ],
            'souvenirs' => [
                'material' => $request->material,
                'origin'   => $request->origin,
            ],
            default => [],
        };
    }
}
