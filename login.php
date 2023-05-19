<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 mx-auto">
                <div class="row">
                    <div class="offset-2 col-md-8">
                        <h5 class="pg-title text-center mt-3">User Login</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-2 col-md-8 my-2">
                        <div class="card">
                            <div class="card-body">
                                <form action="" id="LoginForm" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" placeholder="Enter Your Email" required="" aria-invalid="false">
                                                <span id="email-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="User_Pwd" type="password" class="form-control" placeholder="Enter Password" required="">
                                                <span id="User_Pwd-error" class="text-danger error-msg"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group float-right">
                                                <input type="submit" value="Login" name="submit" class="form-control btn btn-success mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (isset($msg)) {echo $msg;} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['User_Pwd'];

    $valid = false;
    $fh = fopen('./db/users','r');
    while ($line = fgets($fh)) {
        if ($line[1] = $email && $line[2] = $password)
        {
            header("Location: ./upload-file.php");
        }
    }
    fclose($fh);

}

$fh = fopen('./db/users','r');
while ($row = fgets($fh)) {
    echo($row."<br>");
}
fclose($fh);

// Checking of User Name Length
//        $userLength = strlen($user);
//        if ($userLength < 4 || $userLength > 8) {
//            echo "<h3 class='text-danger'>Username must be between 4 to 8 characters</h3>";
//        } else {
//            echo "<h3>Valid Username</h3>";
//        }

?>

<script src="./assets/js/jquery-3.6.4.min.js"></script>
<script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>