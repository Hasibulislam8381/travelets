@extends('backend.app')
@section('title', 'Manage Dorm Content')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.dorm.update') }}" method="POST">
                            @csrf

                            {{-- Section Info --}}


                            <hr>

                            {{-- Feature Cards --}}
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Feature Cards</h5>
                                    <button type="button" class="btn btn-sm btn-primary" id="add-feature">+ Add
                                        Feature</button>
                                </div>

                                <div id="features-wrapper">
                                    @php $features = old('features', $dorm->meta['features'] ?? []) @endphp
                                    @forelse($features as $i => $feature)
                                        <div class="feature-row border rounded p-3 mb-3">
                                            <div class="row g-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="features[{{ $i }}][title]"
                                                        class="form-control" value="{{ $feature['title'] }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" name="features[{{ $i }}][description]"
                                                        class="form-control" value="{{ $feature['description'] }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Icon</label>
                                                    <select name="features[{{ $i }}][icon]" class="form-select">
                                                        @foreach (['security', 'lock', 'wifi', 'person', 'bed', 'chart'] as $icon)
                                                            <option value="{{ $icon }}"
                                                                {{ $feature['icon'] == $icon ? 'selected' : '' }}>
                                                                {{ ucfirst($icon) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-row">✕</button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted" id="no-feature-msg">No features added yet.</p>
                                    @endforelse
                                </div>
                            </div>

                            <hr>

                            {{-- Pricing --}}
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Pricing</h5>
                                    <button type="button" class="btn btn-sm btn-primary" id="add-pricing">+ Add
                                        Pricing</button>
                                </div>

                                <div id="pricing-wrapper">
                                    @php $pricing = old('pricing', $dorm->meta['pricing'] ?? []) @endphp
                                    @forelse($pricing as $j => $price)
                                        <div class="pricing-row border rounded p-3 mb-3">
                                            <div class="row g-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Amount (e.g. 2,500)</label>
                                                    <input type="text" name="pricing[{{ $j }}][amount]"
                                                        class="form-control" value="{{ $price['amount'] }}">
                                                </div>
                                                <div class="col-md-7">
                                                    <label class="form-label">Label (e.g. / month — Shared 4-bed)</label>
                                                    <input type="text" name="pricing[{{ $j }}][label]"
                                                        class="form-control" value="{{ $price['label'] }}">
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-row">✕</button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted" id="no-pricing-msg">No pricing added yet.</p>
                                    @endforelse
                                </div>
                            </div>

                            <hr>

                            {{-- Room Types --}}
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Room Types</h5>
                                    <button type="button" class="btn btn-sm btn-primary" id="add-room">+ Add Room
                                        Type</button>
                                </div>

                                <div id="room-wrapper">
                                    @php $roomTypes = old('room_types', $dorm->meta['room_types'] ?? []) @endphp
                                    @forelse($roomTypes as $k => $room)
                                        <div class="room-row d-flex gap-2 mb-2">
                                            <input type="text" name="room_types[{{ $k }}]"
                                                class="form-control" value="{{ $room }}">
                                            <button type="button" class="btn btn-danger btn-sm remove-row">✕</button>
                                        </div>
                                    @empty
                                        <p class="text-muted" id="no-room-msg">No room types added yet.</p>
                                    @endforelse
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success px-5">Save Changes</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let featureIndex = {{ count($dorm->meta['features'] ?? []) }};
        let pricingIndex = {{ count($dorm->meta['pricing'] ?? []) }};
        let roomIndex = {{ count($dorm->meta['room_types'] ?? []) }};

        const icons = ['security', 'lock', 'wifi', 'person', 'bed', 'chart'];

        // Add Feature
        $('#add-feature').on('click', function() {
            $('#no-feature-msg').hide();
            const iconOptions = icons.map(i =>
                `<option value="${i}">${i.charAt(0).toUpperCase() + i.slice(1)}</option>`).join('');
            $('#features-wrapper').append(`
            <div class="feature-row border rounded p-3 mb-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="features[${featureIndex}][title]" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Description</label>
                        <input type="text" name="features[${featureIndex}][description]" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Icon</label>
                        <select name="features[${featureIndex}][icon]" class="form-select">${iconOptions}</select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-row">✕</button>
                    </div>
                </div>
            </div>
        `);
            featureIndex++;
        });

        // Add Pricing
        $('#add-pricing').on('click', function() {
            $('#no-pricing-msg').hide();
            $('#pricing-wrapper').append(`
            <div class="pricing-row border rounded p-3 mb-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <label class="form-label">Amount (e.g. 2,500)</label>
                        <input type="text" name="pricing[${pricingIndex}][amount]" class="form-control">
                    </div>
                    <div class="col-md-7">
                        <label class="form-label">Label (e.g. / month — Shared 4-bed)</label>
                        <input type="text" name="pricing[${pricingIndex}][label]" class="form-control">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-row">✕</button>
                    </div>
                </div>
            </div>
        `);
            pricingIndex++;
        });

        // Add Room Type
        $('#add-room').on('click', function() {
            $('#no-room-msg').hide();
            $('#room-wrapper').append(`
            <div class="room-row d-flex gap-2 mb-2">
                <input type="text" name="room_types[${roomIndex}]" class="form-control">
                <button type="button" class="btn btn-danger btn-sm remove-row">✕</button>
            </div>
        `);
            roomIndex++;
        });

        // Remove any row
        $(document).on('click', '.remove-row', function() {
            $(this).closest('.feature-row, .pricing-row, .room-row').remove();
        });
    </script>
@endpush
