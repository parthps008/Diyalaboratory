<?php
// Disable default fatal exceptions in PHP 8.2 so connection fallback logic can run
mysqli_report(MYSQLI_REPORT_OFF);

$db_url = getenv('DATABASE_URL') ?: getenv('MYSQL_URL');

if ($db_url) {
    $parsed_url = parse_url($db_url);
    $servername = $parsed_url['host'] ?? '127.0.0.1';
    $port       = isset($parsed_url['port']) ? (int)$parsed_url['port'] : 3306;
    $username   = $parsed_url['user'] ?? 'root';
    $password   = $parsed_url['pass'] ?? '';
    $database   = isset($parsed_url['path']) ? ltrim($parsed_url['path'], '/') : 'diya_laboratory';
} else {
    $servername = getenv('DB_HOST') ?: "127.0.0.1";
    $username   = getenv('DB_USER') ?: "root";
    $password   = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : "";
    $database   = getenv('DB_NAME') ?: "diya_laboratory";
    $port       = getenv('DB_PORT') ? (int)getenv('DB_PORT') : 3306;
}

$conn = mysqli_init();
if (!$conn) {
    die("Database error: mysqli_init failed");
}

$use_ssl = (
    getenv('DB_SSL') === 'true' || 
    getenv('MYSQL_ATTR_SSL_CA') || 
    strpos($servername, 'tidbcloud.com') !== false || 
    strpos($servername, 'aivencloud.com') !== false
);

// 5 second connection timeout
mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

if ($use_ssl) {
    $ca_path = getenv('MYSQL_ATTR_SSL_CA') ?: '/etc/ssl/certs/ca-certificates.crt';
    if (file_exists($ca_path)) {
        mysqli_ssl_set($conn, NULL, NULL, $ca_path, NULL, NULL);
    } else {
        mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    }
    $connected = @mysqli_real_connect($conn, $servername, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL);
} else {
    // Try primary connection
    $connected = @mysqli_real_connect($conn, $servername, $username, $password, $database, $port);

    // If local connection failed, try alternate host (127.0.0.1 <-> localhost)
    if (!$connected && ($servername === "127.0.0.1" || $servername === "localhost")) {
        $alt_host = ($servername === "127.0.0.1") ? "localhost" : "127.0.0.1";
        $conn = mysqli_init();
        mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
        $connected = @mysqli_real_connect($conn, $alt_host, $username, $password, $database, $port);
        if ($connected) {
            $servername = $alt_host;
        }
    }
}

// Fallback: If database doesn't exist yet, connect to host to create it
if (!$connected) {
    $fallback = mysqli_init();
    mysqli_options($fallback, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
    if ($use_ssl) {
        $temp_connected = @mysqli_real_connect($fallback, $servername, $username, $password, null, $port, NULL, MYSQLI_CLIENT_SSL);
    } else {
        $temp_connected = @mysqli_real_connect($fallback, $servername, $username, $password, null, $port);
    }

    if ($temp_connected) {
        mysqli_query($fallback, "CREATE DATABASE IF NOT EXISTS `" . mysqli_real_escape_string($fallback, $database) . "`");
        mysqli_close($fallback);

        // Reconnect to target database
        $conn = mysqli_init();
        if ($use_ssl) {
            $connected = @mysqli_real_connect($conn, $servername, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL);
        } else {
            $connected = @mysqli_real_connect($conn, $servername, $username, $password, $database, $port);
        }
    }
}

if (!$connected) {
    die("<div style='font-family:Arial,sans-serif;padding:30px;max-width:600px;margin:50px auto;border:1px solid #e2e8f0;border-radius:10px;background:#f8fafc;box-shadow:0 4px 6px rgba(0,0,0,0.05);'>
        <h3 style='color:#dc2626;margin-top:0;'>Database Connection Failed</h3>
        <p>Could not connect to database on <code>" . htmlspecialchars($servername) . ":" . htmlspecialchars((string)$port) . "</code>.</p>
        <p><strong>Error:</strong> " . htmlspecialchars(mysqli_connect_error()) . "</p>
        <p style='color:#64748b;font-size:14px;margin-bottom:0;'>If you are using a cloud database, please verify your DB_HOST, DB_USER, DB_PASSWORD, and DB_PORT on Render.</p>
    </div>");
}

// Auto-initialize required tables if not already present
$tables_check = mysqli_query($conn, "SHOW TABLES LIKE 'admin'");
if ($tables_check && mysqli_num_rows($tables_check) == 0) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `admin` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(100) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "INSERT IGNORE INTO `admin` (`username`, `password`) VALUES ('admin', 'admin123')");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `patients` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(150) NOT NULL,
        `email` VARCHAR(150) NOT NULL UNIQUE,
        `phone` VARCHAR(50) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `appointments` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `patient_id` INT NOT NULL,
        `test_name` VARCHAR(150) NOT NULL,
        `appointment_date` DATE NOT NULL,
        `status` VARCHAR(50) DEFAULT 'Pending',
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `contact_messages` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(150) NOT NULL,
        `email` VARCHAR(150) NOT NULL,
        `message` TEXT NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}
?>
