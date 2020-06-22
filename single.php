<?php include('includes/header.php') ?>
<?php include('includes/mysqli_connect.php'); ?>
<?php include('includes/functions.php'); ?>
<?php include('includes/sidebar-a.php') ?>
<style>
#content_singlepage {
    column-count: 2;
    
    /* background-color: #fff; */
    opacity: 0.8;
   
}
#content_singlepage p{
    color: #fff;
    text-align: justify;
    padding:20px;
}
#content_singlepage p:first-of-type:first-letter{
font-size: 3em;
color: greenyellow;
float: left;
line-height: 50%;
margin: 0.1em 0.1em 0.1em -0.05em;
}
#content_title{
    column-span: all;
    padding-bottom: 20px;
    color: greenyellow;
    text-align:center;
}
</style>

<div id="content">


<div id="content_singlepage">
      <?php
    if ($pid = validate_id($_GET['pid'])) {
        // Neu pid hop le thi tien hanh truy van csdl
        $set = get_page_by_id($pid);
        if (mysqli_num_rows($set) > 0) {
            $pages = mysqli_fetch_array($set, MYSQLI_ASSOC);
            echo "
            <h2 id='content_title'>{$pages['page_name']}</h2>
            <div id='image_singlepage'>
        <img width='100%' height='auto'src='".$pages['image']."'/>
        </div>    
        <p>{$pages['content']}</p>
            ";
        } else {
            echo "<p>There are currenlty no post in this category.</p>";
        }
    } else {
        //neu pid k hop le thi chuyen huong user ve index.php
        redirect_to();
    }
    ?>

<!-- </div> -->

</div>
   
    <?php include('includes/comment_form.php'); ?>
</div>
<!--end content-->
<?php include('includes/sidebar-b.php') ?>
