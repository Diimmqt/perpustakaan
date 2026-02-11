<!DOCTYPE html>

<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

```
    .card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 350px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        font-size: 14px;
    }
</style>
```

</head>

<body>

<div class="card">
    <h2>Register</h2>

```
<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="/login">Login</a></p>
```

</div>

</body>
</html>
