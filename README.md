# DWES - Proyecto de ejemplos y prácticas

Este repositorio contiene varios ejercicios y módulos de ejemplo para la asignatura DWES (Desarrollo Web en Entorno Servidor). Incluye un pequeño entorno con Docker, ejemplos PHP y varios ejercicios por unidades (unit-02, unit-03, unit-04...).

Contenido principal

- `docker/`: configuración para levantar un entorno con Apache + PHP (contenedor) y ficheros de configuración.
- `web/`: código PHP público y módulos por unidades.
  - `unit-02/`
  - `unit-03/`
  - `unit-04/`
    - `sesiones/`: aplicación de ejemplo sobre sesiones (contador, guardar nombre, ver tiempo de sesión).

Objetivo

Proveer ejemplos prácticos y ejercicios listos para ejecutar y modificar. El código está estructurado para estudiar controladores, vistas e includes en PHP (sin framework), con pequeñas utilidades y ficheros de configuración.

Requisitos

- macOS / Linux / Windows con terminal (en las instrucciones se muestran comandos para zsh/bash).
- PHP 7.4+ (para ejecutar localmente con servidor embebido) o Docker.

Ejecución con Docker (recomendado para replicar entorno)

El `docker/docker-compose.yml` incluido configura un servicio `web` con la siguiente información relevante:

- Imagen: `php:8.2-apache`
- Mapeo de puertos: `8000:80` (accede desde tu host a `http://localhost:8000`)
- Volúmenes montados:
  - `../web` → `/var/www/html` (código fuente)
  - `./config/php.ini` → `/usr/local/etc/php/php.ini:ro`
  - `./config/apache.conf` → `/etc/apache2/sites-available/000-default.conf:ro`
- Comando de arranque del contenedor (se encarga de permisos, habilitar `rewrite` y arrancar Apache):
  - chown recursivo, ajustar permisos, `a2enmod rewrite`, establecer `ServerName localhost` y ejecutar `apache2-foreground`.

Levantar con Docker Compose (desde la raíz del proyecto):

```bash
cd /Users/alex/Escritorio/DWES/docker
docker-compose up --build
```

- El servicio quedará disponible en `http://localhost:8000`.
- Para detenerlo: `docker-compose down`.
- Ver logs en tiempo real: `docker-compose logs -f` o `docker logs -f dwes_web`.

Ejecución con servidor PHP embebido (rápido para desarrollo)

Si prefieres no usar Docker, puedes lanzar rápidamente el módulo de sesiones con el servidor embebido de PHP:

```bash
cd /Users/alex/Escritorio/DWES/web/unit-04/sesiones/public
php -S localhost:8000
```

Luego abre en el navegador:

- Índice del módulo: http://localhost:8000/index.php
- Página principal (index público): http://localhost:8000/index.php?page=home
- Acceder al módulo de sesiones: http://localhost:8000/index.php?page=sesion

Notas sobre rutas y `baseUrl`

- El front controller de `unit-04/sesiones` hace un ruteo simple usando `?page=...`. Para evitar problemas con rutas cuando el módulo está en subdirectorios, el código calcula `baseUrl` con `dirname($_SERVER['SCRIPT_NAME'])` y construye las rutas a los assets de forma robusta.

Probar la función "Reiniciar sesión"

Flujo esperado:

1. Desde la vista `sesionActiva.php` hay un enlace que apunta a `index.php?page=sesion&reset=1` (la ruta respeta `baseUrl` si el módulo está en un subdirectorio).
2. El front controller (`public/index.php`) envía la petición a `SesionController.php`.
3. `SesionController.php` detecta `reset`, destruye la sesión y redirige al índice público del módulo (`index.php`).

Comprobar con curl (seguirá redirecciones con -L):

```bash
curl -i -L 'http://localhost:8000/index.php?page=sesion&reset=1'
```

Deberías ver un primer 302 (o similar) de `SesionController` y finalmente una respuesta 200 del `index.php` del módulo.

Mejoras recientes de estilo (botones)

- Si notabas que el texto blanco de los botones no se leía bien, se aplicaron cambios en `web/assets/css/style.css` para mejorar la legibilidad:
  - variable CSS `--btn-text` (por defecto `#ffffff`) configurable en `:root`.
  - mayor `font-weight`, `text-shadow`, `box-shadow` y `border` más visibles.

Cambiar a texto oscuro por defecto

Si prefieres que los botones usen texto oscuro por defecto (alto contraste), edita `web/assets/css/style.css` en la sección `:root` y cambia:

```css
--btn-text: #111111;
```

Estructura de archivos (resumen relevante)

```
/ docker/
  ├─ docker-compose.yml
  └─ Dockerfile
/ web/
  ├─ index.php  (front controller general)
  ├─ assets/css/styleHome.css
  └─ unit-04/
     └─ sesiones/
        ├─ public/index.php   (front controller del módulo)
        ├─ src/
        │  ├─ controllers/
        │  │  ├─ SesionController.php
        │  │  ├─ ContadorController.php
        │  │  └─ UsuarioController.php
        │  └─ views/
        │     ├─ sesionActiva.php
        │     └─ layout/
        └─ assets/css/style.css
```

Buenas prácticas y consejos

- Si editas CSS/JS/plantillas, limpia la caché del navegador para ver cambios (Cmd+Shift+R en la mayoría de navegadores).
- Usa el servidor embebido de PHP para pruebas rápidas (no recomendado para producción).
- Si usas Docker, configura volúmenes para poder editar archivos sin rebuild si lo deseas.
- Si el módulo está embebido dentro de otro front controller o subdirectorio, verifica `baseUrl` y las rutas a `assets`.

Contribuir

1. Crea una rama para tu cambio:

```bash
git checkout -b feat/mi-mejora
```

2. Haz commits claros y abre un pull request.

3. Revisa localmente con Docker o el servidor embebido antes de abrir el PR.

Licencia

- Añade aquí la licencia que prefieras (por ejemplo MIT) o conserva según la política del curso.

Contacto / Soporte

Si quieres que adapte el README a otro formato, añada más instrucciones de despliegue (por ejemplo configuración concreta de Apache, MySQL o detallar la configuración Docker), o prefieres que aplique cambios visuales (botones con texto oscuro por defecto), dime qué quieres y lo hago.
