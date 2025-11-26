<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #4b0f1f, #6a1a2f, #8b233d); /* Burgundy gradient elegan */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            width: 350px;
            background: #ffffffdd; /* Transparan elegan */
            backdrop-filter: blur(5px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease-in-out;
        }

        .btn-primary {
            background-color: #6a1a2f;
            border: none;
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

<div class="card card-custom">
    <h3 class="text-center mb-4" style="color:#4b0f1f;">Login</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button class="btn btn-primary w-100">Login</button>
    </form>

    <p class="text-center mt-3">
        Belum punya akun? <a href="/register">Daftar</a>
    </p>

</div>

</body>
</html>
