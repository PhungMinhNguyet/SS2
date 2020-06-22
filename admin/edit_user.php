<?php
include('header.php');
require_once('../includes/mysqli_connect.php');
require_once('../includes/functions.php');
include('../includes/sidebar-admin.php');
?>
<?php
if (isset($_GET['uid']) && filter_var($_GET['uid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $uid = $_GET['uid'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Gia tri tri ton tai, xu ly form.
        $errors = array();
        if (empty($_POST['first_name'])) {
            $errors[] = 'first_name';
        } else {
            $first_name = mysqli_real_escape_string($dbc, strip_tags($_POST['first_name']));
        }
        if (empty($_POST['last_name'])) {
            $errors[] = 'last_name';
        } else {
            $last_name = mysqli_real_escape_string($dbc, strip_tags($_POST['last_name']));
        }
        if (empty($_POST['email'])) {
            $errors[] = 'email';
        } else {
            $email = mysqli_real_escape_string($dbc, strip_tags($_POST['email']));
        }
        if (empty($errors)) {
            $q = "UPDATE users SET first_name='{$first_name}', last_name='{$last_name}', email='{$email}' WHERE user_id={$uid} LIMIT 1";
            $r = mysqli_query($dbc, $q);
            confirm_query($r, $q);
            if (mysqli_affected_rows($dbc) == 1) {
                $messages = "<p class='success'>The user was edited successfully.</p>";
            } else {
                $messages = "<p class='warning'>The user could not be edited due to a system error</p>";
            }
        } else {
            $messages = "<p class='warning'>Please fill in all the required fields</p>";
        }
    }
} else {
    redirect_to('admin/admin.php');
}
?>
<div id="content">
    <?php
    // Chon page trong csdl de hien thi ra trinh duyet
    $q = "SELECT * FROM users WHERE user_id = {$uid}";
    $r = mysqli_query($dbc, $q);
    confirm_query($r, $q);
    if (mysqli_num_rows($r) == 1) {
        // Neu co page tra ve
        $user = mysqli_fetch_array($r, MYSQLI_ASSOC);
    } else {
        // Neu khong co page tra ve
        $messages = "<p class='warning'>The user does not exist.</p>";
    }
    ?>
    <h2>Edit user: <?php echo $user['first_name'] . " " . $user['last_name']; ?> </h2>
    <?php if (!empty($messages)) echo $messages; ?>

    <form action="" method="post">
        <fieldset>
            <legend></legend>
            <div>
                <label for="first-name">First Name
                    <?php if (isset($errors) && in_array('first_name', $errors)) echo "<p class='warning'>Please enter your first name.</p>"; ?>
                </label>
                <input type="text" name="first_name" value="<?php if (isset($user['first_name'])) echo strip_tags($user['first_name']); ?>" size="20" maxlength="40" tabindex='1' />
            </div>

            <div>
                <label for="last-name">Last Name
                    <?php if (isset($errors) && in_array('last name', $errors)) echo "<p class='warning'>Please enter your last name.</p>"; ?>
                </label>
                <input type="text" name="last_name" value="<?php if (isset($user['last_name'])) echo strip_tags($user['last_name']); ?>" size="20" maxlength="40" tabindex='1' />
            </div>

            <div>
                <label for="email">Email
                    <?php if (isset($errors) && in_array('email', $errors)) echo "<p class='warning'>Please enter a valid email.</p>"; ?>
                </label>
                <input type="text" name="email" value="<?php if (isset($user['email'])) echo $user['email']; ?>" size="20" maxlength="40" tabindex='3' />
            </div>
        </fieldset>

        <div><input type="submit" name="submit" value="Save Changes" /></div>
</div>
<!--end content-->


