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
        }
        .login-card {
            max-width: 380px;
            margin: 6vh auto;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        }
        @media (max-width: 480px) {
            .login-card {
                margin: 2vh 8px;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-card bg-white p-4">
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