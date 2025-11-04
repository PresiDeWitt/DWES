Propuesta de estructura de directorios (versión actualizada)

T02/ (raíz del proyecto)
├─ public/            # DocumentRoot - archivos públicos (vistas, endpoints, assets públicos)
│  ├─ index.php
│  ├─ productos.php
│  ├─ calculadora.php
│  ├─ frases.php
│  ├─ tipos.php
│  ├─ variables.php
│  ├─ ra02c.php
│  ├─ ra02f.php
│  ├─ includes/       # cabeceras/footers/reutilizables (header.php, footer.php)
│  └─ assets/         # CSS, JS, imágenes públicos
│     └─ css/
│        └─ style.css
├─ src/               # Lógica reutilizable, helpers, configuración
│  ├─ config.php
│  └─ helpers.php
├─ data/              # Archivos de datos (productos.txt)
├─ docs/              # Documentación del proyecto
├─ docker/            # Dockerfile y docker-compose
├─ scripts/           # scripts útiles para desarrollo
└─ README.md

Notas:
- Para ejecutar el servidor embebido de PHP apuntando al `public` como raíz:

```bash
cd /Users/alex/Escritorio/DWES/T02
php -S localhost:8000 -t public
```

- La intención es separar claramente la zona pública (`public/`) de la lógica (`src/`) y los datos (`data/`).
