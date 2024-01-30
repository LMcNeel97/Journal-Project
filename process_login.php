<?php

//Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Start Session
session_start();
global $pdo;

// Retrieve Data
$email_address = $_POST['email_address'];
$password = $_POST['password'];

try {
    // Database connection details
    $dbHost = '34.174.116.218';
    $dbName = 'dbqv8ubvtbfgg3';
    $dbUser = 'uwqkxcqccvglv';
    $dbPassword = 'G3A3dc%#67#n';


// Establish PDO connection
$pdo = new PDO("pgsql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if email and password are provided
if (empty($email_address) || empty($password)) {
    echo '<script>alert("Error: Please provide both Email and Password")</script>';
    exit;
}    

// Query to check for matching Account information in Accounts
$query_check_login = 'SELECT COUNT(*) as login from "Accounts" WHERE email_address = ? AND password = ? ';
$stmt_check_login = $pdo->prepare($query_check_login);
$stmt_check_login->execute([$email_address,$password]);
$login_count = $stmt_check_login->fetch((PDO::FETCH_ASSOC));
    

    if ($login_count['login'] == 1){
        //Query to recieve User Data for Session Token
        $query_fetch_user_data = 'SELECT "Account_ID", "firstname", "lastname" FROM "Accounts" WHERE email_address = ? AND password = ?';
        $stmt_fetch_user_data = $pdo->prepare($query_fetch_user_data);
        $stmt_fetch_user_data->execute([$email_address,$password]);
        $user_data = $stmt_fetch_user_data->fetch(PDO::FETCH_ASSOC);


            // Assign values from the $user_data array to variables
            $account_id = $user_data['Account_ID'];
            $lastname = $user_data['lastname'];
            $firstname = $user_data['firstname'];

            // Store Session Variables
            $_SESSION['Account_ID'] = $account_id;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['firstname'] = $firstname;


        // Successful Login Redirect to Journal.php
        //print_r($_SESSION);
        header('Location: journal_select.php');
        exit;
        }  else {
        // Failed login
        echo '<script>alert("Invalid email or password");
        window.location.href = "login_form.php";
        </script>';
} 
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}

?>