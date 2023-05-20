<?php
if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $FilePath = "./_uploads/" . $fileName;

    if (file_exists($FilePath)) {
        if (unlink($FilePath)){
            header("location: index.php?msg=deleted");
            exit;
        }
        else
        {
            header("location: index.php?msg=failed");
        }
    }
    else
    {
        header("location: index.php?msg=failed");
    }

}
else
    {

        echo "<h2>Invalid Action...!</h2>";
    }

?>


