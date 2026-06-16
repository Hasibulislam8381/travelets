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
            <p class="product-desc">{{ $souvenir->short_adescription }}</p>
            <div class="product-footer">
                <span class="product-price">৳{{ number_format($souvenir->price) }}</span>
                <a href="{{ route('tour-detail', $souvenir->slug) }}" class="buy-btn">Buy
                    Now</a>
            </div>
        </div>
    </div>
</div>
