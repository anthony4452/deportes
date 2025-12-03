<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: #0d0d0d;
        }

        /* Fondo líquido animado estilo Apple */
        .liquid-bg {
            position: absolute;
            width: 120vw;
            height: 120vh;
            top: -10vh;
            left: -10vw;
            background: radial-gradient(circle at 20% 20%, #5a1f80 0%, transparent 60%)),
                        radial-gradient(circle at 80% 30%, #003a4d 0%, transparent 60%)),
                        radial-gradient(circle at 50% 80%, #1e0a5c 0%, transparent 60%));
            filter: blur(90px);
            animation: float 16s infinite ease-in-out alternate;
            z-index: -2;
        }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(5%, -5%) scale(1.15); }
            100% { transform: translate(-5%, 10%) scale(1.1); }
        }

        .glow-layer {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.05);
            mix-blend-mode: overlay;
            z-index: -1;
        }

        .register-box {
            backdrop-filter: blur(30px);
            background: rgba(255, 255, 255, 0.12);
            padding: 40px;
            width: 380px;
            border-radius: 20px;
            text-align: center;
            color: #fff;
            animation: fadeIn 1s ease-out;
            border: 1px solid rgba(255,255,255,0.15);
            box-shadow: 0 0 35px rgba(0,0,0,0.4);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-box h2 {
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
        }

        .register-box input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border-radius: 12px;
            border: none;
            outline: none;
            background: rgba(255,255,255,0.2);
            color: #fff;
            font-size: 15px;
        }

        .register-box button {
            width: 100%;
            padding: 14px;
            margin-top: 15px;
            background: linear-gradient(135deg, #ff005c, #7f00ff);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .register-box button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255,107,203,0.6);
        }

        .extra-links a {
            display: block;
            margin-top: 18px;
            color: #aee0ff;
            text-decoration: none;
            font-size: 14px;
        }

        .extra-links a:hover { text-decoration: underline; }

    </style>
</head>
<body>

<div class="liquid-bg"></div>
<div class="glow-layer"></div>

<div class="register-box">
    <h2>Crear Cuenta</h2>

    <input type="text" placeholder="Nombre completo">
    <input type="text" placeholder="Usuario">
    <input type="email" placeholder="Correo electrónico">
    <input type="password" placeholder="Contraseña">
    <input type="password" placeholder="Confirmar contraseña">

    <a href="/" style="text-decoration:none;"><button style="width:100%;padding:14px;margin-top:15px;background:linear-gradient(135deg,#ff005c,#7f00ff);border:none;border-radius:12px;cursor:pointer;color:#fff;font-size:16px;font-weight:bold;transition:0.3s;">Registrarse</button></a>

    <div class="extra-links">
        <a href="/login">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>

</body>
</html>
