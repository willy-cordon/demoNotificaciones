# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).




##Colas de trabajo Lumen

- Crear las tablas que registran las colas de trabajo (php artisan queue:table)
- Crear las tablas que registran las fallas de las colas (php artisan queue:failed-table)
- Habilitar los queue desde boostrap/app
- No tiene comandos artisan para crear las colas en su lugar se usa el jobExample
- https://lumen.laravel.com/docs/8.x/queues

#Comandos
- php artisan queue:work   (ejecuta la cola de trabajos)
- php artisan queue:retry all   (vuelve a poner los trabajos fallidos a la cola de trabajos)
