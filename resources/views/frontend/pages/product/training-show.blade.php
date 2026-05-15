@extends('frontend.layouts.app')
@section('title', $product->title)
@section('content')
    <div class="container-fluid px-4 py-5">
        <div class="row g-4">

            <div class="col-lg-8">
                <div class="main-content">
                    <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : 'https://images.unsplash.com/photo-1541625602330-2277a4c46182?w=800&q=80' }}"
                        alt="{{ $product->title }}" style="width:100%;height:380px;object-fit:cover;border-radius:12px;">

                    @if (!empty($product->meta['satisfied_count']))
                        <div class="satisfied-badge mt-2">
                            {{ $product->meta['satisfied_count'] }}+ Satisfied People
                        </div>
                    @endif
                </div>

                <div class="main-content mt-4">
                    <h2 class="section-title">{{ $product->title }}</h2>
                    <p class="section-desc">{{ $product->description }}</p>

                    <div class="detail-meta mt-4">
                        @if (!empty($product->meta['sessions']))
                            <div class="meta-group">
                                <label>Available Sessions</label>
                                <div class="meta-tags">
                                    @foreach ($product->meta['sessions'] as $session)
                                        <span class="meta-tag">+ {{ $session }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($product->meta['levels']))
                            <div class="meta-group mt-3">
                                <label>Levels Offered</label>
                                <div class="meta-tags">
                                    @foreach ($product->meta['levels'] as $level)
                                        <span class="level-tag">
                                            <span class="level-dot"></span> {{ $level }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

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

            <div class="col-lg-4">
                <div class="sidebar-card">
                    <div class="tour-title-sidebar">{{ $product->title }}</div>
                    @if ($product->location)
                        <div class="tour-location-sidebar">
                            <i class="fa fa-map-marker-alt"></i> {{ $product->location }}
                        </div>
                    @endif

                    <div class="price-box">
                        <div class="price-label">Monthly Fee</div>
                        <div class="d-flex align-items-baseline gap-2">
                            <div class="price-value">৳{{ number_format($product->price) }}</div>
                            <div class="price-per">/ monthly</div>
                        </div>
                        <button class="btn-book mt-3">Register Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
