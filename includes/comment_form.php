<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $errors = array();          
    // Validate name
    if(!empty($_POST['name'])) {
        $name = mysqli_real_escape_string($dbc,strip_tags($_POST['name']));
    } else {
        $errors[] = "name";
    }
    
    // Validate email
    if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $e = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
    } else {
        $errors[] = "email";
    }
    
    // Validate comment
    if(!empty($_POST['comment'])) {
        $comment = mysqli_real_escape_string($dbc,$_POST['comment']);
    } else {
        $errors[] = "comment";
    }
    


    if(empty($errors)) {
        // Neu ko co loi xay ra, them comment vao csdl
        $q = "INSERT INTO comments (page_id,author, email, comment, comment_date) VALUES ({$pid},'{$name}','{$e}','{$comment}', NOW())";
        $r = mysqli_query($dbc,$q);
        confirm_query($r, $q); 
        if(mysqli_affected_rows($dbc) == 1) {
            // Success
            $message = "<p class='success' style='color: azure;' >Thank you for your comment</p>";
            
        } else { // NO match was made
            $message = "<p class='error' style='color: azure;' >Your comment could not be posted due to a system error.</p>";
        }
    } else {
        // Neu co loi xay ra, do nguoi dung quen dien form, bao loi.
        $message = "<p class='error' style='color: azure;' >Please try again</p>";
    }

} // END main IF
?>
<?php
    // Hien thi comment tu csdl
    $q = "SELECT comment_id, author, comment, DATE_FORMAT(comment_date, '%b %d, %y') AS date FROM comments WHERE page_id = {$pid}";
    $r = mysqli_query($dbc, $q);
    confirm_query($r, $q);
    if(mysqli_num_rows($r) > 0) {
        // Neu co comment de hien thi ra trinh duyet
        echo "<ol id='disscuss'>";
        while(list($cmt_id,$author, $comment, $date) = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo "<li class='comment-wrap'>
                <p class='author' style='color: black;' >{$author}</p>
                <p class='comment-sec' style='color: black;'>{$comment}</p>";                
             echo "<p class='date'>{$date}</p>
                </li>";
            
        } // END while loop
        echo "</ol>";
    } else {
        // Neu ko co comment, thi se bao ra trinh duyet
        echo "<h2 style='color: black;' > Be the first to leave a comment.</h2>";
    }
?>
<?php if(!empty($message)) echo $message; ?>
<form id="comment-form" action="" method="post">
    <fieldset>
    	<legend></legend>
            <div>
            <label for="name" style='color: azure;' >Name: <span class="required">*</span>
            <?php if(isset($errors) && in_array('name',$errors)) { echo "<span class='warning'>Please enter your name.</span>";}?>
            </label>
            <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) {echo htmlentities($_POST['name'], ENT_COMPAT, 'UTF-8');} ?>" size="20" maxlength="80" tabindex="1" />
        </div>
        <div>
            <label for="email" style='color: azure;' >Email: <span class="required">*</span>
                <?php if(isset($errors) && in_array('email',$errors)) echo "<span class='warning'>Please enter your email.</span>";?>
            </label>
            <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']);} ?>" size="20" maxlength="80" tabindex="2" />
            </div>
        <div>
            <label for="comment" style='color: azure;'>Your Comment: <span class="required">*</span>
                <?php if(isset($errors) && in_array('comment',$errors)) { echo "<span class='warning'>Please enter your message.</span>"; } ?>
            </label>
            <div id="comment"><textarea name="comment" rows="4" cols="50" tabindex="3"><?php if(isset($_POST['comment'])) {echo htmlentities($_POST['comment'], ENT_COMPAT, 'UTF-8');} ?></textarea></div>
        </div>
    </fieldset>
    <br>
    <div><input type="submit" name="submit" value="Post Comment" /></div>
</form>
