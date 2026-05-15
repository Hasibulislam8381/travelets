@extends('backend.app')

@section('title', 'Edit Product')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="p-5 card">
                        <form action="{{ route('admin.product.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                <div class="col-12">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-0">Basic Information</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $data->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Category <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id" id="categorySelect"
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" data-type="{{ $category->type }}"
                                                {{ old('category_id', $data->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 d-none" id="tourTypeWrapper">
                                    <label class="form-label fw-semibold">Tour Sub Category</label>
                                    <select name="tour_type" id="tourType" class="form-select">
                                        <option value="">-- Select Tour Type --</option>
                                        <option value="bangladesh"
                                            {{ old('tour_type', $data->tour_type) == 'bangladesh' ? 'selected' : '' }}>
                                            Bangladesh</option>
                                        <option value="abroad"
                                            {{ old('tour_type', $data->tour_type) == 'abroad' ? 'selected' : '' }}>Abroad
                                        </option>
                                        <option value="adventure"
                                            {{ old('tour_type', $data->tour_type) == 'adventure' ? 'selected' : '' }}>
                                            Adventure</option>
                                        <option value="international-tour"
                                            {{ old('tour_type', $data->tour_type) == 'international-tour' ? 'selected' : '' }}>
                                            International Tour</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Price (BDT) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="price" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price', $data->price) }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Badge</label>
                                    <select name="badge" class="form-select @error('badge') is-invalid @enderror">
                                        <option value="">-- None --</option>
                                        @foreach (['New', 'Featured', 'Popular', 'Trend', 'Adventure'] as $badge)
                                            <option value="{{ $badge }}"
                                                {{ old('badge', $data->badge) == $badge ? 'selected' : '' }}>
                                                {{ $badge }}</option>
                                        @endforeach
                                    </select>
                                    @error('badge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Location</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        value="{{ old('location', $data->location) }}">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Short Description</label>
                                    <textarea name="short_description" rows="2" class="form-control">{{ old('short_description', $data->short_description) }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Description</label>
                                    <textarea name="description" rows="2" id="descriptionEditor" class="form-control">{{ old('description', $data->description) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-0">Images</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnailInput"
                                        class="form-control @error('thumbnail') is-invalid @enderror"
                                        data-default-file="{{ $data->thumbnail ? Storage::url($data->thumbnail) : '' }}">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery <span class="text-muted small">(multiple —
                                            replaces existing)</span></label>
                                    <input type="file" name="gallery[]" id="galleryInput" multiple class="form-control">
                                    @if ($data->gallery)
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach ($data->gallery as $img)
                                                <img src="{{ Storage::url($img) }}"
                                                    style="height:60px;width:80px;object-fit:cover;border-radius:6px;">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Tour Specific --}}
                                <div id="tour-fields" class="col-12 d-none">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-3">Tour Details</h6>
                                    <div class="row g-3">

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Duration</label>
                                            <input type="text" name="duration" class="form-control"
                                                value="{{ old('duration', $data->meta['duration'] ?? '') }}"
                                                placeholder="e.g. 3 Days / 2 Nights">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Group Size</label>
                                            <input type="text" name="group_size" class="form-control"
                                                value="{{ old('group_size', $data->meta['group_size'] ?? '') }}"
                                                placeholder="e.g. Max 12">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Included Items</label>
                                            <div id="includes-wrapper">
                                                @foreach (old('includes', $data->meta['includes'] ?? ['']) as $item)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="includes[]" class="form-control"
                                                            value="{{ $item }}" placeholder="Included item">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="this.parentElement.remove()">−</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('includes-wrapper', 'includes[]')">+ Add</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Excluded Items</label>
                                            <div id="excludes-wrapper">
                                                @foreach (old('excludes', $data->meta['excludes'] ?? ['']) as $item)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="excludes[]" class="form-control"
                                                            value="{{ $item }}" placeholder="Excluded item">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="this.parentElement.remove()">−</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('excludes-wrapper', 'excludes[]')">+ Add</button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Itinerary</label>
                                            <div id="itinerary-wrapper">
                                                @foreach (old('itinerary', $data->meta['itinerary'] ?? ['']) as $i => $item)
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">Day {{ $i + 1 }}</span>
                                                        <input type="text" name="itinerary[]" class="form-control"
                                                            value="{{ $item }}">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="this.parentElement.remove()">−</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addItinerary()">+ Add Day</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- Training Specific --}}
                                <div id="training-fields" class="col-12 d-none">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-3">Training Details</h6>
                                    <div class="row g-3">

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Satisfied Count</label>
                                            <input type="number" name="satisfied_count" class="form-control"
                                                value="{{ old('satisfied_count', $data->meta['satisfied_count'] ?? '') }}"
                                                placeholder="e.g. 20">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Available Sessions</label>
                                            <div id="sessions-wrapper">
                                                @foreach (old('sessions', $data->meta['sessions'] ?? ['']) as $item)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="sessions[]" class="form-control"
                                                            value="{{ $item }}" placeholder="e.g. 10am">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="this.parentElement.remove()">−</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('sessions-wrapper', 'sessions[]')">+ Add</button>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Levels Offered</label>
                                            <div id="levels-wrapper">
                                                @foreach (old('levels', $data->meta['levels'] ?? ['']) as $item)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="levels[]" class="form-control"
                                                            value="{{ $item }}" placeholder="e.g. Beginner">
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="this.parentElement.remove()">−</button>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('levels-wrapper', 'levels[]')">+ Add</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- Souvenir Specific --}}
                                <div id="souvenir-fields" class="col-12 d-none">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-3">Souvenir Details</h6>
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Material</label>
                                            <input type="text" name="material" class="form-control"
                                                value="{{ old('material', $data->meta['material'] ?? '') }}"
                                                placeholder="e.g. Rajshahi Silk">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Origin</label>
                                            <input type="text" name="origin" class="form-control"
                                                value="{{ old('origin', $data->meta['origin'] ?? '') }}"
                                                placeholder="e.g. Rajshahi">
                                        </div>

                                    </div>
                                </div>
                                {{-- Dormitory Specific --}}
                                <div id="dormitory-fields" class="col-12 d-none">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-3">Dormitory Details</h6>
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Features</label>
                                            <div id="features-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="features[]" class="form-control"
                                                        placeholder="e.g. 24/7 Security">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="this.parentElement.remove()">−</button>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('features-wrapper','features[]')">+ Add
                                                    Feature</button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Price Plans</label>
                                            <div id="price-plans-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="price_plans[]" class="form-control"
                                                        placeholder="e.g. ৳2,500 / month - Shared (4-bed)">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="this.parentElement.remove()">−</button>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('price-plans-wrapper','price_plans[]')">+ Add
                                                    Plan</button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Room Types</label>
                                            <div id="room-types-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="room_types[]" class="form-control"
                                                        placeholder="e.g. 1 bed, 2 bed, 4 bed">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="this.parentElement.remove()">−</button>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="addField('room-types-wrapper','room_types[]')">+ Add Room
                                                    Type</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Update Product</button>
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
        $(document).ready(function() {

            $('#thumbnailInput').dropify();

            // Category change → type detect → show fields
            $('#categorySelect').on('change', function() {
                const type = $(this).find(':selected').data('type');
                handleProductType(type);
            });

            // On load — existing category type দিয়ে fields দেখাবে
            const existingType = $('#categorySelect').find(':selected').data('type');
            if (existingType) {
                handleProductType(existingType);
            }
        });

        function handleProductType(type) {
            $('#tour-fields, #training-fields, #souvenir-fields, #dormitory-fields').addClass('d-none');

            if (type === 'womens_journey') {
                $('#tour-fields').removeClass('d-none');
                $('#tourTypeWrapper').removeClass('d-none');
            } else {
                $('#tourTypeWrapper').addClass('d-none');
                $('#tourType').val('');
            }

            if (type === 'skill_training') $('#training-fields').removeClass('d-none');
            if (type === 'souvenirs') $('#souvenir-fields').removeClass('d-none');
            if (type === 'dormitory') $('#dormitory-fields').removeClass('d-none');
        }

        function addField(wrapperId, fieldName) {
            const wrapper = document.getElementById(wrapperId);
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
            <input type="text" name="${fieldName}" class="form-control">
            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">−</button>
        `;
            wrapper.insertBefore(div, wrapper.lastElementChild);
        }

        function addItinerary() {
            const wrapper = document.getElementById('itinerary-wrapper');
            const day = wrapper.querySelectorAll('.input-group').length + 1;
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
            <span class="input-group-text">Day ${day}</span>
            <input type="text" name="itinerary[]" class="form-control" placeholder="Day ${day} description">
            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">−</button>
        `;
            wrapper.insertBefore(div, wrapper.lastElementChild);
        }
    </script>
@endpush
