<div class="col-lg-3 col-md-6 journey-item" data-tour-type="{{ $product->tour_type ?? '' }}">

    <div class="journey-card h-100">

        <!-- Image -->
        <div class="card-img-wrap position-relative">

            <img src="{{ asset($product->thumbnail ?? 'frontend/images/default.jpg') }}" alt="{{ $product->title }}"
                class="img-fluid w-100">

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

            <a href="{{ route('tour-detail', $product->slug) }}" class="book-btn custom_btn_secondary_color">
                Book Now
            </a>

        </div>
    </div>
</div>
