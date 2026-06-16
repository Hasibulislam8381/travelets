<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the team members.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $data = TeamMember::latest();

            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('role', 'LIKE', "%$searchTerm%")
                    ->orWhere('department', 'LIKE', "%$searchTerm%");
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    $src = $data->image
                        ? Storage::url($data->image)
                        : asset('backend/images/default.png');
                    return '<img src="' . $src . '" height="45" style="border-radius:50%;object-fit:cover;width:45px;">';
                })
                ->addColumn('department', function ($data) {
                    return $data->department
                        ? '<span class="badge bg-info text-dark">' . $data->department . '</span>'
                        : '-';
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
                            <a href="' . route('admin.team_member.edit', $data->id) . '"
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
                ->rawColumns(['image', 'department', 'status', 'action'])
                ->make();
        }

        return view('backend.layouts.team_member.index');
    }

    /**
     * Show the form for creating a new team member.
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            return view('backend.layouts.team_member.create');
        }
        return redirect()->route('admin.team_member.index');
    }

    /**
     * Store a newly created team member in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            if (User::find(auth()->user()->id)) {
                $validator = Validator::make($request->all(), [
                    'name'       => 'required|string|max:255',
                    'role'       => 'required|string|max:255',
                    'department' => 'nullable|string|max:100',
                    'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'order'      => 'nullable|integer|min:0',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $member             = new TeamMember();
                $member->name       = $request->name;
                $member->role       = $request->role;
                $member->department = $request->department;
                $member->order      = $request->order ?? 0;

                if ($request->hasFile('image')) {
                    $member->image = $request->file('image')->store('team', 'public');
                }

                $member->save();
            }

            return redirect()->route('admin.team_member.index')
                ->with('t-success', 'Team member created successfully.');
        } catch (Exception) {
            return redirect()->route('admin.team_member.index')
                ->with('t-error', 'Team member failed to create.');
        }
    }

    /**
     * Show the form for editing the specified team member.
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        if (User::find(auth()->user()->id)) {
            $data = TeamMember::findOrFail($id);
            return view('backend.layouts.team_member.edit', compact('data'));
        }
        return redirect()->route('admin.team_member.index');
    }

    /**
     * Update the specified team member in the database.
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
                    'name'       => 'required|string|max:255',
                    'role'       => 'required|string|max:255',
                    'department' => 'nullable|string|max:100',
                    'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'order'      => 'nullable|integer|min:0',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $member             = TeamMember::findOrFail($id);
                $member->name       = $request->name;
                $member->role       = $request->role;
                $member->department = $request->department;
                $member->order      = $request->order ?? 0;

                if ($request->hasFile('image')) {
                    if ($member->image && Storage::disk('public')->exists($member->image)) {
                        Storage::disk('public')->delete($member->image);
                    }
                    $member->image = $request->file('image')->store('team', 'public');
                }

                $member->save();
            }

            return redirect()->route('admin.team_member.index')
                ->with('t-success', 'Team member updated successfully.');
        } catch (Exception) {
            return redirect()->route('admin.team_member.index')
                ->with('t-error', 'Team member failed to update.');
        }
    }

    /**
     * Change the status of the specified team member.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse
    {
        $data = TeamMember::findOrFail($id);

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
     * Remove the specified team member from the database.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $member = TeamMember::findOrFail($id);

        if ($member->image && Storage::disk('public')->exists($member->image)) {
            Storage::disk('public')->delete($member->image);
        }

        $member->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
