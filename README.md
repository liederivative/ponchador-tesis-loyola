# Proyecto Ponchador
Tesis en el area de Redes y Telecomunicaciones del IEESL - 2017-2018.

---
## Intalación
---
### Requisitos

> Composer  >= 1.4.0 |  [windows](https://getcomposer.org/download/)
> 
> php 5.6 |  [windows](http://windows.php.net/download/)
> 
> MySQL >= 5.6 | [windows](https://dev.mysql.com/downloads/)
>
> Microsoft Drivers for PHP for SQL Server | [windows](https://www.microsoft.com/en-us/download/details.aspx?id=20098)

### Pasos
1. Clonar este repositorio: `git clone https://github.com/liederivative/ponchador-tesis-loyola`

2. Dirigirse al directorio `/app` en una terminal y instalar dependencias  usando  `composer install`.

3. Editar el archivo `.env` dentro del directorio `/app` y modificar 
DB_CONNECTION=mysql
DB_HOST=[`IP`]<-- default 127.0.0.1
DB_PORT=[`puerto`]<--default 3306
DB_DATABASE=mescyt_ponche
DB_USERNAME=[`usuario full privileges `]<--default root
DB_PASSWORD=[`password de conexión`]<--default 1234

4. Crear una base de datos en MySQL de nombre `mescyt_ponche`, necesita ese nombre para poder funcionar como matriz. 

5. dentro del directorio `/app` en la terminal ejecutar `php artisan migrate` , se crea el schema para la base de datos de la Mescyt. 
- Luego ejecutar `php artisan db:seed` para generar el usuario `root` con clave por defecto de `123456`.

6. Si tiene WAMP/XAMP copiar todo el  contenido del directorio en `/www` como raíz, con rutas http://localhost/folder/ no funcionará con la configuración por default. En caso de no tener un server, usar `php artisan serve` ejecutar un server.

---
## Aplicación
---
### Rutas 


----------

/admin  :  Administración de usuario y universitarios para el usuario root en la base de datos de la `mescyt_ponche`.

----------


