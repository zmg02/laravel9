# 使用 PHP 8.1 的官方镜像
FROM php:8.1-fpm

# 安装系统依赖
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip

# 安装 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 设置工作目录
WORKDIR /var/www/html

# 安装 Laravel
RUN composer create-project --prefer-dist laravel/laravel:^9.0 .

# 设置文件权限
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage

# 复制项目文件到容器中
COPY . .

# 复制默认的环境配置文件
RUN cp .env.example .env

# 安装 PHP 扩展
RUN docker-php-ext-install pdo_mysql pdo_pgsql zip

# 生成应用密钥
RUN php artisan key:generate

# 运行 Laravel 服务
CMD php artisan serve --host=0.0.0.0 --port=8000

