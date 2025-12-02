<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 25px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-box button:hover {
            background: #005dc1;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Iniciar Sesión</h2>
    <input type="text" placeholder="Usuario">
    <input type="password" placeholder="Contraseña">
    <button>Entrar</button>
</div>

</body>
</html>
