<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .register-box label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .register-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .register-box button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .register-box button:hover {
            background: #45a049;
        }
        .register-box .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .register-box .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }
        .register-box .login-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
        }
        .success-message {
            color: green;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun</h2>

        <!-- Tampilkan error -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tampilkan pesan sukses -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>
