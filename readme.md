# Questions & Answers

Proyecto basado en una web de preguntas y respuestas, similar a Stackoverflow.

## Status

![db](https://img.shields.io/badge/database-passing-brightgreen.svg) ![status](https://img.shields.io/badge/status-wip-brightgreen.svg) ![bs](https://img.shields.io/badge/version-0.0.9-brightgreen.svg) ![issues](https://img.shields.io/badge/issues-3-orange.svg) ![commits](https://img.shields.io/badge/commits-10-blue.svg)

---

## Sobre el proyecto

Para poner en marcha el proyecto, necesitamos una serie de componentes:

- [PHP](http://php.net/manual/es/install.php)
- [Composer](https://getcomposer.org/download/) 
- [Node.js](https://nodejs.org/es/)
- [VitualBox](https://www.virtualbox.org/wiki/Downloads)

---
Una vez descargado e instalado todo, nos dirigimos a la terminal, y nos posicionamos en la ubicación donde va a estar el proyecto.

```git clone https://github.com/AdryDev92/Q-A-webApp.git```

## Configuración del proyecto

Nos dirigimos a la carpeta `/Homestead` y modificamos el archivo `homestead.yaml`. Para ello abrimos un `vi homestead.yaml` y añadimos la ruta del **folder**, los **sites** y la **database**:

![Imgur](https://i.imgur.com/1XzrZFH.png)



Una vez hecho, nos dirigimos a `etc/` y abrimos el archivo `hosts` y añadimos la ip  del archivo `homestead.yaml`.

Ya con todo modificado, ponemos el servidor en marcha, dependiendo del que usemos (Vagrant, Mamp, etc...)

**_Si usamos vagrant, ubicados en la carpeta `Homestead/` en la terminal, lanzamos el comando `vagrant up --provision`._**

---

Una vez hecho todo, renombramos el archivo `.env.example` a `.env` y lo modificamos con los datos correspondiente a nuestra base de datos.

Para generar la APP_KEY, utilizaremos el siguiente comando en la terminal, situado en la carpeta del proyecto:

`php artisan key:generate`

## Instalación de componentes

Para instalar los componentes necesarios, desde la terminal, utilizamos el siguiente comando:

```bash
npm install
```

Para tener toda la base de datos correctamente disponible, utilizamos el siguiente comando para hacer la migración de las tablas:

```bash
php artisan migrate
```

## Funcionalidades

**Como usuario logeado**:

- Crear y responder preguntas.
- Votar por mejores respuestas.
- Visualizar perfiles de otros usuarios.
- Creación y respuesta rápida de preguntas.
- Búsqueda de preguntas según categorías o hashtags.
- Modificar información personal de perfil.
- Editar y borrar tus preguntas.
- Rol de **user** y **admin**.

**Como usuario NO logeado**:

- Registro.
- Login (en caso de estar ya registrado).
- Visualizar lista de preguntas de la página principal.
