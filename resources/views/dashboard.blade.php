<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6fb;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h3 {
            margin: 0;
        }
        .container {
            margin: 2rem auto;
            width: 90%;
            max-width: 500px;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .info {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
        }
        button {
            background: white;
            border: 2px solid white;
            color: #6a11cb;
            border-radius: 6px;
            padding: 8px 14px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h3>Dashboard</h3>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <h2>Selamat Datang! 👋</h2>
        <p>Anda berhasil login ke sistem.</p>

        <div class="info">
            <strong>Informasi User</strong><br>
            Username: {{ session('user_name') }}<br>
            User ID: {{ session('user_id') }}
        </div>
    </div>

</body>
</html>
