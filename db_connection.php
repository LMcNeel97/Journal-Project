<?php
// Database connection details
$dbHost = '34.174.116.218';
$dbName = 'dbqv8ubvtbfgg3';
$dbUser = 'uwqkxcqccvglv';
$dbPassword = 'G3A3dc%#67#n';

try {
    // Establish PDO connection
    $pdo = new PDO("pgsql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . ($e->getMessage()));
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
