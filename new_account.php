<!DOCTYPE html>
<html lang="en">

<?php include 'gen_header.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <a href="index.php"><button>Back To Home</button></a>

                <h2 style="color: white;">Create a New Account</h2>
            </div>

            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-6" style="background-color: white; padding: 20px; border-radius: 15px;">

                    <form id="frm_new_user" action="process_registration.php" method="post">
                        <!-- First Name input -->
                        <div class="form-outline mb-4">
                            <input type="firstname" class="form-control" id='firstname' name='firstname' maxlength="25" required />
                            <label class="form-label" for="firstname">First Name</label>
                        </div>
                        <!-- Last Name input -->
                        <div class="form-outline mb-4">
                            <input type="lastname" class="form-control" id='lastname' name='lastname' required />
                            <label class="form-label" for="lastname">Last Name</label>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email_address" class="form-control" id='email_address' name='email_address' required />
                                <label class="form-label" for="email_address">Email Address (Account Name)</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="password" minlength="8" maxlength="20" required />
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <!-- Submit button -->
                            <div class="col d-flex justify-content-center">
                                <input type="submit" value="Create Account" \ class="btn btn-secondary btn-block mb-4">
                            </div>
                        </div>
                    </form>
                </div>
</body>
<?php include 'gen_footer.php'; ?>

</html>