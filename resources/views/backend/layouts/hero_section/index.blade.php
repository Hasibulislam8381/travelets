@extends('backend.app')

@section('title', 'Hero Section')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5 card">
                        <div class="card-style mb-30">

                            <form action="{{ route('admin.hero_section.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">

                                    {{-- Badge Text --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Badge Text</label>
                                        <input type="text" name="badge_text"
                                            class="form-control @error('badge_text') is-invalid @enderror"
                                            placeholder="e.g. Women Exploring Bangladesh & Beyond"
                                            value="{{ old('badge_text', $data->badge_text ?? '') }}">
                                        @error('badge_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Title --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="e.g. Explore Fearlessly."
                                            value="{{ old('title', $data->title ?? '') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Subtitle --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Subtitle <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror"
                                            placeholder="e.g. Thrive Together."
                                            value="{{ old('subtitle', $data->subtitle ?? '') }}">
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Description</label>
                                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Short description...">{{ old('description', $data->description ?? '') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Primary Button --}}
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Primary Button Text</label>
                                        <input type="text" name="primary_btn_text"
                                            class="form-control @error('primary_btn_text') is-invalid @enderror"
                                            placeholder="e.g. Explore Services"
                                            value="{{ old('primary_btn_text', $data->primary_btn_text ?? '') }}">
                                        @error('primary_btn_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Primary Button URL</label>
                                        <input type="text" name="primary_btn_url"
                                            class="form-control @error('primary_btn_url') is-invalid @enderror"
                                            placeholder="e.g. #offer"
                                            value="{{ old('primary_btn_url', $data->primary_btn_url ?? '') }}">
                                        @error('primary_btn_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Secondary Button --}}
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Secondary Button Text</label>
                                        <input type="text" name="secondary_btn_text"
                                            class="form-control @error('secondary_btn_text') is-invalid @enderror"
                                            placeholder="e.g. Book Now"
                                            value="{{ old('secondary_btn_text', $data->secondary_btn_text ?? '') }}">
                                        @error('secondary_btn_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold">Secondary Button URL</label>
                                        <input type="text" name="secondary_btn_url"
                                            class="form-control @error('secondary_btn_url') is-invalid @enderror"
                                            placeholder="e.g. #book"
                                            value="{{ old('secondary_btn_url', $data->secondary_btn_url ?? '') }}">
                                        @error('secondary_btn_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Banner Image --}}
                                    {{-- Banner Image --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Banner Image</label>
                                        <input type="file" name="banner_image" id="bannerImageInput"
                                            class="@error('banner_image') is-invalid @enderror" accept="image/*">
                                        @error('banner_image')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Current Image Preview --}}
                                    <div class="col-md-6 d-flex align-items-center">
                                        @if (!empty($data->banner_image))
                                            <div>
                                                <p class="form-label fw-semibold mb-2">Current Image</p>
                                                <img src="{{ Storage::url($data->banner_image) }}" alt="Banner Preview"
                                                    class="img-thumbnail" style="height:120px;object-fit:cover;">
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Stats --}}
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Stats</label>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 1 Value</label>
                                        <input type="text" name="stat_1_value"
                                            class="form-control @error('stat_1_value') is-invalid @enderror"
                                            placeholder="e.g. 4,800+"
                                            value="{{ old('stat_1_value', $data->stat_1_value ?? '') }}">
                                        @error('stat_1_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 1 Label</label>
                                        <input type="text" name="stat_1_label"
                                            class="form-control @error('stat_1_label') is-invalid @enderror"
                                            placeholder="e.g. Women Served"
                                            value="{{ old('stat_1_label', $data->stat_1_label ?? '') }}">
                                        @error('stat_1_label')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 2 Value</label>
                                        <input type="text" name="stat_2_value"
                                            class="form-control @error('stat_2_value') is-invalid @enderror"
                                            placeholder="e.g. 42+"
                                            value="{{ old('stat_2_value', $data->stat_2_value ?? '') }}">
                                        @error('stat_2_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 2 Label</label>
                                        <input type="text" name="stat_2_label"
                                            class="form-control @error('stat_2_label') is-invalid @enderror"
                                            placeholder="e.g. Destinations"
                                            value="{{ old('stat_2_label', $data->stat_2_label ?? '') }}">
                                        @error('stat_2_label')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 3 Value</label>
                                        <input type="text" name="stat_3_value"
                                            class="form-control @error('stat_3_value') is-invalid @enderror"
                                            placeholder="e.g. 14+"
                                            value="{{ old('stat_3_value', $data->stat_3_value ?? '') }}">
                                        @error('stat_3_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Stat 3 Label</label>
                                        <input type="text" name="stat_3_label"
                                            class="form-control @error('stat_3_label') is-invalid @enderror"
                                            placeholder="e.g. Skill Programs"
                                            value="{{ old('stat_3_label', $data->stat_3_label ?? '') }}">
                                        @error('stat_3_label')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Status</label>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" name="status"
                                                id="statusToggle"
                                                {{ isset($data) && $data->status == 'active' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusToggle">Active</label>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary px-5">
                                            {{ isset($data) ? 'Update Hero Section' : 'Save Hero Section' }}
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        createFilePond('#bannerImageInput');
    </script>
@endpush
