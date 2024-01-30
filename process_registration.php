<?php

//Error Reporting Settings
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

// Retrieve Data

$email_address = $_POST['email_address'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

// Connecting, selecting database
$dbconn = pg_connect("host=34.174.116.218 dbname=dbqv8ubvtbfgg3 user=uwqkxcqccvglv password=G3A3dc%#67#n")
    or die('Could not connect: ' . pg_last_error());

// Checking for duplicate email addresses
$query_check_email = 'SELECT COUNT(*) as email FROM "Accounts" WHERE email_address = ($1)';
$result_check_email = pg_query_params($dbconn, $query_check_email, array($email_address));


if ($result_check_email !== false) {
    echo "Great Success";
} else {
    echo "Error Checking email address: " . pg_last_error($dbconn);
    pg_close($dbconn);
    exit;
}


// Fetch the result only if the query was successful
$email_count = pg_fetch_array($result_check_email);

var_dump($result_check_email);


// Check if the email address already exists (duplicate)
if ($email_count['email'] > 0) {
    echo "<script>alert('Email Address is already in use.');
    window.location.href = 'new_account.php';
    </script>";
    pg_close($dbconn);
    exit;
}

// If no duplicats, insert information
$query = 'INSERT INTO "Accounts" ( firstname, lastname, email_address, password) VALUES ($1, $2, $3, $4)';
$results = pg_query_params($dbconn, $query, array($firstname, $lastname, $email_address, $password));

// Check if the insertion was successful
if ($results !== false) {
    echo "<script>alert('Account created successfully!');
    window.location.href = 'login_form.php'
    </script>";
} else {
    echo "Error creating account: " . pg_last_error($dbconn);
}

// var_dump($_POST);

// Close the database connection
pg_close($dbconn);
?>
