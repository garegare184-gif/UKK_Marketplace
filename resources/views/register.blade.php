<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            width: 420px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .register-title {
            font-weight: 700;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .register-card label {
            font-weight: 600;
            margin-top: 10px;
        }

        .btn-primary {
            width: 100%;
            font-weight: 600;
            padding: 10px;
            border-radius: 8px;
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
    </form>

</div>

</body>
</html>
