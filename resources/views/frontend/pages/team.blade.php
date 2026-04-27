<!-- Team Section -->
<section class="team-section">
    <div class="container-fluid px-4">

        <h2 class="team-title">Our Team Members*</h2>
        <p class="team-desc">Empowering women across Bangladesh through safe travel, skill-building, secure stays, and
            inclusive growth programs — created by women, for women.</p>

        <!-- Swiper -->
        <div class="swiper team-swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&q=80"
                                alt="Farida Sultana">
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">Farida Sultana</h4>
                            <p class="team-role">Founder & Executive Director</p>
                            <span class="team-dept">Leadership</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Navigation -->
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
