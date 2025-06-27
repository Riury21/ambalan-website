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
      background-color: #f8f9fa;
    }

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
      transition: width 0.3s ease;
    }

    .sidebar-collapsed {
      width: 70px !important;
    }

    .sidebar-title {
      font-size: 1.2rem;
      font-weight: 600;
      white-space: nowrap;
      overflow: hidden;
      transition: opacity 0.3s ease, width 0.3s ease;
    }

    .sidebar-collapsed .sidebar-title {
      opacity: 0;
      width: 0;
    }

    .nav-link {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 0.5rem;
      font-size: 0.95rem;
      padding: 0.65rem 1rem;
      border-radius: 0.4rem;
      transition: background 0.2s, padding 0.3s, gap 0.3s;
      white-space: nowrap;
    }

    .nav-link i {
      font-size: 1.2rem;
      min-width: 24px;
      text-align: center;
      flex-shrink: 0;
    }

    .nav-link span {
      transition: opacity 0.3s ease, width 0.3s ease;
      display: inline-block;
    }

    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-link.active {
      background-color: rgba(255, 255, 255, 0.25);
      font-weight: bold;
    }

    .sidebar-collapsed .nav-link {
      justify-content: center;
      padding-left: 0 !important;
      padding-right: 0 !important;
      gap: 0 !important;
    }

    .sidebar-collapsed .nav-link span {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .sidebar-collapsed .btn span {
      display: none;
    }

    /* Perbaikan tombol toggle & logout saat sidebar collapsed */
    .sidebar-collapsed .btn-outline-light {
      width: 42px !important;
      height: 42px;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
    }

    .sidebar-collapsed .btn-outline-light i {
      margin: 0 !important;
    }

    .main-content {
      margin-left: 240px;
      padding: 2rem;
      transition: margin-left 0.3s ease-in-out;
    }

    .main-content.expanded {
      margin-left: 70px !important;
    }

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
    <h4 class="mb-0 sidebar-title">Dashboard Admin</h4>
    <button class="btn btn-sm btn-outline-light d-none d-lg-inline" id="toggleSidebar" title="Minimize Sidebar">
      <i class="bi bi-chevron-double-left"></i>
    </button>
  </div>
  <ul class="nav flex-column mb-auto px-2 pt-3">
    <li class="nav-item mb-2">
      <a href="/admin" class="nav-link text-white {{ request()->is('admin') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Halaman Admin">
        <i class="bi bi-house-door"></i><span>Halaman Admin</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="/admin/berita" class="nav-link text-white {{ request()->is('admin/berita') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Input Berita">
        <i class="bi bi-newspaper"></i><span>Input Berita</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="/admin/galeri" class="nav-link text-white {{ request()->is('admin/galeri') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Input Galeri">
        <i class="bi bi-images"></i><span>Input Galeri</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="/admin/pembina" class="nav-link text-white {{ request()->is('admin/pembina') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Pembina">
        <i class="bi bi-person-badge"></i><span>Data Pembina</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="/admin/dewan" class="nav-link text-white {{ request()->is('admin/dewan') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Dewan">
        <i class="bi bi-people"></i><span>Data Dewan</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="/admin/pesan" class="nav-link text-white {{ request()->is('admin/pesan') ? 'active fw-bold' : '' }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat Pesan">
        <i class="bi bi-envelope"></i><span>Lihat Pesan</span>
      </a>
    </li>
  </ul>
  <div class="mt-auto p-4 border-top border-light d-flex justify-content-center">
    <a href="/" class="btn btn-outline-light d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
      <i class="bi bi-box-arrow-right"></i><span>Logout</span>
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
          <a href="/admin/pembina" class="nav-link text-white"><i class="bi bi-person-badge me-2"></i><span>Data Pembina</span></a>
        </li>
        <li class="nav-item mb-2">
          <a href="/admin/dewan" class="nav-link text-white"><i class="bi bi-people me-2"></i><span>Data Dewan</span></a>
        </li>
        <li class="nav-item mb-2">
          <a href="/admin/pesan" class="nav-link text-white"><i class="bi bi-envelope me-2"></i><span>Lihat Pesan</span></a>
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

    // Tooltip inisialisasi
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
  });
</script>
</body>
</html>
