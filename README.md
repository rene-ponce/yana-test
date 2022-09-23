# Instrucciones

La prueba fue desarrollada con la siguiente tecnología.

- PHP 8
- Framework Laravel 9
- MySQL 8
- Docker

## Endpoints

- Registro de usuario: [POST] http://localhost:8000/api/register
- Login: [POST] http://localhost:8000/api/login
- Obtener mensajes: [POST] http://localhost:8000/api/get-conversations

## Instalación

Clonar repositorio

```sh
git clone https://github.com/rene-ponce/yana-test.git
```

Una vez clonado entrar acceder al folder yana-test e instalar dependencias mediante composer

```sh
cd yana-test
composer install
```

Renombrar el archivo **.env.example** por **.env** y configurar credenciales para la base de datos.
Si se desea usar docker para levantar la base de datos se tiene que ejecutar el siguiente comando.
```sh
docker-compose up
```
**Importante:** Se desarrollo en una Mac con el procesador M1 por lo que si se ejecuta en algún equipo con diferente procesador será necesario cambiar la imagen de MySQL en el archivo **docker-compose.yml**

Una vez configurada las credenciales de la base de datos será necesario crear las tablas mediante el siguiente comando
```sh
php artisan migrate
```

Para levantar el proyecto ejecutar el siguiente comando
```sh
php artisan serve
```
