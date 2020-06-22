<?php include('header.php'); ?>
<?php include('../includes/mysqli_connect.php'); ?>
<?php include('../includes/functions.php'); ?>
<?php include('../includes/sidebar-admin.php'); ?>
<div id="content">
    <?php

    if (isset($_GET['uid']) && filter_var($_GET['uid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $uid = $_GET['uid'];

        // Neu cid va cat_name ton tai, thi se xoa page khoi csdl
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Xu ly form
            if (isset($_POST['delete']) && ($_POST['delete'] == 'yes')) {
                // Neu muon delete page
                $q = "DELETE FROM users WHERE page_id = {$uid} LIMIT 1";
                $r = mysqli_query($dbc, $q);
                confirm_query($r, $q);
                if (mysqli_affected_rows($dbc) == 1) {
                    // Xoa thanh cong, bao cho nguoi dung biet
                    $messages = "<p class='success'>The page was deleted successfully.</p>";
                } else {
                    $messages = "<p class='warning'>The page was not deleted due to a system error.</p>";
                }
            } else {
                // Ko muon delete page
                $messages = "<p class='warning'>I thought so too! shouldn't be deleted.</p>";
            }
        }
    } else {
        // Neu PID va page_name khong ton tai, hoac khong dung dinh dang mong muon
        redirect_to('admin/view_pages.php');
    }
    ?>
    <h2> Delete Users:</h2>
    <?php if (!empty($messages)) echo $messages; ?>
    <form action="" method="post">
        <fieldset>
            <legend></legend>
            <label for="delete">Are you sure?</label>
            <div>
                <input type="radio" name="delete" value="no" checked="checked" /> No
                <input type="radio" name="delete" value="yes" /> Yes
            </div>
            <div><input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure?');" /></div>
        </fieldset>
    </form>
</div>
<!--end content-->

