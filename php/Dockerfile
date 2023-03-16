FROM php:8.2-fpm

# Set XDG_CONFIG_HOME environment variable to /tmp
ENV XDG_CONFIG_HOME /tmp

# Install required packages and extensions
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        libmemcached-dev \
        && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd \
     && pecl install memcached && \
        docker-php-ext-enable memcached \
     && pecl install xdebug \
        && docker-php-ext-enable xdebug


# Copy php-fpm config file into the image
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY xdebug.ini /usr/local/etc/php/conf.d/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory and copy app code
WORKDIR /var/www/html
COPY . /var/www/html

# Set permissions on app directory
RUN chown -R www-data:www-data /var/www/html

# create a new linux user group called 'developer' with an arbitrary group id of '1001'
RUN groupadd -g 1000 developer

# create a new user called developer and add it to this group
RUN useradd -u 1000 -g developer developer

# change the owner and group of the current working directory to developer
COPY --chown=developer:developer . /var/www/html

# run all subsequent processes as this user
USER developer

# Expose port for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
