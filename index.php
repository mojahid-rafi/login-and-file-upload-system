<?php include './header.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['auth']))
{
    header("location:login.php");
}

if(isset($_SESSION['auth']) && $_SESSION['auth']){

}
else
{
    header("location:login.php");
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 mx-auto">
                <div class="row">
                    <div class="offset-2 col-md-8">
                        <h5 class="text-dark text-center mt-3">
                            Welcome,
                            <span class="pg-title">
                                <?php
                                if (isset($_SESSION['UserName']))
                                {
                                    echo $_SESSION['UserName'];
                                }
                                ?>
                            </span>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-2 col-md-8 my-2">
                        <div class="card">
                            <div class="card-header" style="padding: 0.40rem 1.25rem;">
                                <h6 class="d-inline-block" style="margin-top: 3px;">
                                    <span>Submit Your Files (Images/PDF)
                                </h6>
                                <a href="./logout.php" class="btn btn-sm btn-dark float-right">Logout</a>
                            </div>
                            <div class="card-body">
<!--                                <div class="row">-->
<!--                                    <div class="col-12">-->
<!--                                        <a href="./logout.php" class="btn btn-sm btn-dark float-right">Logout</a>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <form action="" id="FileUpload" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="FileUpload">Select Your File</label>
                                                <input type="file" name="file" class="form-control" id="FileUpload" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group float-right">
                                                <input type="submit" value="Upload" name="submit" class="form-control btn btn-success mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <span>Want to add your friends? <a href="./register.php">Register</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                            if(isset($_POST['submit']))
                            {
                                $file = $_FILES['file'];

                                //for test (It will show file info"
                                //    foreach ($file as $key => $value) {
                                //        echo "$key: $value<br>";
                                //    }

                                $FileType = array("image/jpeg", "image/gif", "image/png","image/webp", "application/pdf");

                                if(in_array($file['type'],$FileType) && $file['size'] < 5242880)
                                {
                                    //echo "Accepted..!";
                                    if(in_array($file['type'],$FileType))
                                    {
                                        if ($file['type'] == 'application/pdf')
                                        {
                                            $fileName = rand(10000,99999)."-".time().".pdf";
                                            move_uploaded_file($file['tmp_name'],"_uploads/".$fileName);
                                        }
                                        else
                                        {
                                            $fileName = rand(10000,99999)."-".time().".jpg";
                                            move_uploaded_file($file['tmp_name'],"_uploads/".$fileName);
                                        }

                                        $_SESSION['msgType'] = "success";
                                        $_SESSION['msg'] = "Upload Successful...!";
                                    }
                                }
                                else
                                {
                                    $_SESSION['msgType'] = "error";
                                    $_SESSION['msg'] = "Invalid file type or size...!";

                                }

                            }

                            if  (isset($_SESSION['del']) && $_SESSION['del']=true)
                            {
                                $_SESSION['msgType'] = "delete";
                                $_SESSION['msg'] = "Deleted Successfully...!";
                                unset($_SESSION['del']);

                            }
                            elseif (isset($_SESSION['failed']) && $_SESSION['failed']=true)
                            {
                                $_SESSION['msgType'] = "warning";
                                $_SESSION['msg'] = "Unable to Delete...!";
                                unset($_SESSION['failed']);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<!--Show All Image Files-->
<section>
    <div class="container-fluid">
        <div class="row">
            <?php

            $dir = './_uploads/';

            $FType = array("jpg", "jpeg", "gif", "png", "webp", "pdf");

            if (file_exists($dir) == false) {
                echo 'Directory \''. $dir. '\' not found!';
            } else {

                $files = scandir($dir);
                foreach ($files as $file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array($extension, $FType)) {
                        echo '
                                <div class="col-2"><div class="border rounded p-1">
                                <img src="'. $dir. '/'. $file. '" alt="'. $file. '" width="100%" class="img-fluid img-thumbnail" >
                                <button onclick=\'del("'.$file.'")\' class="btn btn-sm btn-outline-danger btn-block mt-2">Delete</button>
                                </div></div>
                                ';
                    }
                }
            }

            ?>

        </div>
    </div>
</section>

<?php include './footer.php'; ?>