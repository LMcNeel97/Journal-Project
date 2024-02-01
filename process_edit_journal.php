<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST METHOD"] == "POST") {
    if (isset($_POST["journal_id"])) {
        $journal_id = $_POST["journal_id"];
        $journal_name = $_POST["journal_name"];
        $description = $_POST["description"];
        $account_id = $_SESSION["Account_ID"];

        //SQL statement for journal_name and description update
        $stmt_edit_journal = $pdo->prepare("UPDATE journals SET journal_name = ?, description = ? WHERE journal_id = ? AND \"Account_ID\" = ?" );

        //Bind Parameters
        $stmt_edit_journal->bindParam(1, $journal_name, PDO::PARAM_STR);
        $stmt_edit_journal->bindParam(2, $description, PDO::PARAM_STR);
        $stmt_edit_journal->bindParam(3, $journal_id, PDO::PARAM_INT);
        $stmt_edit_journal->bindParam(4, $account_id, PDO::PARAM_INT);

        //Execute the SQL
        if ($stmt_edit_journal->execute()) {
        //Journal edit Success
        echo json_encode(["success" => true, "message" => "Journal updated successfully."]);
    } else {

        // Journal Deletion failed
        echo json_encode(["success" => false, "message" => "Failed to update the Journal"]);
    }
    } else {
        // Journal does not exist/belong to current user
        echo json_encode(["success" => false, "message" => "Journal not found."]);
    } 
 } else {
    // Missing journal_id parameter
    echo json_encode(["success" => false, "message" => "Missing journal_id"]);
}


?>







?>