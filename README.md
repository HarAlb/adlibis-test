<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Adlibis Test Project

Простое Laravel-приложение с Docker для локальной разработки.

**Технологии:**
- PHP 8.2
- Laravel 11
- MySQL 8
- Nginx
- Redis

---

## 1. Подготовка

1. Клонируем репозиторий:

```bash
git clone https://github.com/HarAlb/adlibis-test
cd adlibis-test
```

2. Убедитесь, что Docker и Docker Compose установлены.
3. Добавьте домен в hosts:

````bash
127.0.0.1 adlibis-test-app.test
````

## 2. Docker

Все сервисы используют кастомные имена контейнеров, чтобы не мешать другим проектам.

### 2.1 Сервисы

    app — PHP-FPM контейнер (adlibis_laravel_app)
    nginx — веб-сервер (adlibis_nginx)
    db — MySQL 8 (adlibis_mysql_db)
    redis — кеш (adlibis_redis)

## 3. Настройка Laravel

#### 3.1 Установите зависимости Composer:
````bash
docker exec -it adlibis_laravel_app composer install
````

#### 3.2 Создайте .env:
````bash
docker exec -it adlibis_laravel_app cp .env.example .env
````
#### 3.3 Настройте .env для подключения к MySQL:

````bash
DB_CONNECTION=mysql
DB_HOST=adlibis_mysql_db
DB_PORT=3306
DB_DATABASE=highload_laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

REDIS_HOST=adlibis_redis
````

#### 3.4  Генерируем ключ приложения:
````bash
docker exec -it adlibis_laravel_app php artisan key:generate
````
#### 3.5. Миграции и сиды
````bash
docker exec -it adlibis_laravel_app php artisan migrate --seed
````
