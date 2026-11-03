#!/bin/bash
set -e

# If no remote DB host is specified, start internal MariaDB
if [ -z "$DB_HOST" ] || [ "$DB_HOST" = "localhost" ] || [ "$DB_HOST" = "127.0.0.1" ]; then
    echo "[Info] No external DB_HOST provided. Starting internal MariaDB service..."
    service mariadb start || /etc/init.d/mariadb start

    # Wait for MariaDB to be ready
    for i in $(seq 1 30); do
        if mariadb-admin ping --silent 2>/dev/null || mysqladmin ping --silent 2>/dev/null; then
            break
        fi
        echo "[Info] Waiting for MariaDB to start..."
        sleep 1
    done

    # Run database initialization if database.sql exists
    if [ -f /var/www/html/database.sql ]; then
        echo "[Info] Importing database schema..."
        mariadb < /var/www/html/database.sql 2>/dev/null || mysql < /var/www/html/database.sql 2>/dev/null || true
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
