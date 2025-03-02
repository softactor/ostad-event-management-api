FROM php:8.2-apache

# Update package lists and install dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    nano \
    imagemagick \
    libmagickwand-dev \
    ca-certificates \
    gnupg2 \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd mbstring zip pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable imagick

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html/public

# Copy existing application directory
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
