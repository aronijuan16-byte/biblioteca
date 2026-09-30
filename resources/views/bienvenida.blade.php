<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3;url={{ route('libros.index') }}">
    <title>Bienvenida | Biblioteca Virtual</title>
    <style>
        *{box-sizing:border-box}
        body{
            margin:0;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;
            font:16px/1.6 ui-sans-serif,system-ui,"Segoe UI",Roboto,sans-serif;text-align:center;color:#fff;padding:1.5rem;
            background:radial-gradient(circle at 20% 20%,#6366f1 0,transparent 45%),radial-gradient(circle at 80% 80%,#a855f7 0,transparent 45%),#151933;
        }
        .tarjeta{
            padding:2.5rem 2rem;max-width:420px;width:100%;border-radius:20px;
            background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.18);
            backdrop-filter:blur(14px);box-shadow:0 20px 60px rgba(0,0,0,.35);
            animation:entrada .7s ease both;
        }
        img{height:72px;margin-bottom:1rem}
        h1{margin:0 0 .4rem;font-size:2rem;letter-spacing:-.02em}
        p{margin:0;color:rgba(255,255,255,.8)}
        .barra{height:5px;margin:1.5rem 0 1.25rem;border-radius:99px;background:rgba(255,255,255,.2);overflow:hidden}
        .barra span{display:block;height:100%;width:0;background:#fff;border-radius:99px;animation:carga 3s linear forwards}
        a{display:inline-block;padding:.55rem 1.2rem;border-radius:10px;background:#fff;color:#3730a3;font-weight:700;text-decoration:none;transition:transform .15s}
        a:hover{transform:translateY(-2px)}
        @keyframes carga{to{width:100%}}
        @keyframes entrada{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}
    </style>
</head>
<body>
    <div class="tarjeta">
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel">
        <h1>Biblioteca Virtual</h1>
        <p>Te estamos llevando al catálogo...</p>
        <div class="barra"><span></span></div>
        <a href="{{ route('libros.index') }}">Ir ahora</a>
    </div>
</body>
</html>
