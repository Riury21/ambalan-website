<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kamajaya Kamaratih')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #main-content {
            padding-top: 0 !important;
        }

        /* Sidebar styles */
        #sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 240px;
            background-color: #0d6efd;
            color: white;
            transition: width 0.3s;
            z-index: 1040;
            overflow-y: auto;
        }

        #sidebar.collapsed {
            width: 70px;
        }

        #sidebar .nav-link span,
        #sidebar .sidebar-title,
        #sidebar .btn span {
            transition: opacity 0.2s ease;
        }

        #sidebar.collapsed .nav-link span,
        #sidebar.collapsed .sidebar-title,
        #sidebar.collapsed .btn span {
            display: none !important;
        }

        #sidebar.collapsed .nav-link,
        #sidebar.collapsed .btn {
            text-align: center;
        }

        /* Social media icons */
        #sidebar .social-icons {
            display: flex;
            justify-content: space-around;
            gap: 10px;
        }

        #sidebar.collapsed .social-icons {
            flex-direction: column;
            align-items: center;
        }

        /* Main content styles */
        #main-content {
            margin-left: 240px;
            transition: margin-left 0.3s;
            padding: 0;
        }

        #sidebar.collapsed + #main-content {
            margin-left: 70px;
        }

        /* Mobile responsive (sidebar jadi offcanvas) */
        @media (max-width: 991.98px) {
            #sidebar {
                display: none;
            }
            #main-content {
                margin-left: 0;
                padding: 1rem;
            }

        @media (min-width: 992px) {
            #main-content {
                margin-left: 240px; /* Tambahkan margin hanya jika sidebar terlihat */
            }
        }

            #mobileMenuButton {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1050;
                background-color: #0d6efd;
                color: white;
                border-bottom: 1px solid #dee2e6;
                padding: 0.5rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar">
        <!-- gambar Cikal -->
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom border-light">
            <div class="d-flex align-items-center">
                <h5 class="sidebar-title mb-0">Pramuka KJKR</h5>
            </div> 
            <button class="btn btn-sm btn-outline-light d-none d-lg-inline" id="toggleSidebar" title="Toggle Sidebar">
                <i class="bi bi-chevron-double-left"></i>
            </button>
        </div> 

        <ul class="nav flex-column px-2 pt-3">
            <li class="nav-item mb-2">
                <a href="/" class="nav-link text-white {{ request()->is('/') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-house-door me-2"></i><span>Halaman Utama</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/berita" class="nav-link text-white {{ request()->is('berita') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-newspaper me-2"></i><span>Berita / Artikel</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/galeri" class="nav-link text-white {{ request()->is('galeri') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-images me-2"></i><span>Galeri</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/sejarah" class="nav-link text-white {{ request()->is('sejarah') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-clock-history me-2"></i><span>Sejarah KJKR</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/pembina" class="nav-link text-white {{ request()->is('pembina') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-person-badge me-2"></i><span>Pembina</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/dewanambalan" class="nav-link text-white {{ request()->is('dewanambalan') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-people me-2"></i><span>Dewan Ambalan</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/dewanpurna" class="nav-link text-white {{ request()->is('dewanpurna') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-person-lines-fill me-2"></i><span>Purna Dewan</span>
                </a>
            </li>
        </ul>
        <div class="mt-auto p-3 border-top border-light">
            <!-- Social Media Icons -->
            <div class="social-icons mb-3">
                <a href="https://www.instagram.com" target="_blank" class="text-white" title="Instagram">
                    <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.tiktok.com" target="_blank" class="text-white" title="TikTok">
                    <i class="bi bi-tiktok" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.facebook.com" target="_blank" class="text-white" title="Facebook">
                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.youtube.com" target="_blank" class="text-white" title="YouTube">
                    <i class="bi bi-youtube" style="font-size: 1.5rem;"></i>
                </a>
            </div>
            <a href="/login" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-2"></i><span>Login</span>
            </a>
        </div>
    </div>

    <!-- Main content -->
    <div id="main-content">
        <!-- Mobile menu toggle -->
        <div id="mobileMenuButton" class="d-lg-none">
            <button class="btn btn-primary w-100" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list"></i> Menu
            </button>
        </div>

        @yield('content')
    </div>

    <!-- Offcanvas Sidebar (Mobile) -->
    <div class="offcanvas offcanvas-start bg-primary text-white" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <!-- Logo Cikal -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('logo/cikal.png') }}" alt="Logo Cikal" 
                    style="width: 30px; height: 30px; margin-right: 10px; object-fit: contain;">
                <h5 class="offcanvas-title">Pramuka KJKR</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        
        <div class="offcanvas-body d-flex flex-column">
            <!-- Navigation Links -->
            <ul class="nav flex-column px-2 mb-4">
                <li class="nav-item mb-2"><a href="/" class="nav-link text-white"><i class="bi bi-house-door me-2"></i>Halaman Utama</a></li>
                <li class="nav-item mb-2"><a href="/berita" class="nav-link text-white"><i class="bi bi-newspaper me-2"></i>Berita</a></li>
                <li class="nav-item mb-2"><a href="/galeri" class="nav-link text-white"><i class="bi bi-images me-2"></i>Galeri</a></li>
                <li class="nav-item mb-2"><a href="/sejarah" class="nav-link text-white"><i class="bi bi-clock-history me-2"></i>Sejarah</a></li>
                <li class="nav-item mb-2"><a href="/pembina" class="nav-link text-white"><i class="bi bi-person-badge me-2"></i>Pembina</a></li>
                <li class="nav-item mb-2"><a href="/dewanambalan" class="nav-link text-white"><i class="bi bi-people me-2"></i>Dewan Ambalan</a></li>
                <li class="nav-item mb-2"><a href="/dewanpurna" class="nav-link text-white"><i class="bi bi-person-lines-fill me-2"></i>Purna Dewan</a></li>
            </ul>

            <!-- Social Media Icons -->
            <div class="social-icons d-flex justify-content-around gap-2 mb-4">
                <a href="https://www.instagram.com" target="_blank" class="text-white" title="Instagram">
                    <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.tiktok.com" target="_blank" class="text-white" title="TikTok">
                    <i class="bi bi-tiktok" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.facebook.com" target="_blank" class="text-white" title="Facebook">
                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                </a>
                <a href="https://www.youtube.com" target="_blank" class="text-white" title="YouTube">
                    <i class="bi bi-youtube" style="font-size: 1.5rem;"></i>
                </a>
            </div>

            <!-- Login Button -->
            <a href="/login" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-2"></i><span>Login</span>
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar collapse
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('collapsed');
                    const icon = toggleBtn.querySelector('i');
                    icon.classList.toggle('bi-chevron-double-left');
                    icon.classList.toggle('bi-chevron-double-right');
                });
            }
        });
    </script>
</body>
</html>