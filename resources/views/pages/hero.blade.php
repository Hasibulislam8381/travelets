@php $hero = \App\Models\HeroSection::where('status', 'active')->latest()->first(); @endphp

@if($hero)
<section class="hero container-fluid overflow-hidden" style="padding-right: 0;padding-left: 0">
    <div class="row g-0 align-items-stretch" style="min-height: 600px;">

        <div class="hero-left col-md-6 d-flex flex-column justify-content-center p-5">
            <div class="hero-badge mb-3">{{ $hero->badge_text }}</div>

            <h1 class="hero-title display-4 fw-bold">{{ $hero->title }}</h1>
            <h2 class="hero-subtitle h2 text-muted mb-4">{{ $hero->subtitle }}</h2>

            <p class="hero-desc mb-4">{{ $hero->description }}</p>

            <div class="hero-cta d-flex gap-3 mb-5">
                <a href="{{ $hero->primary_btn_url }}" class="btn btn-primary px-4 py-2 custom_btn_primary_color">
                    {{ $hero->primary_btn_text }}
                </a>
                <a href="{{ $hero->secondary_btn_url }}" class="btn btn-outline-dark px-4 py-2 custom_btn_secondary_color">
                    {{ $hero->secondary_btn_text }}
                </a>
            </div>

            <div class="hero-stats d-flex flex-wrap gap-4 mt-auto">
                @if($hero->stat_1_value)
                    <div class="stat text-center">
                        <span class="stat-value d-block fw-bold h4 mb-0">{{ $hero->stat_1_value }}</span>
                        <span class="stat-label small">{{ $hero->stat_1_label }}</span>
                    </div>
                @endif
                @if($hero->stat_2_value)
                    <div class="stat text-center">
                        <span class="stat-value d-block fw-bold h4 mb-0">{{ $hero->stat_2_value }}</span>
                        <span class="stat-label small">{{ $hero->stat_2_label }}</span>
                    </div>
                @endif
                @if($hero->stat_3_value)
                    <div class="stat text-center">
                        <span class="stat-value d-block fw-bold h4 mb-0">{{ $hero->stat_3_value }}</span>
                        <span class="stat-label small">{{ $hero->stat_3_label }}</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="hero-right col-md-6 position-relative">
            <div class="hero-img-placeholder h-100">
                <img src="{{ $hero->banner_image ? Storage::url($hero->banner_image) : asset('frontend/images/banner/banner.png') }}"
                    alt="hero" class="hero-main-img" />
            </div>

            <div class="tour-cards-strip">
                <div class="custom-tour-card shadow">
                    <div class="card-top-badge">
                        <span class="star-icon">✦</span> Featured Tour
                    </div>
                    <div class="card-content d-flex align-items-center gap-3">
                        <div class="card-img-box">
                            <img src="{{ asset('frontend/images/banner/short_banner.png') }}" alt="Sundarban">
                        </div>
                        <div class="card-info-box">
                            <h3 class="tour-name">Sundarban Mangrove Safari, Khulna</h3>
                            <div class="tour-price">৳4,500</div>
                            <p class="tour-note small text-muted">(3-day package)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif