<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('logo/cikal.png') }}" type="image/png">
    <style>
        body {
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-width: 80px;
            margin: 0 10px;
        }
        @media (max-width: 480px) {
            .login-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-container">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo KJ">
            <img src="{{ asset('logo/kr.png') }}" alt="Logo KR">
        </div>
        <h2 class="mb-3 text-center">Login Admin</h2>
        @if(session('error'))
            <div class="alert alert-danger py-2">{{ session('error') }}</div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-1">Login</button>
            <a href="/" class="btn btn-outline-secondary w-100">Kembali</a>
        </form>
    </div>
</body>
</html>
