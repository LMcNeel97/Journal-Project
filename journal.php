<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'gen_header.php'; ?>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="journal-entry">
                    <div class="mb-3">
                        <label for="journalTitle" class="form-label" style="font-size: 30px; color: white;">Title</label>
                        <input type="text" class="form-control" id="journalTitle" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="journalContent" class="form-label" style="font-size: 22px; color: white;">Content</label>
                        <textarea class="form-control" id="journalContent" rows="5" placeholder="Your journal entry here"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include 'gen_footer.php'; ?>
</footer>

</html>