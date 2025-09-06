# laravel-docker-template
# 間に合いませんでした。

# contact-fome-test

## 環境構築
git clone git@github.com:Estra-Coachtech/
mv laravel-docker-template 
docker-compose up -d --build
docker-compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
http://localhost

## 使用技術(実行環境)
PHP 8.1
Laravel 8.x
MySQL 8.0
Nginx 1.21
Docker / Docker Compose

## ER図
< - - - 作成したER図の画像 - - - >

## URL
- 例) 開発環境：http://localhost/