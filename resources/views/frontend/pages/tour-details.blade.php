<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --orange: #e85d04;
            --dark-orange: #c44e02;
            --cream: #faf6f0;
            --text-dark: #1a0a00;
            --text-muted: #6b5a4e;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f8f8;
            color: var(--text-dark);
        }

        /* Hero Slider */
        .tour-hero {
            position: relative;
            height: 420px;
            overflow: hidden;
        }

        .tour-hero img {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5) 0%, transparent 60%);
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.85);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            font-size: 14px;
            cursor: pointer;
            z-index: 10;
        }

        .slider-btn.prev {
            left: 16px;
        }

        .slider-btn.next {
            right: 16px;
        }

        .hero-badges {
            position: absolute;
            bottom: 16px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 12px;
            z-index: 10;
        }

        .hero-badge-item {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .hero-badge-item i {
            color: var(--orange);
        }

        /* Sidebar Card */
        .sidebar-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            padding: 20px;
            position: sticky;
            top: 80px;
        }

        .tour-title-sidebar {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .tour-location-sidebar {
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 16px;
        }

        .tour-location-sidebar i {
            color: var(--orange);
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            border-bottom: 1px solid #f0ebe5;
            font-size: 13px;
        }

        .info-row:last-of-type {
            border-bottom: none;
        }

        .info-row i {
            color: var(--orange);
            width: 16px;
        }

        .info-label {
            color: var(--text-muted);
            font-size: 12px;
        }

        .info-value {
            font-weight: 600;
            font-size: 13px;
        }

        .includes-list {
            list-style: none;
            padding: 0;
            margin: 12px 0;
        }

        .includes-list li {
            font-size: 12px;
            padding: 4px 0;
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
        }

        .includes-list li i {
            color: #2d8a4e;
            font-size: 11px;
        }

        .price-box {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #f0ebe5;
        }

        .price-label {
            font-size: 11px;
            color: var(--text-muted);
        }

        .price-value {
            font-size: 28px;
            font-weight: 900;
            color: var(--orange);
        }

        .price-per {
            font-size: 12px;
            color: var(--text-muted);
        }

        .btn-book {
            background: var(--orange);
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            margin-top: 12px;
            transition: background 0.2s;
        }

        .btn-book:hover {
            background: var(--dark-orange);
            color: white;
        }

        .select-persons {
            width: 100%;
            border: 1px solid #e0d8d0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            margin-top: 10px;
            outline: none;
        }

        .select-persons:focus {
            border-color: var(--orange);
        }

        /* Main Content */
        .main-content {
            background: white;
            border-radius: 12px;
            padding: 32px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .section-desc {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.8;
        }

        /* Included / Excluded */
        .inc-exc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .inc-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .exc-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #c0392b;
        }

        .inc-list,
        .exc-list {
            list-style: none;
            padding: 0;
        }

        .inc-list li,
        .exc-list li {
            font-size: 13px;
            color: var(--text-muted);
            padding: 5px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            line-height: 1.5;
        }

        .inc-list li i {
            color: #2d8a4e;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .exc-list li i {
            color: #c0392b;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Itinerary */
        .itinerary-item {
            border: 1px solid #f0ebe5;
            border-radius: 10px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .itinerary-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            cursor: pointer;
            background: white;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            transition: background 0.2s;
        }

        .itinerary-header:hover {
            background: #fff7ed;
        }

        .itinerary-header .day-badge {
            background: var(--orange);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            margin-right: 10px;
        }

        .itinerary-body {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s;
        }

        .itinerary-body.open {
            max-height: 500px;
            padding: 16px 18px;
        }

        .itinerary-body p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.8;
            margin: 0;
        }

        .itinerary-body img {
            width: 100%;
            border-radius: 8px;
            margin-top: 12px;
            object-fit: cover;
            height: 160px;
        }

        /* Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .gallery-grid img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .tour-hero {
                height: 260px;
            }

            .tour-hero img {
                height: 260px;
            }

            .inc-exc-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid px-0">
        <div class="row g-0">

            <!-- Left: Hero + Content -->
            <div class="col-lg-8">

                <!-- Hero Slider -->
                <div class="tour-hero">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=900&q=80" alt="Tour"
                        id="heroImg">
                    <div class="hero-overlay"></div>
                    <button class="slider-btn prev" onclick="changeSlide(-1)"><i
                            class="fa fa-chevron-left"></i></button>
                    <button class="slider-btn next" onclick="changeSlide(1)"><i
                            class="fa fa-chevron-right"></i></button>
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
                            <img src="https://images.unsplash.com/photo-1547036967-23d11aacaee0?w=400&q=70"
                                alt="">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>

</html>
