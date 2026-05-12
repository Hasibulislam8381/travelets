@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container-fluid px-0">
        <div class="row g-0">

            <!-- Left: Hero + Content -->
            <div class="col-lg-8">

                <!-- Hero Slider -->
                <div class="tour-hero">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=900&q=80" alt="Tour"
                        id="heroImg">
                    <div class="hero-overlay"></div>
                    <button class="slider-btn prev" onclick="changeSlide(-1)"><i class="fa fa-chevron-left"></i></button>
                    <button class="slider-btn next" onclick="changeSlide(1)"><i class="fa fa-chevron-right"></i></button>
                    <div class="hero-badges">
                        <div class="hero-badge-item"><i class="fa fa-image"></i> Preferably a self-guide</div>
                        <div class="hero-badge-item"><i class="fa fa-leaf"></i> Eco-designed program</div>
                        <div class="hero-badge-item"><i class="fa fa-user"></i> Fully local guides</div>
                        <div class="hero-badge-item"><i class="fa fa-map"></i> Another transport stop</div>
                    </div>
                </div>

                <div class="p-3 p-lg-4">

                    <!-- Description -->
                    <div class="main-content">
                        <h2 class="section-title">Experience the Wild Beauty of Sundarban</h2>
                        <p class="section-desc">
                            Explore the world's largest mangrove forest in a safe, guided, women-only environment. This
                            journey liberates adventurous bound connections, and personal growth designed not only to
                            build confidence but to equip explorers for months of gazing Bangladesh's forests, wetlands,
                            wildlife and communities.
                        </p>
                        <p class="section-desc mt-3">
                            This journey become adventure to cultural icon seekers and personal growth — designed to
                            help you break out from my own horizons. Explore the world's largest mangrove forest in a
                            safe, guided, women-only environment. This journey liberates adventurous bound connections,
                            and personal growth designed to help you thrive community and femininity.
                        </p>
                    </div>

                    <!-- Included / Excluded -->
                    <div class="main-content">
                        <div class="inc-exc-grid">
                            <div>
                                <div class="inc-title">Included</div>
                                <ul class="inc-list">
                                    <li><i class="fa fa-check-circle"></i> All breakfasts, 10 dinners and 8 lunches</li>
                                    <li><i class="fa fa-check-circle"></i> Private or minibus transport throughout
                                        Bangladesh</li>
                                    <li><i class="fa fa-check-circle"></i> 8 business days in Khulna and 3 hrs in
                                        Bangladesh</li>
                                    <li><i class="fa fa-check-circle"></i> All entrance fees mentioned in the itinerary
                                    </li>
                                    <li><i class="fa fa-check-circle"></i> Sunset at Sundarban</li>
                                    <li><i class="fa fa-check-circle"></i> Sunset at Sundarban accommodation</li>
                                    <li><i class="fa fa-check-circle"></i> 5 nights of accommodation</li>
                                </ul>
                            </div>
                            <div>
                                <div class="exc-title">Excluded</div>
                                <ul class="exc-list">
                                    <li><i class="fa fa-times-circle"></i> Any local expenses</li>
                                    <li><i class="fa fa-times-circle"></i> Any optional tour</li>
                                    <li><i class="fa fa-times-circle"></i> Tips and gratuities (5% is by person)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Itinerary -->
                    <div class="main-content">
                        <h2 class="section-title">Itinerary</h2>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 01</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body open">
                                <p>Fly to Jessore from Dhaka Airport. Our responsible guide will start our journey in
                                    Bagerhat. Visit the Mahmud Bibi Dome Mosque which is one of the UNESCO world
                                    heritage sites in Bangladesh. Visit the Dome of Nine pillars etc, who built more
                                    than a dozen mosques in Bagerhat including the Sixty Dome Mosque, Nine Dome Mosque,
                                    Dragon Mosque, and Aqda Masjid who are also on our bucket list. We will check into
                                    the Hotel Mamul in Mongla. Have lunch and wait for a while to visit the nearby tree
                                    park and the bazaars. Dinner and the overnight stay in Mongla.</p>
                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&q=70"
                                    alt="Day 1">
                            </div>
                        </div>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 02</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body"></div>
                        </div>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 03</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body"></div>
                        </div>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 04</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body"></div>
                        </div>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 05</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body"></div>
                        </div>

                        <div class="itinerary-item">
                            <div class="itinerary-header" onclick="toggleItinerary(this)">
                                <div><span class="day-badge">Day 06</span> Historic Mosque city of Bagerhat & Mongla
                                </div>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="itinerary-body"></div>
                        </div>
                    </div>

                    <!-- Gallery -->
                    <div class="main-content">
                        <div class="gallery-grid">
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&q=70"
                                alt="">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=70"
                                alt="">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&q=70"
                                alt="">
                            <img src="https://images.unsplash.com/photo-1547036967-23d11aacaee0?w=400&q=70" alt="">
                            <img src="https://images.unsplash.com/photo-1474631245212-32dc3c8310c6?w=400&q=70"
                                alt="">
                            <img src="https://images.unsplash.com/photo-1504432842672-1a79f78e4084?w=400&q=70"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="col-lg-4 p-3 p-lg-4">
                <div class="sidebar-card">
                    <div class="tour-title-sidebar">Sundarban Mangrove Safari</div>
                    <div class="tour-location-sidebar"><i class="fa fa-map-marker-alt"></i> Khulna, Bangladesh</div>

                    <div class="info-row">
                        <i class="fa fa-calendar"></i>
                        <div>
                            <div class="info-label">Group Size / Nights</div>
                            <div class="info-value">8 Days / 7 Nights</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <i class="fa fa-users"></i>
                        <div>
                            <div class="info-label">Availability</div>
                            <div class="info-value">Jan 8 - Jan 28, 2026</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <i class="fa fa-route"></i>
                        <div>
                            <div class="info-label">Route Included</div>
                            <div class="info-value">12 stops included</div>
                        </div>
                    </div>

                    <ul class="includes-list mt-2">
                        <li><i class="fa fa-check"></i> Transport Included</li>
                        <li><i class="fa fa-check"></i> Meals Included</li>
                        <li><i class="fa fa-check"></i> Wine Included</li>
                        <li><i class="fa fa-check"></i> Safe & No Bed</li>
                    </ul>

                    <div class="price-box">
                        <div class="price-label">Starting from</div>
                        <div class="d-flex align-items-baseline gap-2">
                            <div class="price-value">৳4,500</div>
                            <div class="price-per">/ per-person</div>
                        </div>
                        <select class="select-persons">
                            <option>Select person</option>
                            <option>1 Person</option>
                            <option>2 Persons</option>
                            <option>3 Persons</option>
                            <option>4 Persons</option>
                            <option>5+ Persons</option>
                        </select>
                        <button class="btn-book">Book Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        const slides = [
            'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=900&q=80',
            'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=900&q=80',
            'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=900&q=80',
        ];
        let current = 0;

        function changeSlide(dir) {
            current = (current + dir + slides.length) % slides.length;
            document.getElementById('heroImg').src = slides[current];
        }

        function toggleItinerary(header) {
            const body = header.nextElementSibling;
            const icon = header.querySelector('i');
            body.classList.toggle('open');
            icon.style.transform = body.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0)';
        }
    </script>
@endsection
