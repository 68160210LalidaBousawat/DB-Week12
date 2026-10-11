<?php
// For local development only. Use environment variables on a shared server.
// Real credentials (e.g. Angsila) go in secret/config.php, which is ignored by Git.
if (is_file(__DIR__ . '/../secret/config.php')) require __DIR__ . '/../secret/config.php';
$host = $DB_HOST ?? (getenv('DB_HOST') ?: 'localhost');
$user = $DB_USER ?? (getenv('DB_USER') ?: 'root');
$pass = $DB_PASS ?? (getenv('DB_PASS') ?: '');
$dbname = $DB_NAME ?? (getenv('DB_NAME') ?: 'resume_lab');
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { error_log(mysqli_connect_error()); http_response_code(500); exit('Database unavailable'); }