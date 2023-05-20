<?php
if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $FilePath = "./_uploads/" . $fileName;

    if (file_exists($FilePath)) {
        if (unlink($FilePath)) {
            header("location: upload-file.php?msg=deleted");
        } else {
            $msg = "<p class='alert alert-danger'>Unable to Delete...!</p>";
            header("location: upload-file.php?msg=".$msg);
        }
    }
}
else
    {

    $msg = "<p class='alert alert-danger'>Invalid Action...!</p>";
}

?>