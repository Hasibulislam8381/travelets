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
                @include('frontend.pages.product.travell_box')
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
