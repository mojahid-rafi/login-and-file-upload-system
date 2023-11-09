<script>
    <?php
        if (isset($_SESSION['msg']))
        {
            $msg = $_SESSION['msg'];
            $type = $_SESSION['msgType'];
        }
    ?>

    <?php if($type == "success") { ?>

        toastr.success("<?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>");

    <?php } ?>

    <?php if ($type == "error") { ?>

        toastr.error("<?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>");

    <?php } ?>

    <?php if ($type == "delete") { ?>

    toastr.error("<?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>");

    <?php } ?>

    <?php if ($type == "warning") { ?>

    toastr.error("<?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>");

    <?php } ?>

    <?php
        unset($_SESSION['msg']);
        unset($_SESSION['msgType']);
    ?>

</script>