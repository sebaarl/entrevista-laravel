# Ejecución de un código Evaluación-Laboral


## Requisitos previos

Asegúrate de tener instalado PHP en tu sistema. Puedes verificarlo en tu terminal.

```bash
php --version
```

Instala Composer si aún no lo has hecho. Puedes descargarlo desde getcomposer.org.

## Descargar código fuente

Clona el repositorio desde GitHub:

```bash
git clone https://github.com/sebaarl/entrevista-laravel.git
```

## Instala las dependencias

 + Abre una terminal y navega hasta la carpeta raíz del proyecto Laravel.

```bash
cd <NOMBRE_DEL_PROYECTO>
```

 + Ejecuta el siguiente comando para instalar las dependencias del proyecto:

```bash
composer install
```

## Configura el archivo de entorno

 + Renombra el archivo .env.example a .env.

```bash
cp .env.example .env
```

 + Abre el archivo .env y ajusta la configuración de la base de datos y de envio de emails.

## Genera la clave de la aplicación

En la terminal, ejecuta el siguiente comando para generar una clave de aplicación única:

```bash
php artisan key:generate
```

## Ejecuta las migraciones

Para configurar la base de datos, ejecuta las migraciones utilizando el siguiente comando:

```bash
php artisan migrate
```

## Inicia el servidor de desarrollo

Utiliza el siguiente comando para iniciar el servidor de desarrollo de Laravel:

```bash
php artisan serve
```
