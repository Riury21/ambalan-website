<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kamajaya Kamaratih')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('logo/cikal.png') }}" type="image/png">
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
        }

        #floatingMenu {
            position: fixed;
            top: 4.5rem;
            left: 1rem;
            background-color: white;
            color: #0d6efd;
            border-radius: 0.5rem;
            width: 18rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 1rem;
            display: none;
            z-index: 1049;
        }

        #floatingMenu.show {
            display: block;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
            transition: background-color 0.2s, transform 0.2s;
        }

        #floatingMenu a:hover {
            background-color: #e7f1ff;
            transform: translateY(-2px);
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

        .btn-login {
            width: auto;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <!-- Floating Menu Button -->
    <div id="floatingMenuButton">
        <i class="bi bi-list"></i>
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

    <!-- Main content -->
    <div id="main-content">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Ambalan Kamajaya Kamaratih. All Rights Reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('floatingMenuButton');
            const menu = document.getElementById('floatingMenu');

            menuButton.addEventListener('click', function () {
                menu.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
