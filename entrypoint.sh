#!/bin/bash
set -e

# If no remote DB host is specified, start internal MariaDB
if [ -z "$DB_HOST" ] || [ "$DB_HOST" = "localhost" ] || [ "$DB_HOST" = "127.0.0.1" ]; then
    echo "[Info] No external DB_HOST provided. Starting internal MariaDB service..."
    mkdir -p /var/run/mysqld /var/log/mysql
    chown -R mysql:mysql /var/run/mysqld /var/lib/mysql /var/log/mysql

    # Initialize MariaDB data directory if not present
    if [ ! -d "/var/lib/mysql/mysql" ]; then
        echo "[Info] Initializing MariaDB data directory..."
        mariadb-install-db --user=mysql --datadir=/var/lib/mysql >/dev/null 2>&1 || mysql_install_db --user=mysql --datadir=/var/lib/mysql >/dev/null 2>&1 || true
    fi

    # Start MariaDB service
    /etc/init.d/mariadb start || service mariadb start || mariadbd-safe --user=mysql &

    # Wait for MariaDB to be ready
    for i in $(seq 1 30); do
        if mariadb-admin ping --silent 2>/dev/null || mysqladmin ping --silent 2>/dev/null; then
            break
        fi
        echo "[Info] Waiting for MariaDB to start..."
        sleep 1
    done

    # Ensure root access without password for both localhost and 127.0.0.1
    mariadb -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '';" 2>/dev/null || true
    mariadb -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;" 2>/dev/null || true
    mariadb -e "CREATE USER IF NOT EXISTS 'root'@'127.0.0.1' IDENTIFIED BY '';" 2>/dev/null || true
    mariadb -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;" 2>/dev/null || true
    mariadb -e "FLUSH PRIVILEGES;" 2>/dev/null || true

    # Create database and import schema if database.sql exists
    if [ -f /var/www/html/database.sql ]; then
        echo "[Info] Importing database schema..."
        mariadb -e "CREATE DATABASE IF NOT EXISTS diya_laboratory;" 2>/dev/null || true
        mariadb diya_laboratory < /var/www/html/database.sql 2>/dev/null || mysql diya_laboratory < /var/www/html/database.sql 2>/dev/null || true
    fi
else
    echo "[Info] External DB_HOST ($DB_HOST) detected. Connecting to remote database..."
fi

# Configure Apache port dynamically if PORT environment variable is set by Render
if [ -n "$PORT" ]; then
    echo "[Info] Configuring Apache to listen on port $PORT..."
    sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
    sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:$PORT>/g" /etc/apache2/sites-available/000-default.conf
fi

echo "[Info] Starting Apache web server..."
exec apache2-foreground
