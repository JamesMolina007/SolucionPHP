# Configuración del proyecto

Este proyecto está desarrollado en PHP y requiere ciertas configuraciones para su correcto funcionamiento. A continuación se detallan los pasos necesarios para configurar el entorno:

## Configurar archivo php.ini

Para poder utilizar más memoria, esperar más tiempo y habilitar el uso de mySQL, es necesario ajustar las siguientes configuraciones en el archivo `php.ini`:

- `max_execution_time = 600`
- `memory_limit = 512M`
- `extension=php_mysqli.dll`

Asegúrate de ubicar el archivo `php.ini` correspondiente a tu instalación de PHP y realizar los cambios necesarios.

## Iniciar el servidor

Para iniciar el servidor y ejecutar la aplicación, sigue los siguientes pasos:

1. Abre una línea de comandos o terminal.
2. Navega hasta la carpeta que contiene los archivos del proyecto.
3. Ejecuta el siguiente comando: php -S localhost:8080


Esto iniciará el servidor y la aplicación estará disponible en `http://localhost:8080`.

## Configuración de la base de datos

Para configurar la base de datos, debes editar el archivo `global.php` y realizar las modificaciones necesarias en las definiciones correspondientes.

## Crear y rellenar la base de datos

Si deseas crear la base de datos o rellenarla con 300,000 registros aleatorios, sigue los siguientes pasos:

1. Abre tu navegador web.
2. Accede a la siguiente URL: http://localhost:8080/CrearDb.php


Esto ejecutará el script correspondiente para crear la base de datos y rellenarla con los registros aleatorios.

## Interfaz principal

Una vez que hayas realizado todas las configuraciones anteriores y configurado la base de datos, puedes acceder a la interfaz principal de la aplicación. Simplemente abre tu navegador y accede a la siguiente URL: http://localhost:8080




