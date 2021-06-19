#!/usr/bin/bash

#清理配置缓存
php artisan config:clear

#生成配置缓存
# php artisan config:cache

#清理配置缓存
php artisan route:clear

#生成配置缓存
# php artisan route:cache

#清理缓存
php artisan cache:clear
