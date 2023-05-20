<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 mx-auto">
                <div class="row">
                    <div class="offset-2 col-md-8">
                        <h5 class="pg-title text-center mt-3">Submit Your Files (Images/PDF)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-2 col-md-8 my-2">
                        <div class="card">
                            <div class="card-body">
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
                                                <input type="submit" value="Upload" name="submit" class="form-control btn btn-success mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

                                        echo "<p class='alert alert-success mt-3'>Upload Successful...!</p>";
                                    }
                                }
                                else
                                {
                                    echo "<p class='alert alert-danger mt-3'>Invalid file type or size...!</p>";
                                }

                            }
                            $delMsg = "<p class='alert alert-danger mt-3'>Deleted Successfully...!</p>";
                            if (isset($_GET['msg']) == "deleted")
                            {
                                echo $delMsg;
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

            $FType = array("jpg", "jpeg", "gif", "png", "webp");

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


<script>
    //Delete Function For Delete Item
    function del($fileName)
    {
        var Confirmation = confirm("Are you sure you want to delete?");
        if(!Confirmation)
        {
            return;
        }
        else
        {
            window.location = "delete.php?file=" + $fileName;
        }

    }
</script>

<script src="./assets/js/jquery-3.6.4.min.js"></script>
<script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>