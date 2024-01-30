<?php
session_start();

print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'gen_header.php'; ?>

<body>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="success-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Journal added successfully
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="mt-5">
                <h1 style="color: white;">Create New Journal</h1>
                <hr class="my-4" style="border-color: white; border-width: 3px;">
                </div>
                <form id="new-journal" action="process_new_journal.php" method="post">
                <div class="new_journal">
                    <div class="mt-3 mb-3">
                        <label for="new_journal_name" class="form-label" style="font-size: 30px; color: white;">Journal Name</label>
                        <input type="journal_name" class="form-control" id='journal_name' placeholder="Journal Name" name='journal_name' required />
                    </div>
                    <div class="mb-3">
                        <label for="journal_description" class="form-label" style="font-size: 22px; color: white;">Description</label>
                        <textarea class="form-control" id="description" rows="2" placeholder="Description" name='description'></textarea>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <input type="submit" value="Create Journal" class="btn btn-light btn-block mb-4">
                </div>
                </form>
            </div>
            <div class="col-8">
            <div class="mt-5 justify-content-center">
                <h1 style="color: white;">Select Your Journal</h1>
                <hr class="my-4" style="border-color: white; border-width: 3px;">
                </div>


    <table id="journal-table" class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Journal Name</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  </tbody>
                </table>


            </div>
        </div>
        </div>

        
        <!-- Include your external JavaScript file -->
        <script src="delete_journal.js"></script>
        <script src="journal_data_update.js"></script>
        <script src="new_journal.js"></script>
</body>