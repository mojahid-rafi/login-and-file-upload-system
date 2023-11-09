<?php include './header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 mx-auto">
                <div class="row">
                    <div class="offset-2 col-md-8">
                        <h5 class="pg-title text-center mt-3">User Registration</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-2 col-md-8 my-2">
                        <div class="card">
                            <div class="card-body">
                                <form action="" id="registrationForm" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="user_name" type="text" class="form-control" placeholder="Enter Your Name" required="">
                                                <span id="user_name-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" placeholder="Enter Your Email" required="" aria-invalid="false">
                                                <span id="email-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="User_Pwd" type="password" class="form-control" placeholder="Enter Your Password" required="">
                                                <span id="User_Pwd-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="Con_User_Pwd" type="password" class="form-control" placeholder="Retype Password" required="">
                                                <span id="Con_User_Pwd-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group float-right">
                                                <input type="submit" value="Register" name="submit" class="form-control btn btn-success mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <span>Already Have an Account? <a href="./login.php">Login</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        if (isset($_POST['submit']))
                        {
                            $UserName = $_POST['user_name'];
                            $email = $_POST['email'];
                            $password = $_POST['User_Pwd'];
                            $ConPassword = $_POST['Con_User_Pwd'];

                            if ($password != $ConPassword)
                            {
                                $_SESSION['msgType'] = "warning";
                                $_SESSION['msg'] = "Password Didn't Matched...!";
                            }
                            else
                            {
                                $fh = fopen("./db/users","a");
                                $row = $UserName.",".$email.",".$password.",\n";

                                fwrite($fh,$row);
                                fclose($fh);

                                $_SESSION['msgType'] = "success";
                                $_SESSION['msg'] = "Registration Successfull...!";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './footer.php'; ?>