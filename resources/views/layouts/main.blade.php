<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <title>@yield('title', 'Kamajaya Kamaratih')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="icon" href="{{ asset('logo/cikal.png') }}" type="image/png" />
  @stack('head')
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    #main-content {
      flex: 1;
      padding: 1rem;
      background-image: url('{{ asset('logo/bg1.png') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      min-height: calc(100vh - 4rem);
      padding-bottom: 5rem;
    }

    footer {
      background-color: #f8f9fa;
      text-align: center;
      padding: 0.1rem 0;
      font-size: 0.8rem;
      position: relative;
      z-index: 1;
      color: #6c757d;
    }

    #floatingMenuButton {
      position: fixed;
      top: 1rem;
      left: 1rem;
      background-color: #0d6efd;
      color: white;
      border-radius: 50%;
      width: 3rem;
      height: 3rem;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1050;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    #floatingMenuButton .menu-icon {
      transition: transform 0.3s ease;
    }

    #floatingMenuButton.menu-opened .menu-icon {
      transform: rotate(90deg);
    }

    #floatingMenu {
      position: fixed;
      top: 4.5rem;
      left: 1rem;
      width: 18rem;
      border-radius: 0.5rem;
      padding: 1rem;
      display: none;
      z-index: 1049;
      max-height: 80vh;
      overflow-y: auto;
      scroll-behavior: smooth;
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.85);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      color: #0d6efd;
      scrollbar-width: none;
      -ms-overflow-style: none;
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 0.2s ease, transform 0.2s ease;
    }

    #floatingMenu::-webkit-scrollbar {
      width: 0;
      background: transparent;
    }

    #floatingMenu.show {
      display: block;
      animation: fadeScaleIn 0.2s ease-out forwards;
    }

    @keyframes fadeScaleIn {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    #floatingMenu a {
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      margin-bottom: 0.5rem;
      background-color: #f8f9fa;
      border-radius: 0.5rem;
      color: #0d6efd;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    #floatingMenu a:hover {
      background-color: #e7f1ff;
      transform: translateY(-2px);
    }

    #floatingMenu a.fw-bold {
      background-color: #dceeff;
      box-shadow: inset 0 0 0 2px #0d6efd33;
    }

    .menu-footer {
      margin-top: 0.5rem;
      padding-top: 0.5rem;
      border-top: 1px solid #ddd;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
    }

    .social-icons a {
      font-size: 1.5rem;
      color: #0d6efd;
      transition: transform 0.2s ease, color 0.2s ease;
    }

    .social-icons a:hover {
      transform: scale(1.2);
      color: #0056b3;
    }

    @media (max-width: 576px) {
      #floatingMenu {
        width: 90vw;
        left: 50%;
        transform: translateX(-50%) scale(0.95);
      }

      #floatingMenu.show {
        animation: fadeScaleInMobile 0.2s ease-out forwards;
      }

      @keyframes fadeScaleInMobile {
        to {
          opacity: 1;
          transform: translateX(-50%) scale(1);
        }
      }

      #floatingMenuButton {
        width: 2.5rem;
        height: 2.5rem;
        top: 0.8rem;
        left: 0.8rem;
      }

      #floatingMenu a {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
      }

      .social-icons a {
        font-size: 1.3rem;
      }

      .menu-footer a {
        font-size: 0.9rem;
      }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
      #floatingMenu {
        background-color: rgba(30, 30, 30, 0.85);
        color: #ffffff;
      }
      #floatingMenu a {
        background-color: #1e1e1e;
        color: #ffffff;
      }
      #floatingMenu a:hover {
        background-color: #2d2d2d;
      }
      #floatingMenu a.fw-bold {
        background-color: #2a2a2a;
        box-shadow: inset 0 0 0 2px #ffffff22;
      }
    }
  </style>
</head>
<body>
  <!-- Floating Menu Button -->
  <div id="floatingMenuButton">
    <i class="bi bi-list menu-icon"></i>
  </div>

  <!-- Floating Menu -->
  <div id="floatingMenu">
    <a href="/" class="{{ request()->is('/') ? 'fw-bold' : '' }}">
      <i class="bi bi-house-door me-2"></i>Halaman Utama
    </a>
    <a href="/profil" class="{{ request()->is('profil') ? 'fw-bold' : '' }}">
      <i class="bi bi-book-half me-2"></i>Profil Ambalan KJKR
    </a>
    <a href="/proker" class="{{ request()->is('proker') ? 'fw-bold' : '' }}">
      <i class="bi bi-gem me-2"></i>Program Kerja DA
    </a>
    <a href="/berita" class="{{ request()->is('berita') ? 'fw-bold' : '' }}">
      <i class="bi bi-newspaper me-2"></i>Berita / Artikel
    </a>
    <a href="/galeri" class="{{ request()->is('galeri') ? 'fw-bold' : '' }}">
      <i class="bi bi-images me-2"></i>Galeri
    </a>
    <a href="/pembina" class="{{ request()->is('pembina') ? 'fw-bold' : '' }}">
      <i class="bi bi-person-badge me-2"></i>Pembina
    </a>
    <a href="/dewanambalan" class="{{ request()->is('dewanambalan') ? 'fw-bold' : '' }}">
      <i class="bi bi-people me-2"></i>Dewan Ambalan
    </a>
    <a href="/dewanpurna" class="{{ request()->is('dewanpurna') ? 'fw-bold' : '' }}">
      <i class="bi bi-person-lines-fill me-2"></i>Purna Dewan Ambalan
    </a>
    <a href="/pesan" class="{{ request()->is('pesan') ? 'fw-bold' : '' }}">
      <i class="bi bi-chat-dots me-2"></i>Pesan untuk Kami
    </a>
    <div class="menu-footer">
      <div class="social-icons">
        <a href="https://www.instagram.com/ksatriaa_kjkr/" target="_blank" title="Instagram">
          <i class="bi bi-instagram"></i>
        </a>
        <a href="https://www.tiktok.com/@ksatria_kjkr" target="_blank" title="TikTok">
          <i class="bi bi-tiktok"></i>
        </a>
        <a href="https://www.facebook.com" target="_blank" title="Facebook">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://www.youtube.com/@AmbalanKamajayaKamaratih" target="_blank" title="YouTube">
          <i class="bi bi-youtube"></i>
        </a>
      </div>
      <a href="/login" class="{{ request()->is('login') ? 'fw-bold' : '' }}">
        <i class="bi bi-box-arrow-in-right me-2"></i>Login
      </a>
    </div>
  </div>

  <div id="main-content">
    @yield('content')
  </div>

  <footer>
    &copy; {{ date('Y') }} Ambalan Kamajaya Kamaratih. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuButton = document.getElementById('floatingMenuButton');
      const menuIcon = menuButton.querySelector('.menu-icon');
      const menu = document.getElementById('floatingMenu');

      menuButton.addEventListener('click', function () {
        menu.classList.toggle('show');
        menuButton.classList.toggle('menu-opened');
      });

      document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
          menu.classList.remove('show');
          menuButton.classList.remove('menu-opened');
        }
      });

      document.querySelectorAll('#floatingMenu a').forEach(link => {
        link.addEventListener('click', () => {
          menu.classList.remove('show');
          menuButton.classList.remove('menu-opened');
        });
      });
    });
  </script>
</body>
</html>
