<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Biblioteca Virtual')</title>
<style>
:root{
  --fondo:#f5f6fb;--tarjeta:#fff;--texto:#1c2033;--suave:#6a7090;--linea:#e3e6f0;
  --primario:#4f46e5;--primario-osc:#4338ca;--primario-claro:#eef0ff;--acento:#e11d48;
  --sombra:0 1px 2px rgba(28,32,51,.06),0 8px 24px rgba(28,32,51,.06);
  --radio:14px;
}
@media (prefers-color-scheme:dark){
  :root{
    --fondo:#0f1222;--tarjeta:#181c33;--texto:#e8eaf6;--suave:#9aa1c7;--linea:#272c4a;
    --primario:#818cf8;--primario-osc:#a5b4fc;--primario-claro:#22284d;--acento:#fb7185;
    --sombra:0 1px 2px rgba(0,0,0,.4),0 8px 24px rgba(0,0,0,.3);
  }
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;background:var(--fondo);color:var(--texto);font:16px/1.6 ui-sans-serif,system-ui,"Segoe UI",Roboto,sans-serif;-webkit-font-smoothing:antialiased}
h1,h3{margin:0 0 .5rem;letter-spacing:-.02em;line-height:1.2}
h1{font-size:clamp(1.75rem,4vw,2.4rem);font-weight:800}
h3{font-size:1.05rem;font-weight:700}
a{color:inherit}
.wrap{max-width:1040px;margin:0 auto;padding:0 1.25rem}

/* Encabezado */
header{position:sticky;top:0;z-index:10;background:color-mix(in srgb,var(--tarjeta) 82%,transparent);backdrop-filter:blur(10px);border-bottom:1px solid var(--linea);padding:.8rem 0}
header .wrap{display:flex;justify-content:space-between;align-items:center;gap:1rem}
header a{text-decoration:none}
.marca{display:flex;align-items:center;gap:.6rem;font-weight:800;letter-spacing:-.01em}
.marca-icono{display:grid;place-items:center;width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff}
.marca-icono svg{width:18px;height:18px}

/* Botones */
.btn{display:inline-flex;align-items:center;gap:.4rem;border:1px solid var(--primario);background:var(--primario);color:#fff;padding:.6rem 1.1rem;border-radius:10px;text-decoration:none;cursor:pointer;font:inherit;font-weight:600;transition:transform .15s,box-shadow .15s,background .15s}
.btn:hover{background:var(--primario-osc);border-color:var(--primario-osc);transform:translateY(-1px);box-shadow:0 6px 16px rgba(79,70,229,.3)}
.btn.sec{background:transparent;color:var(--texto);border-color:var(--linea)}
.btn.sec:hover{background:var(--primario-claro);box-shadow:none}
.btn.peligro{background:var(--acento);border-color:var(--acento)}
header .btn{padding:.5rem 1rem}

main{padding:2.25rem 0 3rem}

/* Formularios y filtros */
input,select{font:inherit;color:var(--texto);background:var(--tarjeta);padding:.65rem .85rem;border:1px solid var(--linea);border-radius:10px;max-width:100%;transition:border-color .15s,box-shadow .15s}
input:focus,select:focus{outline:none;border-color:var(--primario);box-shadow:0 0 0 4px color-mix(in srgb,var(--primario) 18%,transparent)}
.filtros{display:flex;gap:.7rem;flex-wrap:wrap;margin:1.25rem 0 1.75rem;padding:.9rem;background:var(--tarjeta);border:1px solid var(--linea);border-radius:var(--radio);box-shadow:var(--sombra)}
.filtros input[type=search]{flex:1 1 220px}

/* Catálogo */
.subtitulo{color:var(--suave);margin:0}
.lista{list-style:none;margin:0;padding:0;display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:1rem}
.lista li{display:flex;align-items:flex-start;gap:1rem;padding:1.1rem;background:var(--tarjeta);border:1px solid var(--linea);border-radius:var(--radio);box-shadow:var(--sombra);transition:transform .15s,border-color .15s}
.lista li:hover{transform:translateY(-3px);border-color:var(--primario)}
.lista li>div:not(.portada){flex:1;min-width:0}
.lista h3 a{text-decoration:none}
.lista h3 a:hover{color:var(--primario)}
.portada{flex:none;display:grid;place-items:center;width:52px;height:68px;border-radius:8px;background:linear-gradient(160deg,#6366f1,#a855f7);color:#fff;font-weight:800;font-size:1.4rem;box-shadow:0 6px 14px rgba(99,102,241,.35)}
.meta{color:var(--suave);font-size:.9rem}
.etiqueta{display:inline-block;margin-top:.55rem;background:var(--primario-claro);color:var(--primario);border-radius:99px;padding:.1rem .75rem;font-size:.8rem;font-weight:600;height:fit-content}
.lista li:only-child:not(:has(.portada)){grid-column:1/-1;color:var(--suave);justify-content:center;padding:2rem}

/* Ficha / detalle / formulario */
.ficha,form:not(.filtros){max-width:640px}
.ficha{background:var(--tarjeta);border:1px solid var(--linea);padding:1.75rem;border-radius:var(--radio);box-shadow:var(--sombra)}
.ficha input,.ficha select,form:not(.filtros) input,form:not(.filtros) select{width:100%}
form:not(.filtros) p{margin:0 0 .9rem}
label{display:block;font-weight:600;margin:1rem 0 .25rem}
dl{display:grid;grid-template-columns:9rem 1fr;gap:.6rem 1rem}
dt{color:var(--suave)} dd{margin:0}
.aviso{background:var(--primario-claro);color:var(--texto);border:1px solid var(--linea);border-left:4px solid var(--primario);border-radius:10px;padding:.75rem 1rem;margin-bottom:1.25rem}
.error{color:var(--acento);font-size:.9rem}
.acciones{display:flex;gap:.6rem;margin-top:1.25rem;flex-wrap:wrap}

/* Paginación */
nav[role=navigation]{margin-top:1.75rem;color:var(--suave);font-size:.9rem}
nav[role=navigation]>div:first-child{display:none}
nav[role=navigation]>div:last-child{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:.75rem}
nav[role=navigation] p{margin:0}
nav[role=navigation] span.relative,nav[role=navigation] span.inline-flex{display:inline-flex;gap:.3rem;flex-wrap:wrap}
nav[role=navigation] a,nav[role=navigation] span[aria-disabled=true]>span,nav[role=navigation] span[aria-current=page]>span{display:inline-flex;align-items:center;min-width:2.2rem;justify-content:center;padding:.35rem .7rem;border:1px solid var(--linea);border-radius:8px;background:var(--tarjeta);color:var(--texto);text-decoration:none}
nav[role=navigation] a:hover{border-color:var(--primario);color:var(--primario)}
nav[role=navigation] span[aria-current=page]>span{background:var(--primario);border-color:var(--primario);color:#fff}
nav svg{width:1rem;height:1rem}

/* Imágenes, navegación y tablas */
.nav{display:flex;align-items:center;gap:.4rem;flex-wrap:wrap}
.nav a.enlace{padding:.45rem .8rem;border-radius:10px;color:var(--suave);font-weight:600}
.nav a.enlace:hover{background:var(--primario-claro);color:var(--primario)}
.portada{overflow:hidden}
.portada img{width:100%;height:100%;object-fit:cover;display:block}
.portada-grande{float:right;width:180px;margin:0 0 1rem 1.25rem;border-radius:12px;overflow:hidden;box-shadow:0 10px 24px rgba(28,32,51,.25);background:var(--primario-claro)}
.portada-grande img{width:100%;display:block}
.actual{display:flex;align-items:center;gap:1rem;margin:.4rem 0}
.actual img{width:72px;height:96px;object-fit:cover;border-radius:8px;box-shadow:var(--sombra)}
input[type=file]{padding:.5rem}
.check{display:flex;align-items:center;gap:.5rem;font-weight:500;margin:.4rem 0}
form:not(.filtros) .check input{width:auto}
.btn.chico{padding:.3rem .75rem;font-size:.85rem}
.barra{display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:1.25rem}
.tabla{list-style:none;margin:0;padding:0;display:grid;gap:.6rem}
.tabla li{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.85rem 1.1rem;background:var(--tarjeta);border:1px solid var(--linea);border-radius:var(--radio);box-shadow:var(--sombra)}
.tabla .fila-acciones{display:flex;gap:.5rem;align-items:center}
.inline{display:inline;margin:0;max-width:none}
.ficha::after{content:"";display:block;clear:both}
@media (max-width:640px){
  nav[role=navigation]>div:first-child{display:flex;justify-content:space-between;gap:.5rem}
  nav[role=navigation]>div:last-child{display:none}
  dl{grid-template-columns:1fr}
}
</style>
</head>
<body>
<header><div class="wrap">
  <a class="marca" href="{{ route('libros.index') }}">
    <span class="marca-icono"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></span>
    <span>Biblioteca Virtual</span>
  </a>
  <nav class="nav">
    <a class="enlace" href="{{ route('libros.index') }}">Catálogo</a>
    <a class="enlace" href="{{ route('autores.index') }}">Autores</a>
    <a class="enlace" href="{{ route('editores.index') }}">Editoriales</a>
    <a class="btn" href="{{ route('libros.create') }}">+ Agregar libro</a>
  </nav>
</div></header>
<main><div class="wrap">
  @if(session('ok'))<div class="aviso">{{ session('ok') }}</div>@endif
  @yield('content')
</div></main>
</body>
</html>
