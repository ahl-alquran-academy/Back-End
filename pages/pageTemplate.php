<!DOCTYPE html>
<html data-textdirection="rtl">

<?php
//import head
include_once("../Resources/includes/head.php");
?>

<body>
    <!-- Begin navbar -->
    <?php
    //import navbar
    include_once("../Resources/includes/navbar.php");
    ?>
    <!-- End  navbar -->
    <!-- The start of  wrapper -->
    <div id="wrapper" dir="rtl">
        <!--start of slidebar-->
        <?php
        //import navbar
        include_once("../Resources/includes/sidebar.php");
        ?>
        <!--end of slidebar-->
        <!--start of content-->
        <div id="content">

            <!--here put your content-->
            <?php
            if (!isset($pageContent)) {
                include_once("../Resources/includes/home.php");
            } else {
                include_once($pageContent);
            }
            ?>
            <!--here put your content-->

            <!--footer-->
            <?php
            include_once("../Resources/includes/footer.php")
            ?>

        </div>
        <!--end of content-->
    </div>
    <!-- The End of  wrapper -->

    <!-- import js script -->
    <?php
    include_once("../Resources/includes/scriptfiles.php")
    ?>