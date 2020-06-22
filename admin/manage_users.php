<?php
$title = "Manage Users";
include('header.php');
require_once('../includes/mysqli_connect.php');
require_once('../includes/functions.php');
include('../includes/sidebar-admin.php');

?>
<div id="content">
    <h2>Manage Users</h2>
    <table>
        <thead>
            <tr>
                <th><a href="manage_users.php?sort=fn">First Name</a></th>
                <th><a href="manage_users.php?sort=ln">Last Name</a></th>
                <th><a href="manage_users.php?sort=e">Email</a></th>
                <th><a href="manage_users.php?sort=ul">User Level</a></th>
                <th>Edit User</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['sort'])) {
                switch ($_GET['sort']) {
                    case 'pg':
                        $order_by = 'first_name';
                        break;

                    case 'on':
                        $order_by = 'last_name';
                        break;

                    case 'by':
                        $order_by = 'email';
                        break;

                    default:
                        $order_by = 'user_level';
                        break;
                } // End Switch
            } else {
                $order_by = 'first_name';
            }
            $q = "SELECT * FROM users ORDER BY {$order_by} ASC";
            $r = mysqli_query($dbc, $q);
            confirm_query($r, $q);
            if (mysqli_num_rows($r) > 0) {
                while ($users = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    echo "
                    <tr>
                        <td>" . $users['first_name'] . "</td>
                        <td>" . $users['last_name'] . "</td>
                        <td>" . $users['email'] . "</td>
                        <td>" . $users['user_level'] . "</td>
                        <td><a class='edit' href='edit_user.php?uid=" . $users['user_id'] . "'>Edit</a></td>
                        <td><a class='delete' href='delete_user.php?uid=" . $users['user_id'] . "'>Delete</a></td>
                    <tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

