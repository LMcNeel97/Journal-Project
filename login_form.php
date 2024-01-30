<!DOCTYPE html>
<html lang="en">

<?php include 'gen_header.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">

                <h2 style="color: white">Login</h2>
            </div>
        </div>


        <form id="login" action="process_login.php" method="post">
            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-6" style="background-color: white; padding: 20px; border-radius: 15px;">


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                    <input type="email" class="form-control" id='email_address' name='email_address' value='liam@mcneelconsultingllc.com'/>
                    <label class="form-label" for="email_address">Email Address (Account Name)</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                    <input type="password" class="form-control" name="password" value='password'/>
                                <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary btn-block mb-4">Sign in</button>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="new_account.php">Register</a></p>
                    </div><a href="index.php">Back to Home</a> <a href="journal.php">Journal Page</a>
                </div>
            </div>
        </form>

    </div>

</body>
<?php include 'gen_footer.php'; ?>

</html>