<?php $title = 'Đăng nhập'; include('includes/header.php');?>
<?php include('includes/mysqli_connect.php');?>
<?php include('includes/functions.php');?>

<div id="content">
    <?php 
    ob_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Bat dau xu ly form. Tao bien $errors
        $errors = array();
        
        // Validate email
        if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $e = mysqli_real_escape_string($dbc, $_POST['email']); 
        } else {
            $errors[] = 'email';
        }
        
        // Validate password
        if(isset($_POST['password'])) {
            $p = mysqli_real_escape_string($dbc, $_POST['password']);
        } else {
            $errors[] = 'password';
        }
        if(empty($errors)) {
            // Bat dau truy van CSDL de lay thong tin nguoi dung
            $q = "SELECT user_id, first_name, user_level FROM users WHERE (email = '{$e}' AND pass = '{$p}') LIMIT 1";
            $r = mysqli_query($dbc, $q); confirm_query($r, $q);
            if(mysqli_num_rows($r) == 1) {
               session_regenerate_id();
                // Neu tim thay thong tin nguoi dung trong CSDL, se chuyen huong nguoi dung ve trang thich hop.
                list($uid, $first_name, $user_level) = mysqli_fetch_array($r, MYSQLI_NUM);
                $_SESSION['uid'] = $uid;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['user_level'] = $user_level;
                                
                redirect_to('admin/intro.php');
            } else {
                $message = "<p class='error' style='color: azure; text-align: center'>The email or password do not match those on file. Or you have not activated your account.</p>";
            }
        } else {
            $message = "<p class='erorr'  style='color: azure; text-align: center' >Please fill in all the required fields.</p>";
        }
    
    } // END MAIN IF
    ?>
    
<div id="content">
	<h2  style='color: azure; '>Login</h2>
    <?php if(!empty($message)) echo $message; ?>
    <form id="login" action="" method="post">
        <fieldset>
        	<legend  style='color: azure; background-color:#262626' ></legend>
            	<div>
                    <label for="email"  style='color: azure;'>Email:
                        <?php if(isset($errors) && in_array('email',$errors)) echo "<span class='warning'  style='color: azure; text-align: center' >Please enter your email.</span>";?>
                    </label>
                    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']);} ?>" size="20" maxlength="80" tabindex="1" />
                </div>
                <div>
                    <label for="pass"  style='color: azure; '>Password:
                        <?php if(isset($errors) && in_array('password',$errors)) echo "<span class='warning'  style='color: azure; text-align: center' >Please enter your password.</span>";?>
                    </label>
             <input type="password" name="password" id="pass" value="" size="20" maxlength="20" tabindex="2" />
                </div>
        </fieldset>
        <div  style='color: azure; text-align: center; margin-top:25px;' ><input type="submit" name="submit" value="Login" /></div>
    </form>
    <p  style='color: azure; text-align: center' ><a href="retrieve_password.php">Forgot password?</a></p>
 </div><!--end content-->

</div><!--end content-->

