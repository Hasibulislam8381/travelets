@extends('backend.app')

@section('title', 'Add Category')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="p-5 card">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="e.g. Sundarban Tour" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                                    <select name="type" class="form-select @error('type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        <option value="tour" {{ old('type') == 'tour' ? 'selected' : '' }}>Tour</option>
                                        <option value="training" {{ old('type') == 'training' ? 'selected' : '' }}>Training
                                        </option>
                                        <option value="souvenir" {{ old('type') == 'souvenir' ? 'selected' : '' }}>Souvenir
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Icon <span class="text-muted small">(FontAwesome
                                            class)</span></label>
                                    <input type="text" name="icon"
                                        class="form-control @error('icon') is-invalid @enderror"
                                        placeholder="e.g. fa-bicycle" value="{{ old('icon') }}">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Image</label>
                                    <input type="file" name="image" id="categoryImage"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Description</label>
                                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Short description...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Save Category</button>
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
