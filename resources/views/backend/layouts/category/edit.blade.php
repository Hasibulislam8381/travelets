@extends('backend.app')

@section('title', 'Edit Category')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="p-5 card">
                        <form action="{{ route('admin.category.update', $data->id) }}" method="POST"
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
                                    <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                                    <select name="type" class="form-select @error('type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        <option value="tour" {{ old('type', $data->type) == 'tour' ? 'selected' : '' }}>
                                            Tour</option>
                                        <option value="training"
                                            {{ old('type', $data->type) == 'training' ? 'selected' : '' }}>Training</option>
                                        <option value="souvenir"
                                            {{ old('type', $data->type) == 'souvenir' ? 'selected' : '' }}>Souvenir</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Icon</label>
                                    <input type="text" name="icon"
                                        class="form-control @error('icon') is-invalid @enderror"
                                        value="{{ old('icon', $data->icon) }}" placeholder="e.g. fa-bicycle">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Image</label>
                                    <input type="file" name="image" id="categoryImage"
                                        class="form-control @error('image') is-invalid @enderror"
                                        data-default-file="{{ $data->image ? Storage::url($data->image) : '' }}">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Description</label>
                                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Update Category</button>
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
        $('#categoryImage').dropify();
    </script>
@endpush
