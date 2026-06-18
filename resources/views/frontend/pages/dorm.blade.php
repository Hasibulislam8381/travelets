@php
    $dorm = \App\Models\Dorm::first();
    $icons = [
        'security' =>
            '<path d="M12 18a6 6 0 1 1 12 0" stroke="#c8783a" stroke-width="1.3" stroke-linecap="round"/><circle cx="18" cy="18" r="2" fill="#c8783a"/><path d="M18 10v2M18 26v2M10 18h2M26 18h2" stroke="rgba(255,255,255,0.3)" stroke-width="1.2" stroke-linecap="round"/>',
        'lock' =>
            '<path d="M12 22v-8a6 6 0 0 1 12 0v8" stroke="#c8783a" stroke-width="1.3" stroke-linecap="round"/><rect x="10" y="22" width="16" height="4" rx="1" stroke="rgba(255,255,255,0.4)" stroke-width="1.2"/>',
        'wifi' =>
            '<path d="M11 20h14M13 20v-4a5 5 0 0 1 10 0v4" stroke="#c8783a" stroke-width="1.3" stroke-linecap="round"/><path d="M11 20v3h14v-3" stroke="rgba(255,255,255,0.4)" stroke-width="1.2" stroke-linecap="round"/>',
        'person' =>
            '<path d="M13 22c0-2.8 2.2-5 5-5s5 2.2 5 5" stroke="#c8783a" stroke-width="1.3" stroke-linecap="round"/><circle cx="18" cy="14" r="3" stroke="rgba(255,255,255,0.5)" stroke-width="1.2"/>',
        'bed' =>
            '<rect x="12" y="13" width="12" height="10" rx="2" stroke="#c8783a" stroke-width="1.3"/><path d="M15 13v-2a3 3 0 0 1 6 0v2" stroke="rgba(255,255,255,0.4)" stroke-width="1.2" stroke-linecap="round"/><circle cx="18" cy="18" r="1.2" fill="#c8783a"/>',
        'chart' =>
            '<path d="M12 24l3-4 3 3 3-4 3 5" stroke="#c8783a" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 12v2M14 13l1 1.7M22 13l-1 1.7" stroke="rgba(255,255,255,0.4)" stroke-width="1.2" stroke-linecap="round"/>',
    ];
@endphp

<section class="dorm-section">
    <div class="container-fluid px-4">
        <div class="row g-4">

            <div class="col-lg-12">

                <h2 class="section-title">
                    {{ $dorm->meta['section_title'] ?? 'A home away from home*' }}
                </h2>
                <p class="section-desc">
                    {{ $dorm->meta['section_desc'] ?? 'Empowering women across Bangladesh through safe travel, skill-building, secure stays, and inclusive growth programs — created by women, for women.' }}
                </p>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row g-3">

                            {{-- Feature Cards --}}
                            @forelse($dorm->meta['features'] ?? [] as $feature)
                                <div class="col-6">
                                    <div class="feature-card">
                                        <svg class="feature-icon" viewBox="0 0 36 36" fill="none">
                                            <circle cx="18" cy="18" r="16" stroke="rgba(255,255,255,0.3)"
                                                stroke-width="1" />
                                            {!! $icons[$feature['icon']] ?? $icons['security'] !!}
                                        </svg>
                                        <h4>{{ $feature['title'] }}</h4>
                                        <p>{{ $feature['description'] }}</p>
                                    </div>
                                </div>
                            @empty
                                {{-- Fallback: meta না থাকলে static দেখাবে --}}
                                <div class="col-6">
                                    <div class="feature-card">
                                        <svg class="feature-icon" viewBox="0 0 36 36" fill="none">
                                            <circle cx="18" cy="18" r="16" stroke="rgba(255,255,255,0.3)"
                                                stroke-width="1" />
                                            {!! $icons['security'] !!}
                                        </svg>
                                        <h4>24/7 Security</h4>
                                        <p>Women-only secure access with CCTV monitoring</p>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                        {{-- Pricing Bar --}}
                        <div class="pricing-bar">
                            @forelse($dorm->meta['pricing'] ?? [] as $price)
                                <div class="pricing-item">
                                    <div class="pricing-amount">৳{{ $price['amount'] }}</div>
                                    <div class="pricing-label">{{ $price['label'] }}</div>
                                </div>
                            @empty
                                <div class="pricing-item">
                                    <div class="pricing-amount">৳2,500</div>
                                    <div class="pricing-label">/ month — Shared (4-bed)</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-amount">৳3,500</div>
                                    <div class="pricing-label">/ month — Shared (2-bed)</div>
                                </div>
                                <div class="pricing-item">
                                    <div class="pricing-amount">৳5,500</div>
                                    <div class="pricing-label">/ month — Private (1-bed)</div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Booking Form --}}
                    <div class="col-lg-6">
                        <div class="booking-panel">
                            <h3>Check Availability & Book</h3>

                            @if (session('dorm-success'))
                                <div class="alert alert-success mb-3">{{ session('dorm-success') }}</div>
                            @endif
                            @if (session('dorm-error'))
                                <div class="alert alert-danger mb-3">{{ session('dorm-error') }}</div>
                            @endif

                            <form action="{{ route('dorm.booking.store') }}" method="POST">
                                @csrf

                                <div class="form-mb">
                                    <label class="form-label-custom dorm-text">Move-in Date</label>
                                    <div class="input-icon-wrap">
                                        <input type="date" name="move_in_date"
                                            class="form-control-custom @error('move_in_date') is-invalid @enderror"
                                            value="{{ old('move_in_date') }}">
                                        @error('move_in_date')
                                            <div style="color:#c0392b;font-size:12px;margin-top:4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3 form-mb">
                                    <div class="col-6">
                                        <label class="form-label-custom dorm-text">Duration</label>
                                        <div class="select-wrap">
                                            <select name="duration"
                                                class="form-select-custom @error('duration') is-invalid @enderror">
                                                <option value="1 month"
                                                    {{ old('duration') == '1 month' ? 'selected' : '' }}>1 month
                                                </option>
                                                <option value="3 months"
                                                    {{ old('duration') == '3 months' ? 'selected' : '' }}>3 months
                                                </option>
                                                <option value="6 months"
                                                    {{ old('duration') == '6 months' ? 'selected' : '' }}>6 months
                                                </option>
                                                <option value="1 year"
                                                    {{ old('duration') == '1 year' ? 'selected' : '' }}>1 year
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label-custom dorm-text">Room Type</label>
                                        <div class="select-wrap">
                                            <select name="room_type"
                                                class="form-select-custom @error('room_type') is-invalid @enderror">
                                                @if (!empty($dorm->meta['room_types']))
                                                    @foreach ($dorm->meta['room_types'] as $room)
                                                        <option value="{{ $room }}"
                                                            {{ old('room_type') == $room ? 'selected' : '' }}>
                                                            {{ $room }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="1 bed">1 bed</option>
                                                    <option value="2 bed shared">2 bed shared</option>
                                                    <option value="4 bed shared">4 bed shared</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-mb">
                                    <label class="form-label-custom dorm-text">Full Name</label>
                                    <input type="text" name="full_name"
                                        class="form-control-custom @error('full_name') is-invalid @enderror"
                                        placeholder="name here" value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <div style="color:#c0392b;font-size:12px;margin-top:4px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3 form-mb">
                                    <div class="col-6">
                                        <label class="form-label-custom dorm-text">Phone Number</label>
                                        <input type="text" name="phone"
                                            class="form-control-custom @error('phone') is-invalid @enderror"
                                            placeholder="••••••••••" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div style="color:#c0392b;font-size:12px;margin-top:4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label-custom dorm-text">Occupation</label>
                                        <div class="select-wrap">
                                            <select name="occupation"
                                                class="form-select-custom @error('occupation') is-invalid @enderror">
                                                <option value="Student"
                                                    {{ old('occupation') == 'Student' ? 'selected' : '' }}>Student
                                                </option>
                                                <option value="Professional"
                                                    {{ old('occupation') == 'Professional' ? 'selected' : '' }}>
                                                    Professional</option>
                                                <option value="Business"
                                                    {{ old('occupation') == 'Business' ? 'selected' : '' }}>
                                                    Business</option>
                                                <option value="Other"
                                                    {{ old('occupation') == 'Other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="request-btn"
                                    style="border:none;width:100%;cursor:pointer;">
                                    Request Booking
                                </button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
