<?php
session_start();

// Proteksi halaman: jika belum login, kembali ke login.php.
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username'] ?? 'Admin', ENT_QUOTES, 'UTF-8');
$role = htmlspecialchars($_SESSION['role'] ?? 'Administrator', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#111111">
    <title>Dashboard Admin | AURA.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="app-shell">
    <!-- Mobile backdrop -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <a href="admin.php" class="brand-mark">AURA.</a>
            <span>ADMIN / 2026</span>
        </div>

        <div class="sidebar-label">Workspace</div>
        <nav class="sidebar-nav" aria-label="Navigasi admin">
            <a href="admin.php" class="nav-item active">
                <i class="bi bi-grid-1x2"></i><span>Overview</span><b>01</b>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-calendar3"></i><span>Reservasi</span><b>02</b>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-cup-hot"></i><span>Order Kafe</span><b>03</b>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-door-open"></i><span>Kamar</span><b>04</b>
            </a>
            <a href="#" class="nav-item">
                <i class="bi bi-people"></i><span>Data Tamu</span><b>05</b>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="system-status"><span></span> System operational</div>
            <a href="logout.php" class="logout-link"><i class="bi bi-arrow-left"></i><span>Keluar</span></a>
        </div>
    </aside>

    <!-- Main -->
    <main class="main-content">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka navigasi" aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>
            <div class="breadcrumb"><span>AURA.</span><i class="bi bi-chevron-right"></i><strong>Overview</strong></div>
            <div class="topbar-right">
                <button class="icon-button" type="button" aria-label="Notifikasi"><i class="bi bi-bell"></i><span class="notification-dot"></span></button>
                <div class="profile">
                    <div class="avatar"><?= strtoupper(substr($username, 0, 1)); ?></div>
                    <div class="profile-copy"><strong><?= $username; ?></strong><span><?= $role; ?></span></div>
                    <i class="bi bi-chevron-down profile-chevron"></i>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <section class="welcome-row">
                <div>
                    <p class="eyebrow">Friday / 11 September 2026</p>
                    <h1>Good morning, <em><?= $username; ?>.</em></h1>
                    <p class="subtitle">Berikut ringkasan aktivitas AURA hari ini.</p>
                </div>
                <button class="date-button" type="button"><i class="bi bi-calendar3"></i> Hari ini <i class="bi bi-chevron-down"></i></button>
            </section>

            <!-- KPI -->
            <section class="stats-grid" aria-label="Ringkasan statistik">
                <article class="stat-card featured">
                    <div class="stat-head"><span>Occupancy</span><i class="bi bi-arrow-up-right"></i></div>
                    <div class="stat-value">75<small>%</small></div>
                    <div class="stat-footer"><span>15 dari 20 kamar terisi</span><span class="trend up">+8.2%</span></div>
                    <div class="mini-bar"><span style="width:75%"></span></div>
                </article>

                <article class="stat-card">
                    <div class="stat-head"><span>Check-in hari ini</span><i class="bi bi-box-arrow-in-right"></i></div>
                    <div class="stat-value">12</div>
                    <div class="stat-footer"><span>8 sudah dikonfirmasi</span><span class="trend">Today</span></div>
                </article>

                <article class="stat-card">
                    <div class="stat-head"><span>Order kafe</span><i class="bi bi-cup-hot"></i></div>
                    <div class="stat-value">08</div>
                    <div class="stat-footer"><span>3 perlu diproses</span><span class="trend">Active</span></div>
                </article>

                <article class="stat-card warning-card">
                    <div class="stat-head"><span>Maintenance</span><i class="bi bi-tools"></i></div>
                    <div class="stat-value">01</div>
                    <div class="stat-footer"><span>Sanctuary Suite 04</span><span class="trend warning">Attention</span></div>
                </article>
            </section>

            <section class="dashboard-grid">
                <!-- Reservations -->
                <article class="panel reservations-panel">
                    <div class="panel-head">
                        <div><p class="eyebrow">Live queue</p><h2>Reservasi terbaru</h2></div>
                        <a href="#" class="panel-link">Lihat semua <i class="bi bi-arrow-up-right"></i></a>
                    </div>
                    <div class="reservation-list">
                        <div class="reservation-row">
                            <div class="guest-avatar">BS</div>
                            <div class="guest-main"><strong>Budi Santoso</strong><span>#RES-001 · Sanctuary Suite</span></div>
                            <div class="reservation-date"><span>Check-in</span><strong>12 Sep</strong></div>
                            <span class="status pending">Payment</span>
                            <button class="more-button" aria-label="Aksi"><i class="bi bi-three-dots"></i></button>
                        </div>
                        <div class="reservation-row">
                            <div class="guest-avatar alt">AR</div>
                            <div class="guest-main"><strong>Andi Ramadhan</strong><span>#RES-002 · Forest Cabin</span></div>
                            <div class="reservation-date"><span>Check-in</span><strong>13 Sep</strong></div>
                            <span class="status confirmed">Confirmed</span>
                            <button class="more-button" aria-label="Aksi"><i class="bi bi-three-dots"></i></button>
                        </div>
                        <div class="reservation-row">
                            <div class="guest-avatar warm">SN</div>
                            <div class="guest-main"><strong>Siti Nurhaliza</strong><span>#RES-003 · Sanctuary Suite</span></div>
                            <div class="reservation-date"><span>Check-in</span><strong>14 Sep</strong></div>
                            <span class="status confirmed">Confirmed</span>
                            <button class="more-button" aria-label="Aksi"><i class="bi bi-three-dots"></i></button>
                        </div>
                    </div>
                </article>

                <!-- Occupancy visual -->
                <article class="panel occupancy-panel">
                    <div class="panel-head">
                        <div><p class="eyebrow">Rooms</p><h2>Availability</h2></div>
                        <button class="dots" aria-label="Opsi"><i class="bi bi-three-dots"></i></button>
                    </div>
                    <div class="donut-wrap">
                        <div class="donut"><div><strong>15</strong><span>occupied</span></div></div>
                    </div>
                    <div class="legend">
                        <span><i class="legend-dot occupied"></i>Occupied <b>15</b></span>
                        <span><i class="legend-dot available"></i>Available <b>04</b></span>
                        <span><i class="legend-dot maintenance"></i>Maintenance <b>01</b></span>
                    </div>
                </article>

                <!-- Activity -->
                <article class="panel activity-panel">
                    <div class="panel-head">
                        <div><p class="eyebrow">System log</p><h2>Aktivitas</h2></div>
                        <span class="live-label"><i></i> Live</span>
                    </div>
                    <div class="timeline">
                        <div class="timeline-item"><i class="bi bi-check2"></i><div><strong>Reservasi #RES-002 dikonfirmasi</strong><span>Andi Ramadhan · 8 menit lalu</span></div></div>
                        <div class="timeline-item"><i class="bi bi-cup-hot"></i><div><strong>Order KOT-008 masuk</strong><span>Table 04 · 17 menit lalu</span></div></div>
                        <div class="timeline-item"><i class="bi bi-person-plus"></i><div><strong>Guest profile dibuat</strong><span>Siti Nurhaliza · 32 menit lalu</span></div></div>
                        <div class="timeline-item"><i class="bi bi-tools"></i><div><strong>Room 04 ditandai maintenance</strong><span>Housekeeping · 1 jam lalu</span></div></div>
                    </div>
                </article>
            </section>

            <section class="quick-actions">
                <div><p class="eyebrow">Quick actions</p><h2>What needs attention?</h2></div>
                <div class="action-list">
                    <a href="#" class="action-card"><span class="action-icon"><i class="bi bi-calendar-check"></i></span><span><strong>Review reservations</strong><small>3 booking membutuhkan perhatian</small></span><i class="bi bi-arrow-up-right"></i></a>
                    <a href="#" class="action-card"><span class="action-icon"><i class="bi bi-cup-hot"></i></span><span><strong>Kitchen orders</strong><small>3 order sedang menunggu</small></span><i class="bi bi-arrow-up-right"></i></a>
                    <a href="#" class="action-card"><span class="action-icon"><i class="bi bi-tools"></i></span><span><strong>Room maintenance</strong><small>1 kamar perlu ditangani</small></span><i class="bi bi-arrow-up-right"></i></a>
                </div>
            </section>
        </div>

        <footer class="main-footer"><span>AURA. ADMIN SYSTEM</span><span>Private workspace · v2.0</span></footer>
    </main>
</div>

<script>
(() => {
    const sidebar = document.getElementById('sidebar');
    const mobileMenu = document.getElementById('mobileMenu');
    const backdrop = document.getElementById('sidebarBackdrop');

    const toggleSidebar = (open) => {
        sidebar.classList.toggle('open', open);
        backdrop.classList.toggle('visible', open);
        mobileMenu.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('nav-open', open);
    };

    mobileMenu?.addEventListener('click', () => toggleSidebar(!sidebar.classList.contains('open')));
    backdrop?.addEventListener('click', () => toggleSidebar(false));

    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', () => {
            if (window.innerWidth <= 900) toggleSidebar(false);
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 900) toggleSidebar(false);
    });
})();
</script>
</body>
</html>
