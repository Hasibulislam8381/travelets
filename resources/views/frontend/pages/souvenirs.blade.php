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

                        @include('frontend.pages.product.suvenir_box')

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
