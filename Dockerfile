FROM php:8.2-apache

# Install MariaDB server and client, and SSL CA certificates
RUN apt-get update && apt-get install -y --no-install-recommends \
    mariadb-server \
    mariadb-client \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP database extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Initialize MariaDB data directory and set permissions during build
RUN mkdir -p /var/run/mysqld /var/lib/mysql /var/log/mysql && \
    chown -R mysql:mysql /var/run/mysqld /var/lib/mysql /var/log/mysql && \
    mariadb-install-db --user=mysql --datadir=/var/lib/mysql

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Ensure entrypoint is executable and set correct permissions
RUN chmod +x /var/www/html/entrypoint.sh && \
    chown -R www-data:www-data /var/www/html

ENV PORT=80
EXPOSE 80

ENTRYPOINT ["/var/www/html/entrypoint.sh"]
