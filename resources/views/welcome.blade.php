<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Vromonkonna – Women Exploring Bangladesh & Beyond</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --cream: #faf6f0;
      --orange: #e85d04;
      --dark-orange: #c44e02;
      --brown: #1a0a00;
      --dark-bg: #120900;
      --dark-card: #1e0f03;
      --text-dark: #1a0a00;
      --text-muted: #6b5a4e;
      --gold: #c8860a;
      --white: #ffffff;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--cream);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    /* ===================== NAVBAR ===================== */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 48px;
      height: 64px;
      background: rgba(250,246,240,0.95);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid rgba(0,0,0,0.07);
    }

    .nav-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--orange);
      text-decoration: none;
    }

    .nav-logo img {
      height: 40px;
      width: auto;
    }

    .nav-logo-icon {
      width: 38px;
      height: 38px;
      background: var(--orange);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 36px;
      list-style: none;
    }

    .nav-links a {
      font-size: 14px;
      font-weight: 500;
      color: var(--text-dark);
      text-decoration: none;
      transition: color 0.2s;
      letter-spacing: 0.01em;
    }

    .nav-links a:hover { color: var(--orange); }

    .btn-book {
      background: var(--orange);
      color: white;
      border: none;
      padding: 10px 22px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s;
      text-decoration: none;
      font-family: 'DM Sans', sans-serif;
    }
    .btn-book:hover { background: var(--dark-orange); transform: translateY(-1px); }

    /* ===================== HERO ===================== */
    .hero {
      padding-top: 64px;
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      gap: 0;
    }

    .hero-left {
      padding: 80px 60px 80px 80px;
      animation: fadeInUp 0.8s ease both;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #fff7ed;
      border: 1px solid #fddcb5;
      padding: 6px 14px;
      border-radius: 100px;
      font-size: 12px;
      font-weight: 600;
      color: var(--orange);
      margin-bottom: 24px;
      letter-spacing: 0.03em;
    }

    .hero-badge::before {
      content: '✦';
      font-size: 10px;
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(42px, 5vw, 60px);
      font-weight: 900;
      line-height: 1.1;
      color: var(--orange);
      margin-bottom: 4px;
    }

    .hero-subtitle {
      font-family: 'Playfair Display', serif;
      font-size: clamp(36px, 4vw, 52px);
      font-weight: 700;
      font-style: italic;
      color: var(--text-dark);
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .globe-icon {
      display: inline-flex;
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, #2d6a4f, #40916c);
      border-radius: 50%;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .hero-desc {
      font-size: 15px;
      color: var(--text-muted);
      line-height: 1.7;
      max-width: 400px;
      margin-bottom: 36px;
    }

    .hero-cta {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: var(--orange);
      color: white;
      padding: 12px 28px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
      border: 2px solid var(--orange);
    }
    .btn-primary:hover { background: var(--dark-orange); border-color: var(--dark-orange); transform: translateY(-2px); }

    .btn-outline {
      background: transparent;
      color: var(--text-dark);
      padding: 12px 28px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      border: 2px solid #d4c4b8;
      transition: all 0.2s;
    }
    .btn-outline:hover { border-color: var(--orange); color: var(--orange); }

    /* Stats */
    .hero-stats {
      display: flex;
      gap: 32px;
      margin-top: 48px;
      padding-top: 32px;
      border-top: 1px solid #e8ddd5;
    }

    .stat {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .stat-value {
      font-family: 'Playfair Display', serif;
      font-size: 22px;
      font-weight: 900;
      color: var(--text-dark);
    }

    .stat-label {
      font-size: 11px;
      color: var(--text-muted);
      font-weight: 500;
      letter-spacing: 0.03em;
    }

    /* Hero Right */
    .hero-right {
      position: relative;
      height: 100vh;
      overflow: hidden;
      animation: fadeIn 1s ease 0.3s both;
    }

    .hero-main-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .hero-img-placeholder {
      width: 100%;
      height: 100%;
      background: linear-gradient(145deg, #2d6a4f 0%, #40916c 30%, #74c69d 60%, #a9d6e5 90%, #caf0f8 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .hero-img-placeholder::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse at 30% 70%, rgba(74,160,100,0.5) 0%, transparent 60%),
        radial-gradient(ellipse at 70% 30%, rgba(100,180,200,0.4) 0%, transparent 60%);
    }

    /* Floating tour cards */
    .tour-cards-strip {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      display: flex;
      gap: 8px;
      padding: 16px;
      background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
      overflow-x: auto;
    }

    .tour-card {
      flex-shrink: 0;
      width: 130px;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }

    .tour-card-img {
      width: 100%;
      height: 70px;
      object-fit: cover;
      background: linear-gradient(135deg, #2d6a4f, #74c69d);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .tour-card-info {
      padding: 8px;
    }

    .tour-card-badge {
      font-size: 8px;
      font-weight: 700;
      color: white;
      background: var(--orange);
      padding: 2px 6px;
      border-radius: 3px;
      margin-bottom: 4px;
      display: inline-block;
    }

    .tour-card-title {
      font-size: 10px;
      font-weight: 600;
      color: #222;
      line-height: 1.3;
      margin-bottom: 4px;
    }

    .tour-card-price {
      font-size: 11px;
      font-weight: 700;
      color: var(--orange);
    }

    /* Hero caption overlay */
    .hero-caption {
      position: absolute;
      bottom: 120px;
      left: 24px;
      right: 24px;
      color: white;
      font-size: 13px;
      font-weight: 500;
      text-shadow: 0 1px 4px rgba(0,0,0,0.5);
    }

    /* ===================== WHAT WE OFFER ===================== */
    .section-offer {
      padding: 80px 80px;
      background: var(--cream);
    }

    .section-label {
      font-size: 13px;
      font-weight: 700;
      color: var(--orange);
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .section-label::before {
      content: '✦';
      font-size: 10px;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(30px, 3.5vw, 44px);
      font-weight: 900;
      color: var(--text-dark);
      margin-bottom: 48px;
      line-height: 1.15;
    }

    .offer-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .offer-card {
      background: white;
      border-radius: 16px;
      padding: 32px;
      box-shadow: 0 2px 20px rgba(0,0,0,0.05);
      border: 1px solid #f0e8e0;
      transition: all 0.3s;
    }

    .offer-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 40px rgba(232,93,4,0.12);
      border-color: #fddcb5;
    }

    .offer-icon {
      width: 52px;
      height: 52px;
      border-radius: 12px;
      background: #fff7ed;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .offer-title {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 10px;
    }

    .offer-desc {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.65;
    }

    /* ===================== POPULAR TOURS ===================== */
    .section-tours {
      padding: 60px 80px;
      background: #fff8f4;
    }

    .tours-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 36px;
    }

    .tour-big-card {
      background: white;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
      border: 1px solid #f0e8e0;
      transition: all 0.3s;
    }

    .tour-big-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 36px rgba(232,93,4,0.1);
    }

    .tour-big-img {
      width: 100%;
      height: 160px;
      background: linear-gradient(135deg, #2d6a4f, #52b788);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 40px;
      position: relative;
    }

    .tour-type-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background: var(--orange);
      color: white;
      font-size: 10px;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 4px;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .tour-big-info {
      padding: 16px;
    }

    .tour-big-title {
      font-size: 13px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 4px;
      line-height: 1.4;
    }

    .tour-big-location {
      font-size: 11px;
      color: var(--text-muted);
      margin-bottom: 10px;
    }

    .tour-big-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .tour-big-price {
      font-size: 15px;
      font-weight: 700;
      color: var(--orange);
    }

    .tour-big-rating {
      font-size: 11px;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      gap: 3px;
    }

    /* ===================== NEWSLETTER / FOOTER ===================== */
    .newsletter-section {
      background: linear-gradient(135deg, #1a0a00 0%, #2d1200 100%);
      padding: 60px 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
    }

    .newsletter-text h3 {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-weight: 700;
      color: white;
      line-height: 1.3;
      max-width: 320px;
    }

    .newsletter-form {
      display: flex;
      gap: 12px;
      flex: 1;
      max-width: 500px;
    }

    .newsletter-input {
      flex: 1;
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 8px;
      padding: 12px 18px;
      font-size: 14px;
      color: white;
      font-family: 'DM Sans', sans-serif;
      outline: none;
      transition: border-color 0.2s;
    }

    .newsletter-input::placeholder { color: rgba(255,255,255,0.4); }
    .newsletter-input:focus { border-color: var(--orange); }

    .newsletter-btn {
      background: white;
      color: var(--text-dark);
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 700;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      transition: all 0.2s;
      white-space: nowrap;
    }
    .newsletter-btn:hover { background: #f0e8e0; }

    /* ===================== FOOTER ===================== */
    footer {
      background: #0d0600;
      padding: 60px 80px 32px;
      color: rgba(255,255,255,0.7);
    }

    .footer-top {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
      gap: 48px;
      padding-bottom: 48px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .footer-brand {}

    .footer-logo-name {
      font-family: 'Playfair Display', serif;
      font-size: 28px;
      font-style: italic;
      font-weight: 700;
      color: white;
      margin-bottom: 16px;
    }

    .footer-tagline {
      font-size: 13px;
      line-height: 1.7;
      color: rgba(255,255,255,0.55);
      max-width: 220px;
      margin-bottom: 24px;
    }

    .footer-socials {
      display: flex;
      gap: 10px;
    }

    .social-btn {
      width: 34px;
      height: 34px;
      border-radius: 8px;
      background: rgba(255,255,255,0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 14px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .social-btn:hover { background: var(--orange); }

    .footer-col-title {
      font-size: 14px;
      font-weight: 700;
      color: white;
      margin-bottom: 20px;
      letter-spacing: 0.02em;
    }

    .footer-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .footer-links a {
      font-size: 13px;
      color: rgba(255,255,255,0.5);
      text-decoration: none;
      transition: color 0.2s;
    }
    .footer-links a:hover { color: var(--orange); }

    .footer-address {
      font-size: 13px;
      color: rgba(255,255,255,0.5);
      line-height: 1.7;
    }

    .footer-address a {
      color: rgba(255,255,255,0.6);
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
      transition: color 0.2s;
    }
    .footer-address a:hover { color: var(--orange); }

    .footer-bottom {
      padding-top: 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 12px;
      color: rgba(255,255,255,0.3);
    }

    .footer-bottom-links {
      display: flex;
      gap: 24px;
    }

    .footer-bottom-links a {
      color: rgba(255,255,255,0.35);
      text-decoration: none;
      transition: color 0.2s;
    }
    .footer-bottom-links a:hover { color: white; }

    /* ===================== ANIMATIONS ===================== */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 1024px) {
      nav { padding: 0 24px; }
      .hero { grid-template-columns: 1fr; min-height: auto; }
      .hero-right { height: 50vh; }
      .hero-left { padding: 60px 32px; }
      .offer-grid { grid-template-columns: 1fr 1fr; }
      .tours-grid { grid-template-columns: 1fr 1fr; }
      .footer-top { grid-template-columns: 1fr 1fr; }
      .section-offer, .section-tours { padding: 60px 32px; }
      .newsletter-section { padding: 48px 32px; flex-direction: column; }
      footer { padding: 48px 32px 24px; }
    }

    @media (max-width: 640px) {
      nav { padding: 0 16px; }
      .nav-links { display: none; }
      .hero-left { padding: 48px 20px; }
      .hero-stats { flex-wrap: wrap; gap: 20px; }
      .offer-grid { grid-template-columns: 1fr; }
      .tours-grid { grid-template-columns: 1fr; }
      .footer-top { grid-template-columns: 1fr; }
      .section-offer, .section-tours { padding: 48px 20px; }
      newsletter-section { padding: 40px 20px; }
      footer { padding: 40px 20px 20px; }
      .newsletter-form { flex-direction: column; }
    }
  </style>
</head>
<body>

  <!-- ===================== NAVBAR ===================== -->
  <nav>
    <a href="#" class="nav-logo">
      <div class="nav-logo-icon">🌿</div>
      Vromonkonna
    </a>

    <ul class="nav-links">
      <li><a href="#travel">Travel</a></li>
      <li><a href="#training">Training</a></li>
      <li><a href="#dormitory">Dormitory</a></li>
      <li><a href="#social">Social Act</a></li>
      <li><a href="#souvenirs">Souvenirs</a></li>
      <li><a href="#about">About</a></li>
    </ul>

    <a href="#book" class="btn-book">Book Now</a>
  </nav>

  <!-- ===================== HERO ===================== -->
  <section class="hero">
    <div class="hero-left">
      <div class="hero-badge">Women Exploring Bangladesh &amp; Beyond</div>

      <h1 class="hero-title">Explore Fearlessly.</h1>
      <h2 class="hero-subtitle">
        Thrive <span class="globe-icon">🌍</span> Together.
      </h2>

      <p class="hero-desc">
        A comprehensive women's platform redefining safety, growth, and opportunity in Bangladesh — from travel to training and secure living. By women, for women.
      </p>

      <div class="hero-cta">
        <a href="#offer" class="btn-primary">Explore Services</a>
        <a href="#book" class="btn-outline">Book Now</a>
      </div>

      <div class="hero-stats">
        <div class="stat">
          <span class="stat-value">4,800+</span>
          <span class="stat-label">Women Served</span>
        </div>
        <div class="stat">
          <span class="stat-value">42+</span>
          <span class="stat-label">Destinations</span>
        </div>
        <div class="stat">
          <span class="stat-value">14+</span>
          <span class="stat-label">Skill Programs</span>
        </div>
        <div class="stat">
          <span class="stat-value">2013</span>
          <span class="stat-label">Est. Dhaka, BD</span>
        </div>
      </div>
    </div>

    <!-- Hero Right: image + tour cards -->
    <div class="hero-right">
      <div class="hero-img-placeholder">
        <!-- Replace src with real image -->
        <div style="position:absolute;inset:0;background:linear-gradient(145deg,#1b4332,#2d6a4f 30%,#52b788 60%,#95d5b2 80%,#b7e4c7);"></div>
        <!-- Mountain silhouette SVG decoration -->
        <svg style="position:absolute;bottom:100px;left:0;right:0;width:100%;" viewBox="0 0 800 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0,200 L0,120 L100,60 L200,100 L300,40 L400,80 L500,20 L600,70 L700,30 L800,60 L800,200 Z" fill="rgba(45,106,79,0.6)"/>
          <path d="M0,200 L0,150 L80,110 L180,130 L280,90 L380,120 L480,70 L560,110 L660,80 L760,100 L800,90 L800,200 Z" fill="rgba(27,67,50,0.7)"/>
        </svg>
        <div style="position:absolute;bottom:110px;left:0;right:0;text-align:center;color:white;font-size:14px;font-weight:500;text-shadow:0 1px 4px rgba(0,0,0,0.5);">
          Plan. Book. Travel. Create memories with ease.
        </div>
      </div>

      <!-- Tour cards strip -->
      <div class="tour-cards-strip">
        <div class="tour-card">
          <div class="tour-card-img" style="background:linear-gradient(135deg,#155d27,#40916c);">🌿</div>
          <div class="tour-card-info">
            <div class="tour-card-badge">Featured</div>
            <div class="tour-card-title">Sundarban Mangrove Safari, Khulna</div>
            <div class="tour-card-price">৳4,500</div>
          </div>
        </div>
        <div class="tour-card">
          <div class="tour-card-img" style="background:linear-gradient(135deg,#1b4332,#52b788);">🐅</div>
          <div class="tour-card-info">
            <div class="tour-card-badge">Popular</div>
            <div class="tour-card-title">Sundarban Mangrove Safari, Khulna</div>
            <div class="tour-card-price">৳4,500</div>
          </div>
        </div>
        <div class="tour-card">
          <div class="tour-card-img" style="background:linear-gradient(135deg,#2d6a4f,#74c69d);">🚢</div>
          <div class="tour-card-info">
            <div class="tour-card-badge">Adventure</div>
            <div class="tour-card-title">Sundarban Mangrove Safari, Khulna</div>
            <div class="tour-card-price">৳4,500</div>
          </div>
        </div>
        <div class="tour-card">
          <div class="tour-card-img" style="background:linear-gradient(135deg,#081c15,#1b4332);">🌅</div>
          <div class="tour-card-info">
            <div class="tour-card-badge">New</div>
            <div class="tour-card-title">Sundarban Mangrove Safari, Khulna</div>
            <div class="tour-card-price">৳4,500</div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ===================== FOOTER ===================== -->
  <footer>
    <div class="footer-top">
      <!-- Brand -->
      <div class="footer-brand">
        <div class="footer-logo-name">Vromonkonna</div>
        <p class="footer-tagline">
          The Organization, since its inception, has been working for institution building of the poor with special emphasis on distressed women, girls and disadvantaged children.
        </p>
        <div class="footer-socials">
          <a href="#" class="social-btn">f</a>
          <a href="#" class="social-btn">in</a>
          <a href="#" class="social-btn">📷</a>
          <a href="#" class="social-btn">🐦</a>
        </div>
      </div>

      <!-- Travels -->
      <div>
        <div class="footer-col-title">Travels</div>
        <ul class="footer-links">
          <li><a href="#">Bangladesh tour</a></li>
          <li><a href="#">Bangladesh tour</a></li>
          <li><a href="#">Bangladesh tour</a></li>
          <li><a href="#">Bangladesh tour</a></li>
          <li><a href="#">Bangladesh tour</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div>
        <div class="footer-col-title">Services</div>
        <ul class="footer-links">
          <li><a href="#">Skill Training</a></li>
          <li><a href="#">Cycle Train</a></li>
          <li><a href="#">Social Programs</a></li>
          <li><a href="#">Dormitory</a></li>
        </ul>
      </div>

      <!-- Organisation -->
      <div>
        <div class="footer-col-title">Organisation</div>
        <ul class="footer-links">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Our Team</a></li>
          <li><a href="#">Souvenirs</a></li>
          <li><a href="#">Awwwards</a></li>
          <li><a href="#">Women's Tour</a></li>
          <li><a href="#">Bangladesh tour</a></li>
        </ul>
      </div>

      <!-- Address -->
      <div>
        <div class="footer-col-title">Address</div>
        <div class="footer-address">
          <a href="tel:+8801925739100">+88801925739100</a>
          <a href="mailto:vromon@gmail.com">vromon@gmail.com</a>
          <p>Level 4, Techdyno BD LTD,<br>Haq's Plaza, 4th Floor, 26<br>Kemal Ataturk Ave, Dhaka 1213</p>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© 2023 Maxwell Inc.</span>
      <div class="footer-bottom-links">
        <a href="#">Terms of Service</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Cookies</a>
      </div>
    </div>
  </footer>

  <script>
    // Smooth scroll for nav links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });

    // Scroll-based navbar shadow
    window.addEventListener('scroll', () => {
      const nav = document.querySelector('nav');
      if (window.scrollY > 10) {
        nav.style.boxShadow = '0 4px 24px rgba(0,0,0,0.08)';
      } else {
        nav.style.boxShadow = 'none';
      }
    });
  </script>
</body>
</html>