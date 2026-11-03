FROM php:8.2-apache

# Install MariaDB (for optional self-contained local database) and SSL CA certificates
RUN apt-get update && apt-get install -y --no-install-recommends \
    mariadb-server \
    mariadb-client \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP database extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Prepare directory for MariaDB socket and files
RUN mkdir -p /var/run/mysqld && chown -R mysql:mysql /var/run/mysqld /var/lib/mysql

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Ensure entrypoint is executable and set correct web permissions
RUN chmod +x /var/www/html/entrypoint.sh && \
    chown -R www-data:www-data /var/www/html

# Default port
ENV PORT=80
EXPOSE 80

# Run entrypoint script
ENTRYPOINT ["/var/www/html/entrypoint.sh"]
