@extends('backend.app')

@section('title', 'Add Product')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="p-5 card">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                {{-- Basic Info --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-0">Basic Information</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="e.g. Sundarban Mangrove Safari" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- 
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="productType"
                                        class="form-select @error('type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        <option value="tour" {{ old('type') == 'tour' ? 'selected' : '' }}>Tour</option>
                                        <option value="training" {{ old('type') == 'training' ? 'selected' : '' }}>Training
                                        </option>
                                        <option value="souvenir" {{ old('type') == 'souvenir' ? 'selected' : '' }}>Souvenir
                                        </option>
                                        <option value="dormitory" {{ old('type') == 'dormitory' ? 'selected' : '' }}>
                                            Dormitory</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Category <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id" id="categorySelect"
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" data-type="{{ $category->type }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 d-none" id="tourTypeWrapper">
                                    <label class="form-label fw-semibold">Tour sub Category</label>

                                    <select name="tour_type" id="tourType" class="form-select">
                                        <option value="">-- Select Tour Type --</option>
                                        <option value="bangladesh">Bangladesh</option>
                                        <option value="abroad">Abroad</option>
                                        <option value="adventure">Adventure</option>
                                        <option value="international-tour">International Tour</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Price (BDT) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="price" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="e.g. 4500"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Badge</label>
                                    <select name="badge" class="form-select @error('badge') is-invalid @enderror">
                                        <option value="">-- None --</option>
                                        <option value="New" {{ old('badge') == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Featured" {{ old('badge') == 'Featured' ? 'selected' : '' }}>
                                            Featured</option>
                                        <option value="Popular" {{ old('badge') == 'Popular' ? 'selected' : '' }}>Popular
                                        </option>
                                        <option value="Trend" {{ old('badge') == 'Trend' ? 'selected' : '' }}>Trend
                                        </option>
                                        <option value="Adventure" {{ old('badge') == 'Adventure' ? 'selected' : '' }}>
                                            Adventure</option>
                                    </select>
                                    @error('badge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Location</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        placeholder="e.g. Khulna, Bangladesh" value="{{ old('location') }}">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Short Description</label>
                                    <textarea name="short_description" rows="2" class="form-control @error('short_description') is-invalid @enderror"
                                        placeholder="Brief summary...">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Description</label>
                                    <textarea name="description" rows="2" id="descriptionEditor"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Full details...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Images --}}
                                <div class="col-12">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-0">Images</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnailInput"
                                        class="form-control @error('thumbnail') is-invalid @enderror">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery <span
                                            class="text-muted small">(multiple)</span></label>
                                    <input type="file" name="gallery[]" id="galleryInput" multiple
                                        class="form-control @error('gallery.*') is-invalid @enderror">
                                    @error('gallery.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tour Specific --}}
                                <div id="tour-fields" class="col-12 d-none">
                                    <h6 class="fw-bold text-muted border-bottom pb-2 mb-3">Tour Details</h6>
                                    <div class="row g-3">

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Duration</label>
                                            <input type="text" name="duration" class="form-control"
                                                placeholder="e.g. 3 Days / 2 Nights" value="{{ old('duration') }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Group Size</label>
                                            <input type="text" name="group_size" class="form-control"
                                                placeholder="e.g. Max 12" value="{{ old('group_size') }}">
                                        </div>

                                        {{-- Includes --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Included Items</label>
                                            <div id="includes-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="includes[]" class="form-control"
                                                        placeholder="e.g. Transport Included">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addField('includes-wrapper', 'includes[]')">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Excludes --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Excluded Items</label>
                                            <div id="excludes-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="excludes[]" class="form-control"
                                                        placeholder="e.g. Personal expenses">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addField('excludes-wrapper', 'excludes[]')">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Itinerary --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Itinerary</label>
                                            <div id="itinerary-wrapper">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Day 1</span>
                                                    <input type="text" name="itinerary[]" class="form-control"
                                                        placeholder="Day 1 description">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addItinerary()">+</button>
                                                </div>
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
                                                placeholder="e.g. 20" value="{{ old('satisfied_count') }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Available Sessions</label>
                                            <div id="sessions-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="sessions[]" class="form-control"
                                                        placeholder="e.g. 10am">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addField('sessions-wrapper', 'sessions[]')">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Levels Offered</label>
                                            <div id="levels-wrapper">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="levels[]" class="form-control"
                                                        placeholder="e.g. Beginner">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="addField('levels-wrapper', 'levels[]')">+</button>
                                                </div>
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
                                                placeholder="e.g. Rajshahi Silk" value="{{ old('material') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Origin</label>
                                            <input type="text" name="origin" class="form-control"
                                                placeholder="e.g. Rajshahi" value="{{ old('origin') }}">
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
                                {{-- Submit --}}
                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Save Product</button>
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

            // Dropify init
            $('#thumbnailInput').dropify();

            // Category change → type detect → show fields
            $('#categorySelect').on('change', function() {
                const type = $(this).find(':selected').data('type');
                handleProductType(type);
            });

            // initial load state (old value থাকলে)
            const oldCategory = $('#categorySelect').val();
            if (oldCategory) {
                const type = $('#categorySelect').find(':selected').data('type');
                handleProductType(type);
            }
        });

        // ==============================
        // PRODUCT TYPE HANDLER
        // ==============================
        function handleProductType(type) {

            // hide all dynamic sections first
            $('#tour-fields, #training-fields, #souvenir-fields, #dormitory-fields')
                .addClass('d-none');

            // WOMENS JOURNEY
            if (type === 'womens_journey') {
                $('#tour-fields').removeClass('d-none');
                $('#tourTypeWrapper').removeClass('d-none');
            } else {
                $('#tourTypeWrapper').addClass('d-none');
                $('#tourType').val('');
            }

            // SKILL TRAINING
            if (type === 'skill_training') {
                $('#training-fields').removeClass('d-none');
            }

            // SOUVENIRS
            if (type === 'souvenirs') {
                $('#souvenir-fields').removeClass('d-none');
            }

            // DORMITORY
            if (type === 'dormitory') {
                $('#dormitory-fields').removeClass('d-none');
            }
        }
        // ==============================
        // ADD DYNAMIC FIELD
        // ==============================
        function addField(wrapperId, fieldName) {

            const wrapper = document.getElementById(wrapperId);
            const count = wrapper.querySelectorAll('input').length + 1;

            const div = document.createElement('div');
            div.className = 'input-group mb-2';

            div.innerHTML = `
            <input type="text" name="${fieldName}" class="form-control" placeholder="Item ${count}">
            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">−</button>
        `;

            wrapper.appendChild(div);
        }

        // ==============================
        // ADD ITINERARY DAY
        // ==============================
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

            wrapper.appendChild(div);
        }
    </script>
@endpush
