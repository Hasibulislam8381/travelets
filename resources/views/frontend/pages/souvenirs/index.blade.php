@extends('frontend.layouts.app')
@section('title', 'Souvenirs')
@section('content')

    <section class="shop-section section_padding">
        <div class="container-fluid px-4">
            <div class="row g-4">
                <!-- Right: Products Grid -->
                <div class="col-lg-12 col-md-8">
                    <div class="shop-intro pb-5">
                        <h2 class="shop-title">Take a piece of the journey home*</h2>
                        <p class="shop-desc">Every item in our collection is locally crafted, women-made, and rooted in
                            Bangladeshi heritage. Your purchase directly supports the artisans and our social programs.</p>
                        <p class="shop-desc">Handpicked by the Travelettes team from crafts communities across Bangladesh —
                            from Rajshahi silk to Sylhet bamboo.</p>
                    </div>
                    <div class="row g-3">
                        @foreach ($products as $index => $souvenir)
                            @include('frontend.pages.product.suvenir_box')
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
