<?php
session_start();
?>

<?php
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'gen_header.php'; ?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="jumbotron">
                    <h1 class="display-4" style="color: white">The Binki Journaling</h1>
                    <p class="lead" style="color: white">This is a simple webapp designed to allow you to create, edit, and manage any personal journal entries.</p>
                    <hr class="my-4">
                    <p style="color: white">Welcome Back! If you're new here join us today!.</p>
                    <p class="lead">
                        <a class="btn btn-light btn-lg" href="login_form.php" role="button" style="padding: 5px;">Login</a>
                        <a class="btn btn-light btn-lg" href="new_account.php" role="button" style="padding: 5px;">Create New Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include 'gen_footer.php'; ?>
</footer>

</html>