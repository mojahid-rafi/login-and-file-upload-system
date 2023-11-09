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
<script src="./assets/js/toastr.min.js"></script>

<?php include './msg.php'; ?>


</body>
</html>