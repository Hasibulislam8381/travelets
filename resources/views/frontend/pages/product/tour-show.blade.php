@extends('frontend.layouts.app')
@section('title', $product->title)
@section('content')
    <div class="container-fluid px-0">
        <div class="row g-0">

            <!-- Left: Hero + Content -->
            <div class="col-lg-8">

                <!-- Hero Slider -->
                <div class="tour-hero">
                    <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=900&q=80' }}"
                        alt="{{ $product->title }}" id="heroImg">
                    <div class="hero-overlay"></div>

                    @if ($product->gallery && count($product->gallery) > 0)
                        <button class="slider-btn prev" onclick="changeSlide(-1)"><i class="fa fa-chevron-left"></i></button>
                        <button class="slider-btn next" onclick="changeSlide(1)"><i
                                class="fa fa-chevron-right"></i></button>
                    @endif

                    <div class="hero-badges">
                        <div class="hero-badge-item"><i class="fa fa-image"></i> Preferably a self-guide</div>
                        <div class="hero-badge-item"><i class="fa fa-leaf"></i> Eco-designed program</div>
                        <div class="hero-badge-item"><i class="fa fa-user"></i> Fully local guides</div>
                        <div class="hero-badge-item"><i class="fa fa-map"></i> Another transport stop</div>
                    </div>
                </div>

                <div class="p-3 p-lg-4">

                    <!-- Description -->
                    <div class="main-content">
                        <h2 class="section-title">{{ $product->title }}</h2>
                        <p class="section-desc">{{ $product->description }}</p>
                    </div>

                    <!-- Included / Excluded -->
                    @if (!empty($product->meta['includes']) || !empty($product->meta['excludes']))
                        <div class="main-content">
                            <div class="inc-exc-grid">
                                <div>
                                    <div class="inc-title">Included</div>
                                    <ul class="inc-list">
                                        @foreach ($product->meta['includes'] ?? [] as $item)
                                            <li><i class="fa fa-check-circle"></i> {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <div class="exc-title">Excluded</div>
                                    <ul class="exc-list">
                                        @foreach ($product->meta['excludes'] ?? [] as $item)
                                            <li><i class="fa fa-times-circle"></i> {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Itinerary -->
                    @if (!empty($product->meta['itinerary']))
                        <div class="main-content">
                            <h2 class="section-title">Itinerary</h2>
                            @foreach ($product->meta['itinerary'] as $i => $day)
                                <div class="itinerary-item">
                                    <div class="itinerary-header" onclick="toggleItinerary(this)">
                                        <div>
                                            <span class="day-badge">Day {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            {{ Str::limit($day, 60) }}
                                        </div>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="itinerary-body {{ $i === 0 ? 'open' : '' }}">
                                        <p>{{ $day }}</p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Gallery -->
                    @if ($product->gallery && count($product->gallery) > 0)
                        <div class="main-content">
                            <div class="gallery-grid">
                                @foreach ($product->gallery as $img)
                                    <img src="{{ Storage::url($img) }}" alt="{{ $product->title }}">
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="col-lg-4 p-3 p-lg-4">
                <div class="sidebar-card">
                    <div class="tour-title-sidebar">{{ $product->title }}</div>
                    @if ($product->location)
                        <div class="tour-location-sidebar">
                            <i class="fa fa-map-marker-alt"></i> {{ $product->location }}
                        </div>
                    @endif

                    @if (!empty($product->meta['duration']))
                        <div class="info-row">
                            <i class="fa fa-calendar"></i>
                            <div>
                                <div class="info-label">Duration</div>
                                <div class="info-value">{{ $product->meta['duration'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($product->meta['group_size']))
                        <div class="info-row">
                            <i class="fa fa-users"></i>
                            <div>
                                <div class="info-label">Group Size</div>
                                <div class="info-value">{{ $product->meta['group_size'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($product->meta['includes']))
                        <ul class="includes-list mt-2">
                            @foreach ($product->meta['includes'] as $item)
                                <li><i class="fa fa-check"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="price-box">
                        <div class="price-label">Starting from</div>
                        <div class="d-flex align-items-baseline gap-2">
                            <div class="price-value">৳{{ number_format($product->price) }}</div>
                            <div class="price-per">/ per-person</div>
                        </div>

                        <button class="btn-book">Book Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const slides = [
            '{{ $product->thumbnail ? Storage::url($product->thumbnail) : '' }}',
            @foreach ($product->gallery ?? [] as $img)
                '{{ Storage::url($img) }}',
            @endforeach
        ];
        let current = 0;

        function changeSlide(dir) {
            current = (current + dir + slides.length) % slides.length;
            document.getElementById('heroImg').src = slides[current];
        }

        function toggleItinerary(header) {
            const body = header.nextElementSibling;
            const icon = header.querySelector('i');
            body.classList.toggle('open');
            icon.style.transform = body.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0)';
        }
    </script>
@endsection
