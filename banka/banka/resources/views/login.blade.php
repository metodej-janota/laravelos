<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
<body>
<div class="flex flex-col">
<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Heslo">
    <button type="submit">Přihlásit se!</button>
</form>
<div class="flex gap-4">
    <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-black rounded-lg shadow-[0px 14px 34px 0px rgba(0,0,0,0.08)] transition duration-300 hover:text-white hover:bg-[#FF2D20]">Register</a>
    <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-black rounded-lg shadow-[0px 14px 34px 0px rgba(0,0,0,0.08)] transition duration-300 hover:text-white hover:bg-[#FF2D20]">Login</a>
    <a href="{{ route('stav') }}" class="px-6 py-3 bg-white text-black rounded-lg shadow-[0px 14px 34px 0px rgba(0,0,0,0.08)] transition duration-300 hover:text-white hover:bg-[#FF2D20]">Přejít do bankose</a>
</div></div>
</body>
</html>
