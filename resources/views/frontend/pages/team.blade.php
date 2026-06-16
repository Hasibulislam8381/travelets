<!-- Team Section -->
@php
    $teamMembers = \App\Models\TeamMember::where('status', 'active')->orderBy('order')->get();
@endphp

<section class="team-section">
    <div class="container-fluid px-4">
        <h2 class="team-title">Our Team Members*</h2>
        <p class="team-desc">Empowering women across Bangladesh through safe travel, skill-building, secure stays, and
            inclusive growth programs — created by women, for women.</p>

        <div class="swiper team-swiper">
            <div class="swiper-wrapper">
                @foreach ($teamMembers as $member)
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="team-img-wrap">
                                <img src="{{ $member->image ? Storage::url($member->image) : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80' }}"
                                    alt="{{ $member->name }}">
                            </div>
                            <div class="team-body">
                                <h4 class="team-name">{{ $member->name }}</h4>
                                <p class="team-role">{{ $member->role }}</p>
                                @if ($member->department)
                                    <span class="team-dept">{{ $member->department }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="team-nav">
            <div class="swiper-btn team-prev">
                <svg viewBox="0 0 14 14" fill="none">
                    <path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="swiper-pagination team-pagination"></div>
            <div class="swiper-btn team-next">
                <svg viewBox="0 0 14 14" fill="none">
                    <path d="M5 2l5 5-5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        new Swiper('.team-swiper', {
            slidesPerView: 1.2,
            spaceBetween: 14,
            navigation: {
                nextEl: '.team-next',
                prevEl: '.team-prev',
            },
            pagination: {
                el: '.team-pagination',
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2.2
                },
                768: {
                    slidesPerView: 3.2
                },
                992: {
                    slidesPerView: 4.2
                },
                1200: {
                    slidesPerView: 5
                },
            }
        });
    </script>
@endpush
