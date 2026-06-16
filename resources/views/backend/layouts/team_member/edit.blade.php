@extends('backend.app')
@section('title', 'Edit Team Member')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="p-5 card">
                        <form action="{{ route('admin.team_member.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $data->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                                    <input type="text" name="role"
                                        class="form-control @error('role') is-invalid @enderror"
                                        value="{{ old('role', $data->role) }}">
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Department</label>
                                    <input type="text" name="department"
                                        class="form-control @error('department') is-invalid @enderror"
                                        value="{{ old('department', $data->department) }}">
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Display Order</label>
                                    <input type="number" name="order"
                                        class="form-control @error('order') is-invalid @enderror"
                                        value="{{ old('order', $data->order) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Photo</label>
                                    <input type="file" name="image" id="memberImage"
                                        class="form-control @error('image') is-invalid @enderror"
                                        data-default-file="{{ $data->image ? Storage::url($data->image) : '' }}">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.team_member.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Update Member</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#memberImage').dropify();
    </script>
@endpush
