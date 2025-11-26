<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #4b0f1f, #6a1a2f, #8b233d);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .register-card {
            width: 420px;
            background: #ffffffdd;
            backdrop-filter: blur(6px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease-in-out;
        }

        .register-title {
            font-weight: 700;
            font-size: 26px;
            color: #4b0f1f;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: 600;
            color: #4b0f1f;
            margin-top: 10px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            width: 100%;
            font-weight: 600;
            padding: 10px;
            background-color: #6a1a2f;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #4b0f1f;
        }

        a {
            color: #6a1a2f;
            text-decoration: none;
        }

        a:hover {
            color: #4b0f1f;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="register-card">

    <div class="register-title">Daftar Akun Baru</div>

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>

        <label>Username</label>
        <input type="text" name="username" class="form-control" required>

        <label>Password</label>
        <input type="password" name="password" class="form-control" required>

        <button type="submit" class="btn btn-primary mt-4">Register</button>

        <p class="text-center mt-3">
            Sudah punya akun? <a href="/login">Login</a>
        </p>

    </form>

</div>

</body>
</html>
