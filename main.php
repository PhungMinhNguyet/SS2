<?php include('includes/header.php') ?>
<?php include('includes/mysqli_connect.php'); ?>
<?php include('includes/functions.php'); ?>
<?php include('includes/sidebar-a.php') ?>
<style>

</style>



<div id="content">
    <?php
    if (isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $cid = $_GET['cid'];
        $q = " SELECT p.page_name, p.page_id, p.content,p.image,";
        $q .= " DATE_FORMAT(p.post_on, '%b %d, %y') AS date, ";
        $q .= " CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id ";
        $q .= " FROM pages AS p ";
        $q .= " INNER JOIN users AS u ";
        $q .= " USING (user_id) ";
        $q .= " WHERE p.cat_id={$cid}";
        $q .= " ORDER BY date ASC LIMIT 0, 10";
        $r = mysqli_query($dbc, $q);
        confirm_query($r, $q);
        if (mysqli_num_rows($r) > 0) {
            $count = 0;
            while ($pages = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $count = $count+1;
                $d= $count%2;
                if($d==0){
                  
                echo "
                <div class='post'>";
                echo '<div class="div_image"><img class="image_post" src="'.$pages['image'].' " /></div> ';
                 echo   "<div class='content_post1'><h2><a href='single.php?pid={$pages['page_id']}'>{$pages['page_name']}</a></h2>
                    <p>" . the_excerpt($pages['content']) . " ... <a href='single.php?pid={$pages['page_id']}'>Read more</a></p>
                    <p class='meta'><strong>Posted by:</strong> <a href='author.php?aid={$pages['user_id']}'> {$pages['name']}</a> | <strong>On: </strong> {$pages['date']} </p>
                    </div>
                    
            ";
                echo "</div>";}else{
            echo "
                <div class='post'>";
               
            echo   "<div class='content_post2'><h2><a href='single.php?pid={$pages['page_id']}'>{$pages['page_name']}</a></h2>
                    <p>" . the_excerpt($pages['content']) . " ... <a href='single.php?pid={$pages['page_id']}'>Read more</a></p>
                    <p class='meta'><strong>Posted by:</strong> <a href='author.php?aid={$pages['user_id']}'> {$pages['name']}</a> | <strong>On: </strong> {$pages['date']} </p>
                    </div>";
                    echo '<div class="div_image" ><img class="image_post" src="'.$pages['image'].'"  /></div> </div>';}
            
            

            }
        } else {
            echo "<p style='color: azure; text-align: center'>There are currenlty no post in this category.</p>";
        }
    }
    ?>


</div>
<!--end content-->
<?php include('includes/sidebar-b.php') ?>