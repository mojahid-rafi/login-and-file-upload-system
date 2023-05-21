<?php
//Session Work
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
//End Session Work

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $FilePath = "./_uploads/" . $fileName;

    if (file_exists($FilePath)) {
        if (unlink($FilePath)){
            $_SESSION['del'] = true;
            header("location: index.php");
            exit;
        }
        else
        {
            $_SESSION['failed'] = true;
            header("location: index.php");
        }
    }
    else
    {
        $_SESSION['failed'] = true;
        header("location: index.php");
    }

}
else
    {

        echo "<h2>Invalid Action...!</h2>";
    }

?>


