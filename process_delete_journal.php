<?php 
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["journal_id"])) {
        $journal_id = $_POST["journal_id"];
        $account_id = $_SESSION['Account_ID']; //Get Account ID from the Session

        // SQL Statement to select journal by journal_id and Account_ID
        $stmt_select_journal = $pdo->prepare("SELECT * FROM journals WHERE journal_id = ? AND \"Account_ID\" =? ");
        $stmt_select_journal->bindParam(1, $journal_id, PDO::PARAM_INT);
        $stmt_select_journal->bindParam(2, $account_id, PDO::PARAM_INT);
        $stmt_select_journal->execute();

        // Check if the journal belongs to the current user
        if ($stmt_select_journal->rowCount() > 0){

        //SQL Statement to delete journal by journal_id
        $stmt_delete_journal = $pdo->prepare("DELETE FROM journals WHERE journal_id = ?");

        //Bind the journal_id Parameter
        $stmt_delete_journal->bindParam(1, $journal_id, PDO::PARAM_INT);

        //Execute the SQL
        if ($stmt_delete_journal->execute()) {
            //Journal deletion is successful
            echo json_encode(["success" => true, "message" => "Journal deleted successfully."]);
        } else {

            // Journal Deletion failed
            echo json_encode(["success" => false, "message" => "Failed to delete the Journal"]);
        }
        } else {
            // Journal does not exist/belong to current user
            echo json_encode(["success" => false, "message" => "Journal not found."]);
        }
    } else {
        // Missing journal_id parameter
        echo json_encode(["success" => false, "message" => "Missing journal_id"]);
    }
}

?>