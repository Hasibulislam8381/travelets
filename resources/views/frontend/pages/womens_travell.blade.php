<section class="journey-section section_background">
    <div class="container-fluid px-4">

        <!-- Header -->
        <div class="section-header mb-4">
            <div>
                <h2 class="section-title">Global Women Journeys*</h2>

                <p class="section-desc">
                    Empowering women across Bangladesh through safe travel,
                    skill-building, secure stays, and inclusive growth programs
                    — created by women, for women.
                </p>
            </div>

            {{-- Dynamic Tour Type Filters --}}
            <div class="filter-tabs mt-3">

                {{-- ALL --}}
                <button class="filter-tab active" data-filter="all">
                    All
                </button>

                {{-- TOUR TYPE BUTTONS --}}
                <button class="filter-tab" data-filter="bangladesh">
                    Bangladesh
                </button>

                <button class="filter-tab" data-filter="abroad">
                    Abroad
                </button>

                <button class="filter-tab" data-filter="adventure">
                    Adventure
                </button>

                <button class="filter-tab" data-filter="international-tour">
                    International Tour
                </button>

            </div>
        </div>

        <!-- Products Grid -->
        <!-- Products Grid -->
        <div class="row g-4" id="journey-wrapper">

            @foreach ($womenJourneys as $product)
                <div class="col-lg-3 col-md-6 journey-item" data-tour-type="{{ $product->tour_type ?? '' }}">

                    <div class="journey-card h-100">

                        <!-- Image -->
                        <div class="card-img-wrap position-relative">

                            <img src="{{ asset($product->thumbnail ?? 'frontend/images/default.jpg') }}"
                                alt="{{ $product->title }}" class="img-fluid w-100">

                            @if (!empty($product->meta['duration']))
                                <span class="card-badge">
                                    {{ $product->meta['duration'] }}
                                </span>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="card-body-inner">

                            <h3 class="card-name">{{ $product->title }}</h3>

                            <div class="card-location">
                                {{ $product->location }}
                            </div>

                            <div class="card-price">
                                <strong>৳{{ number_format($product->price) }}</strong>
                                <span>/ per person</span>
                            </div>

                            <a href="{{ route('tour-detail', $product->slug) }}"
                                class="book-btn custom_btn_secondary_color">
                                Book Now
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</section>
@push('scripts')
    <script>
        $('.filter-tab').on('click', function() {
            console.log("cliecked");

            $('.filter-tab').removeClass('active');
            $(this).addClass('active');

            let filter = $(this).data('filter');

            if (filter === 'all') {
                $('.journey-item').show();
                return;
            }

            $('.journey-item').each(function() {

                let type = $(this).data('tour-type');

                if (type === filter) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
@endpush
