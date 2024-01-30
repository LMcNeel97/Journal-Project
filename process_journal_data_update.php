<?php
session_start();
require_once 'db_connection.php';

//Error Reporting Settings
//error_reporting(E_ALL);
//ini_set('display_errors', '1');


try {
//Assign account_id variable using Session[account_id]
$account_id = $_SESSION['Account_ID'];

$journal_query = "SELECT journal_id, journal_name, description FROM journals WHERE \"Account_ID\" = ?";
$stmt_fetch_journals = $pdo->prepare($journal_query);
$stmt_fetch_journals->execute([$account_id]);
$journals = $stmt_fetch_journals->fetchAll(PDO::FETCH_ASSOC);

// Print the data to the PHP error log
error_log(print_r($journals, true));


// Encode the result as JSON
$jsonResponse = json_encode($journals);


if ($jsonResponse === false) {
    // Handle JSON encoding error, if any
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(array('error' => 'JSON encoding error'));
} else {
    // Return data as JSON for JS script
    header('Content-Type: application/json');
    echo $jsonResponse;
}
} catch (PDOException $e) {
// Handle any database-related errors here
header("HTTP/1.1 500 Internal Server Error");
echo json_encode(array('error' => $e->getMessage()));
}