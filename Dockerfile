# Sử dụng image PHP chính thức
FROM php:8.2-fpm

# Cài đặt các tiện ích hệ thống và các phần mở rộng PHP cần thiết
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Sao chép tệp composer.json và composer.lock trước khi sao chép toàn bộ mã nguồn
COPY composer.json composer.lock ./

# Cài đặt các phụ thuộc của dự án
RUN composer install --no-scripts --no-autoloader

# Sao chép toàn bộ mã nguồn vào container
COPY . .

# Chạy lệnh khởi tạo
RUN composer dump-autoload --optimize

# Chạy lệnh khởi tạo
CMD php artisan serve --host=0.0.0.0 --port=8000
