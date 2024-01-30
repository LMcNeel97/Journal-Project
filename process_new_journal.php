<?php
session_start();
require_once 'db_connection.php';

$response = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrive data from Webpage
    $journal_name = $_POST["journal_name"];
    $description = trim($_POST["description"]);

    //Get Account_ID from Session
    $account_id = $_SESSION['Account_ID'];

    // Debug: Output the value of $description
    //echo "Description: [$description]<br>";
    // Debug: Output the value of $_SESSION['Account_ID']
    //echo "Account ID from session: " . $_SESSION['Account_ID'] . "<br>";

    //Validate Description is not empty
    if (empty($description)) {
       $response['success'] = false;
       $response['message'] = "Please insert a description";
        } else {
    //Prepare the SQL statement to input data to database table
    $stmt_insert_journals = $pdo->prepare("INSERT INTO journals (journal_name, description, \"Account_ID\") VALUES (:journal_name, CAST(:description AS TEXT), :account_id)");
    
    //Bind Parameters
    $stmt_insert_journals->bindParam(':journal_name', $journal_name);
    $stmt_insert_journals->bindParam(':description', $description);
    $stmt_insert_journals->bindParam(':account_id', $account_id, PDO::PARAM_INT);

    try {
        //execute the SQL
        $stmt_insert_journals->execute();
        $response['success'] = true;
        $response['message'] = "Journal added sucessfully!";

    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = "ERROR: " . $e->getMessage();
    }
}
} else {
   $response['success'] = false;
   $response['message'] = "Form not submitted.";
}

// Convert the response Array to JSON
header('Content-Type: application/json');
echo json_encode($response);

?>