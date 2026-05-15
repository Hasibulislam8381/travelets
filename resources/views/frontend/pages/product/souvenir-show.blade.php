@extends('frontend.layouts.app')
@section('title', $product->title)
@section('content')
    <div class="container-fluid px-4 py-5">
        <div class="row g-4">

            <div class="col-lg-8">
                <div class="main-content">

                    {{-- Main Image --}}
                    <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : 'https://images.unsplash.com/photo-1601924994987-69e26d50dc26?w=800&q=80' }}"
                        alt="{{ $product->title }}" style="width:100%;height:380px;object-fit:cover;border-radius:12px;">

                    {{-- Gallery --}}
                    @if ($product->gallery && count($product->gallery) > 0)
                        <div class="gallery-grid mt-3">
                            @foreach ($product->gallery as $img)
                                <img src="{{ Storage::url($img) }}" alt="{{ $product->title }}">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="main-content mt-4">
                    <h2 class="section-title">{{ $product->title }}</h2>
                    <p class="section-desc">{{ $product->description }}</p>

                    @if (!empty($product->meta['material']) || !empty($product->meta['origin']))
                        <div class="mt-3">
                            @if (!empty($product->meta['material']))
                                <div class="info-row">
                                    <i class="fa fa-tag"></i>
                                    <div>
                                        <div class="info-label">Material</div>
                                        <div class="info-value">{{ $product->meta['material'] }}</div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($product->meta['origin']))
                                <div class="info-row">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div>
                                        <div class="info-label">Origin</div>
                                        <div class="info-value">{{ $product->meta['origin'] }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-card">
                    <div class="tour-title-sidebar">{{ $product->title }}</div>

                    @if ($product->badge)
                        <span class="product-badge {{ strtolower($product->badge) }} mb-3 d-inline-block">
                            {{ $product->badge }}
                        </span>
                    @endif

                    @if ($product->short_description)
                        <p class="section-desc mb-3">{{ $product->short_description }}</p>
                    @endif

                    <div class="price-box">
                        <div class="price-label">Price</div>
                        <div class="d-flex align-items-baseline gap-2">
                            <div class="price-value">৳{{ number_format($product->price) }}</div>
                        </div>
                        <button class="btn-book mt-3">Buy Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
