<section class="shop-section">
    <div class="container-fluid px-4">
        <div class="row g-4">

            <!-- Left: Text -->
            <div class="col-lg-3 col-md-4">
                <div class="shop-intro">
                    <h2 class="shop-title">Take a piece of the journey home*</h2>
                    <p class="shop-desc">Every item in our collection is locally crafted, women-made, and rooted in
                        Bangladeshi heritage. Your purchase directly supports the artisans and our social programs.</p>
                    <p class="shop-desc">Handpicked by the Travelettes team from crafts communities across Bangladesh —
                        from Rajshahi silk to Sylhet bamboo.</p>
                </div>
            </div>

            <!-- Right: Products Grid -->
            <div class="col-lg-9 col-md-8">
                <div class="row g-3">
                    @foreach ($souvenirs as $index => $souvenir)
                        {{-- Row 2 offset --}}
                        {{-- @if ($index === 4)
                            <div class="col-lg-1 d-none d-lg-block"></div>
                        @endif --}}

                        <div class="col-lg-3 col-6">
                            <div class="product-card">
                                <div class="product-img-wrap">
                                    <img src="{{ $souvenir->thumbnail ? Storage::url($souvenir->thumbnail) : 'https://images.unsplash.com/photo-1601924994987-69e26d50dc26?w=400&q=80' }}"
                                        alt="{{ $souvenir->title }}">
                                </div>
                                <div class="product-body">
                                    <div class="product-top">
                                        <h4 class="product-name">{{ $souvenir->title }}</h4>
                                        @if ($souvenir->badge)
                                            <span class="product-badge {{ strtolower($souvenir->badge) }}">
                                                {{ $souvenir->badge }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="product-desc">{{ $souvenir->short_description }}</p>
                                    <div class="product-footer">
                                        <span class="product-price">৳{{ number_format($souvenir->price) }}</span>
                                        <a href="{{ route('tour-detail', $souvenir->slug) }}" class="buy-btn">Buy
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 end offset --}}
                        {{-- @if ($index === 5)
                            <div class="col-lg-1 d-none d-lg-block"></div>
                        @endif --}}
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
