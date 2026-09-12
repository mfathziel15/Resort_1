<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#111111">
  <meta name="description" content="AURA — The Sanctuary. Resort, cafe and mountain retreat in Caringin, West Java.">
  <title>AURA — The Sanctuary</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="noise" aria-hidden="true"></div>

  <!-- Preloader -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader-top">
      <span>AURA.</span>
      <span>THE SANCTUARY</span>
    </div>
    <div class="preloader-center">
      <span class="preloader-label">Entering stillness</span>
      <span class="preloader-count" id="loaderCount">00</span>
    </div>
    <div class="loader-line"><span id="loaderBar"></span></div>
    <div class="preloader-bottom">
      <span>EST. 2026</span>
      <span>CARINGIN / WEST JAVA</span>
    </div>
  </div>

  <!-- Cursor -->
  <div class="cursor" id="cursor" aria-hidden="true">
    <span class="cursor-text">VIEW</span>
  </div>

  <!-- Header -->
  <header class="site-header" id="siteHeader">
    <a class="logo magnetic" href="#home" data-cursor="HOME">AURA.</a>

    <button class="menu-toggle magnetic" id="openMenu" type="button" aria-label="Buka menu" aria-expanded="false">
      <span class="menu-dot"></span>
      <span>Menu</span>
    </button>
  </header>

  <!-- Fullscreen menu -->
  <div class="menu-overlay" id="menuOverlay" aria-hidden="true">
    <div class="menu-noise" aria-hidden="true"></div>

    <div class="menu-head">
      <span>AURA.</span>
      <button class="menu-close magnetic" id="closeMenu" type="button">Tutup [ESC]</button>
    </div>

    <div class="menu-content">
      <nav class="menu-links" aria-label="Navigasi utama">
        <a href="#home" class="menu-item" data-preview="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=900&q=80">
          <span>01</span><strong>Beranda</strong>
        </a>
        <a href="#accommodation" class="menu-item" data-preview="https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=900&q=80">
          <span>02</span><strong>Akomodasi</strong>
        </a>
        <a href="#experience" class="menu-item" data-preview="https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=900&q=80">
          <span>03</span><strong>Pengalaman</strong>
        </a>
        <a href="#kafe" class="menu-item" data-preview="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=900&q=80">
          <span>04</span><strong>Gastronomi</strong>
        </a>
        <a href="#reservation" class="menu-item" data-preview="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=900&q=80">
          <span>05</span><strong>Reservasi</strong>
        </a>
      </nav>

      <div class="menu-preview" id="menuPreview">
        <img src="" alt="" id="menuPreviewImage">
      </div>
    </div>

    <div class="menu-foot">
      <span>Sanctuary / 06°42' S</span>
      <span>Slow down.</span>
    </div>
  </div>

  <main>
    <!-- Hero -->
    <section class="hero" id="home">
      <div class="hero-image-wrap">
        <img class="hero-image" src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=85" alt="Pegunungan dan kabut di pagi hari">
        <div class="hero-image-overlay"></div>
      </div>

      <div class="hero-inner">
        <div class="eyebrow hero-eyebrow">
          <span>Resort & Cafe</span>
          <span>Est. 2026</span>
        </div>

        <div class="hero-title">
          <div class="line"><h1>Ketenangan</h1></div>
          <div class="line"><h1 class="italic indent">yang hakiki.</h1></div>
        </div>

        <div class="hero-bottom">
          <p>01 — Arrival</p>
          <span class="scroll-cue"><i></i> Gulir perlahan</span>
          <p>Caringin / West Java</p>
        </div>
      </div>
    </section>

    <!-- Manifesto -->
    <section class="manifesto section-dark">
      <div class="section-index">02 / Manifesto</div>
      <div class="manifesto-copy">
        <p class="eyebrow">A different kind of luxury</p>
        <h2>
          Kemewahan<br>
          bukan tentang <em>lebih.</em>
        </h2>
        <p class="manifesto-end">Tentang memiliki ruang untuk bernapas.</p>
      </div>
    </section>

    <!-- Intro -->
    <section class="intro section-light">
      <div class="section-index">03 / The place</div>
      <div class="intro-grid">
        <div class="image-frame intro-image reveal">
          <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1500&q=85" alt="Interior resort dengan cahaya alami" loading="lazy">
          <span class="image-index">A / 01</span>
        </div>

        <div class="intro-copy reveal">
          <p class="eyebrow">Arrival</p>
          <h2>Sebuah tempat untuk <em>melambat.</em></h2>
          <p class="body-copy">AURA menggabungkan arsitektur kontemporer, kehangatan alam, dan ritme pegunungan menjadi ruang bernaung yang terasa jauh dari hiruk-pikuk.</p>
          <a href="#accommodation" class="text-link magnetic" data-cursor="EXPLORE">Jelajahi akomodasi <span>↗</span></a>
        </div>
      </div>
    </section>

    <!-- Horizontal experience -->
    <section class="experience" id="experience">
      <div class="experience-track">
        <div class="experience-intro panel">
          <span class="eyebrow">04 / Experiences</span>
          <h2>Dunia kecil<br>untuk <em>berhenti.</em></h2>
          <p>Empat cara untuk menikmati waktu tanpa terburu-buru.</p>
          <span class="drag-note">Scroll ↓</span>
        </div>

        <article class="experience-card panel">
          <div class="experience-image">
            <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=1500&q=85" alt="Suite AURA" loading="lazy">
          </div>
          <div class="card-meta"><span>01</span><span>Stay</span></div>
          <h3>Ruang untuk<br><em>bernapas.</em></h3>
        </article>

        <article class="experience-card panel">
          <div class="experience-image">
            <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1500&q=85" alt="Kolam dan area resort" loading="lazy">
          </div>
          <div class="card-meta"><span>02</span><span>Restore</span></div>
          <h3>Pagi yang<br><em>lebih lambat.</em></h3>
        </article>

        <article class="experience-card panel">
          <div class="experience-image">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1500&q=85" alt="Kafe AURA" loading="lazy">
          </div>
          <div class="card-meta"><span>03</span><span>Taste</span></div>
          <h3>Kisah di<br><em>setiap rasa.</em></h3>
        </article>

        <article class="experience-card panel">
          <div class="experience-image">
            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1500&q=85" alt="Pemandangan alam pegunungan" loading="lazy">
          </div>
          <div class="card-meta"><span>04</span><span>Nature</span></div>
          <h3>Di antara<br><em>kabut dan sunyi.</em></h3>
        </article>
      </div>
    </section>

    <!-- Accommodation -->
    <section class="accommodation section-light" id="accommodation">
      <div class="section-index">05 / Accommodation</div>
      <div class="accommodation-head reveal">
        <p class="eyebrow">The rooms</p>
        <h2>Tempat untuk<br><em>pulang.</em></h2>
      </div>

      <div class="room-feature">
        <div class="room-image image-frame reveal">
          <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1900&q=85" alt="Kamar suite dengan jendela besar" loading="lazy">
          <span class="image-index">ROOM / 01</span>
        </div>

        <div class="room-info reveal">
          <div>
            <span class="room-number">01</span>
            <h3>The Sanctuary Suite</h3>
            <p class="body-copy">Jendela lebar, material alami, dan pemandangan yang membiarkan pagi masuk perlahan.</p>
          </div>
          <div class="room-details">
            <span>Mountain view</span>
            <span>Private terrace</span>
            <span>Breakfast included</span>
          </div>
          <a href="#reservation" class="round-link magnetic" data-cursor="BOOK">Reservasi <span>↗</span></a>
        </div>
      </div>
    </section>

    <!-- Gastronomy -->
    <section class="gastronomy section-dark" id="kafe">
      <div class="section-index">06 / Gastronomy</div>
      <div class="gastro-grid">
        <div class="gastro-copy reveal">
          <p class="eyebrow">Elji Cafe</p>
          <h2>Kisah<br><em>rasa.</em></h2>
          <p class="body-copy">Bahan lokal terbaik bertemu pendekatan gastronomi global. Sederhana, hangat, dan dibuat untuk dinikmati perlahan.</p>
          <a href="#reservation" class="text-link light magnetic" data-cursor="TASTE">Lihat pengalaman <span>↗</span></a>
        </div>
        <div class="gastro-image image-frame reveal">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1800&q=85" alt="Interior Elji Cafe" loading="lazy">
          <span class="image-index">ELJI / 06</span>
        </div>
      </div>
    </section>

    <!-- Nature -->
    <section class="nature">
      <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=2200&q=85" alt="Pemandangan alam di sekitar AURA" loading="lazy">
      <div class="nature-overlay"></div>
      <div class="nature-copy">
        <span class="eyebrow">07 / Nature</span>
        <h2>Bangun bersama<br><em>kabut.</em></h2>
        <span class="nature-time">05:42 AM / CARINGIN</span>
      </div>
    </section>

    <!-- Reservation -->
    <section class="reservation section-light" id="reservation">
      <div class="section-index">08 / Reservation</div>
      <div class="reservation-inner reveal">
        <p class="eyebrow">Your stay begins here</p>
        <h2>Siap untuk<br><em>melambat?</em></h2>
        <a class="reservation-button magnetic" href="https://wa.me/6281234567890" target="_blank" rel="noopener" data-cursor="OPEN">
          <span>Mulai reservasi</span><span>↗</span>
        </a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-statement">
      <p class="eyebrow">Until next time</p>
      <h2>Thank you<br>for <em>slowing down.</em></h2>
    </div>

    <div class="footer-grid">
      <div>
        <div class="footer-logo">AURA.</div>
        <p class="muted">Adventure Camp, Resort & Elji Cafe</p>
      </div>
      <div class="footer-info">
        <div><span>Location</span><p>Kawasan Perkebunan Pancawati,<br>Caringin, Bogor, Jawa Barat</p></div>
        <div><span>Contact</span><p><a href="https://wa.me/6281234567890">WA: +62 812-3456-7890</a><br><a href="mailto:info@lingkunggunung.com">info@lingkunggunung.com</a></p></div>
        <div><span>Follow</span><p><a href="#">Instagram ↗</a><br><a href="#">TikTok ↗</a></p></div>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© 2026 AURA Sanctuary</span>
      <span>Caringin, West Java</span>
      
      <!-- Tombol Login Admin diselipkan di sini -->
      <span style="display: flex; gap: 1.5rem;">
        <span>Designed to breathe.</span>
        <a href="login.php" style="text-decoration: underline; opacity: 0.6; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Admin Portal ↗</a>
      </span>
    </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
