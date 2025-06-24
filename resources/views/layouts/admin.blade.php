<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
        }

        /* Sidebar tetap */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 240px;
            background-color: #0d6efd;
            color: white;
            overflow-y: auto;
            z-index: 1030;
            transition: width 0.3s;
        }

        /* Sidebar collapsed */
        .sidebar-collapsed {
            width: 70px !important;
        }

        .sidebar-collapsed .nav-link span,
        .sidebar-collapsed .sidebar-title,
        .sidebar-collapsed .btn span {
            display: none !important;
        }

        .sidebar-collapsed .nav-link {
            text-align: center;
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        .sidebar-collapsed .btn i {
            margin-right: 0 !important;
        }

        /* Konten utama */
        .main-content {
            margin-left: 240px;
            padding: 2rem;
            transition: margin-left 0.3s;
        }

        .main-content.expanded {
            margin-left: 70px !important;
        }

        /* Sembunyikan sidebar desktop di mobile */
        @media (max-width: 991.98px) {
            .sidebar-fixed {
                display: none !important;
            }

            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Desktop -->
    <div id="sidebar" class="sidebar-fixed d-flex flex-column p-0">
        <div class="d-flex align-items-center justify-content-between p-4 border-bottom border-light">
            <h4 class="mb-0 sidebar-title">Dashboard Admin KJKR</h4>
            <button class="btn btn-sm btn-outline-light d-none d-lg-inline" id="toggleSidebar" title="Minimize Sidebar">
                <i class="bi bi-chevron-double-left"></i>
            </button>
        </div>
        <ul class="nav flex-column mb-auto px-2 pt-3">
            <li class="nav-item mb-2">
                <a href="/admin" class="nav-link text-white {{ request()->is('admin') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-house-door me-2"></i><span>Halaman Admin</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/admin/berita" class="nav-link text-white {{ request()->is('admin/berita') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-newspaper me-2"></i><span>Input Berita</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/admin/galeri" class="nav-link text-white {{ request()->is('admin/galeri') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-images me-2"></i><span>Input Galeri</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/admin/pembina" class="nav-link text-white {{ request()->is('admin/pembina') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-person-badge me-2"></i><span>Input Data Pembina</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/admin/dewan" class="nav-link text-white {{ request()->is('admin/dewan') ? 'active fw-bold' : '' }}">
                    <i class="bi bi-people me-2"></i><span>Input Data Dewan</span>
                </a>
            </li>
        </ul>
        <div class="mt-auto p-4 border-top border-light">
            <a href="/" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-2"></i><span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Sidebar Mobile -->
    <div class="d-lg-none">
        <button class="btn btn-primary m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <i class="bi bi-list"></i> Menu
        </button>
        <div class="offcanvas offcanvas-start bg-primary text-white" tabindex="-1" id="offcanvasSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Dashboard Admin</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column p-0">
                <ul class="nav flex-column mb-auto px-2 pt-3">
                    <li class="nav-item mb-2">
                        <a href="/admin" class="nav-link text-white"><i class="bi bi-house-door me-2"></i><span>Halaman Admin</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/admin/berita" class="nav-link text-white"><i class="bi bi-newspaper me-2"></i><span>Input Berita</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/admin/galeri" class="nav-link text-white"><i class="bi bi-images me-2"></i><span>Input Galeri</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/admin/pembina" class="nav-link text-white"><i class="bi bi-person-badge me-2"></i><span>Input Data Pembina</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/admin/dewan" class="nav-link text-white"><i class="bi bi-people me-2"></i><span>Input Data Dewan</span></a>
                    </li>
                </ul>
                <div class="mt-auto p-4 border-top border-light">
                    <a href="/" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-arrow-right me-2"></i><span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');
            const mainContent = document.getElementById('main-content');

            toggleBtn?.addEventListener('click', function () {
                sidebar.classList.toggle('sidebar-collapsed');
                mainContent.classList.toggle('expanded');

                const icon = toggleBtn.querySelector('i');
                icon.classList.toggle('bi-chevron-double-left');
                icon.classList.toggle('bi-chevron-double-right');
            });
        });
    </script>
</body>
</html>
