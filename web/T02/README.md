# RA02 - Estructura y archivos (Organizados)

Estructura propuesta y archivos principales:

- public/: Archivos accesibles desde el navegador (punto de entrada). Contiene además los assets públicos en `public/assets/` y los includes reutilizables en `public/includes/`.
- src/: Código reutilizable (helpers, configuración).
- data/: Archivos de datos como `productos.txt`.
- docs/: Documentación.
- docker/: Dockerfile y docker-compose para ejecutar el proyecto en contenedor.
- scripts/: Scripts de ayuda para desarrollo.

Archivos principales en `public/`:
- index.php, productos.php, calculadora.php, frases.php, tipos.php, variables.php, ra02c.php, ra02f.php
- includes/: header.php, footer.php
- assets/: css/style.css

Utilidades en `src/`:
- config.php: constante APP_NAME
- helpers.php: funciones para leer productos y formatear precios

Probar localmente (servidor embebido PHP):

```bash
cd /Users/alex/Escritorio/DWES/T02
php -S localhost:8000 -t public
```

Abrir en navegador: http://localhost:8000

Probar con Docker Compose (recomendado si usas Docker Desktop):

```bash
# desde la raíz del proyecto
docker compose -f docker/docker-compose.yml up --build -d
# luego abrir http://localhost:8000
```

Notas:
- La zona pública es `public/`. Mantén la lógica reutilizable en `src/` y los datos en `data/`.
- Si quieres que automatice la creación de un include de navegación más completo o añada tests simples, dímelo y lo añado.

## Scripts útiles añadidos
He añadido dos scripts en `scripts/` para facilitar el arranque y las comprobaciones:

- `scripts/run.sh` — helper para arrancar/parar el servidor embebido de PHP apuntando a `public/`.
  Uso:
  ```bash
  # arrancar en puerto 8000 (por defecto)
  ./scripts/run.sh start
  # arrancar en puerto 8080
  ./scripts/run.sh start 8080
  # detener
  ./scripts/run.sh stop
  # comprobar estado
  ./scripts/run.sh status
  ```
  El script guarda el PID en `/tmp/php-server.pid` y los logs en `/tmp/php-server.log`.

- `scripts/check_pages.sh` — comprueba las rutas principales con `curl` (por defecto puerto 8000). Uso:
  ```bash
  # comprobar páginas en localhost:8000
  ./scripts/check_pages.sh
  # comprobar en otro puerto p. ej. 8080
  ./scripts/check_pages.sh 8080
  ```

Notas:
- Ambos scripts se crearon para pruebas locales rápidas en macOS/Linux.
- `run.sh start` abre automáticamente la URL en el navegador si el comando `open` está disponible (macOS).
