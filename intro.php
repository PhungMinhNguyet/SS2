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
            echo "<p>There are currenlty no post in this category.</p>";
        }
    }
    ?> 
        <h2 style="color: azure; "> Hello ^^ </h2>
        <br>
        <br>
        <div>
            <p style="color: azure; text-align: center">
                Life brings us as many joyful moments as it does downfalls, and although there are days we wish there was a manual to follow, it simply wouldn’t be the same without the spontaneity. The journey of life may not become easier as we grow older, but we do
                seem to understand it better as our perspectives evolve. Whether you’re embarking on a new adventure right out of school or you want to explore different paths in your personal life, it’s never too late to change what the future looks
                like.

            </p>
            
            <p style="color: azure; text-align: center">
                If you’re in need of motivation and inspiration. I hope i can help you to get it . ENJOY AND REMEMBER :)
            </p>
            <br>

            <p style="color: azure; text-align: center; font-weight: bold;">

                ' You can't change the direction of the wind, but you can adjust your sails to always reach your destination. '

            </p>
        </div>

</div>
<!--end content-->
<?php include('includes/sidebar-b.php') ?>