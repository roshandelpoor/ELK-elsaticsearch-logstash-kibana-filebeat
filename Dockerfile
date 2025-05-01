FROM php:8.2-fpm-alpine

# Set PHP to log to stderr
RUN echo "display_errors=On" >> /usr/local/etc/php/php.ini \
 && echo "error_log=/proc/self/fd/2" >> /usr/local/etc/php/php.ini

# Configure PHP-FPM to forward logs to Docker stdout/stderr
RUN echo "catch_workers_output = yes" >> /usr/local/etc/php-fpm.d/www.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
