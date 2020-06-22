<style>
    .wrapper {
        display: inline-block;
        width: min-content;
        position: absolute;
    }
    
    .wrapper .sidebar {
        width: 200px;
        height: 100%;
    }
    
    .wrapper .sidebar h2 {
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }
    
    .wrapper .sidebar ul li {
        padding: 15px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .wrapper .sidebar ul li a {
        color: #ffffff;
        display: inline-block;
    }
    
    .wrapper .sidebar ul li a .fas {
        width: 25px;
    }
    
    .wrapper .sidebar ul li:hover {
        background-color: #c2a2b2;
    }
    
    .wrapper .sidebar ul l#d89fbb a {
        color: #fff;
    }
    
    .wrapper .sidebar .social_media {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
    }
    
    .wrapper .main_content {
        width: 100%;
        margin-left: 200px;
    }
    
    .wrapper .main_content .header {
        padding: 20px;
        background: #fff;
        color: #717171;
        border-bottom: 1px solid #e0e4e8;
    }
    
    .wrapper .main_content .info {
        margin: 20px;
        color: #717171;
        line-height: 25px;
    }
    
    .wrapper .main_content .info div {
        margin-bottom: 20px;
    }
    
    @media (max-height: 500px) {
        .social_media {
            display: none !important;
        }
    }
</style>
<div id="content-container">
    <div id="section-navigation">
        <div class="wrapper">
            <div class="sidebar">
                <h2></h2>
                <ul>

                    <!-- <ul class="navi"> -->
                    <?php
            if (isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
                $cid = $_GET['cid'];
                $pid = NULL;
            } elseif (isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
                $pid = $_GET['pid'];
                $cid = NULL;
            } else {
                $cid = NULL;
                $pid = NULL;
            }

            $q = "SELECT cat_name, cat_id FROM categories ORDER BY position ASC";
            $r = mysqli_query($dbc, $q);
            confirm_query($r, $q);
            while ($cats = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo "<button class='w3-button w3-block w3-left-align' onclick='myAccFunc()'><li><a href='main.php?cid={$cats['cat_id']}'";
                if ($cats['cat_id'] == $cid);
                //ì nay lam
                echo ">" . $cats['cat_name'] . "</a></button>";
                //cau lenh truy xuat pages
                $q1 = "SELECT page_name, page_id FROM pages WHERE cat_id={$cats['cat_id']} ORDER BY position ASC";

                $r1 = mysqli_query($dbc, $q1);
                confirm_query($r1, $q1);
                // lay pages tu csdl
                echo '<div class="w3-hide w3-white w3-card">';
                echo "<ul class='pages'>";
                while ($pages = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                    echo "<li><a href='single.php?pid={$pages['page_id']}'";
                    if ($pages['page_id'] == $pid) echo "class='selected w3-bar-item w3-button'";
                    echo ">" . $pages['page_name'] . '</a></li>';
                }
               
                
                echo "</ul>";
                echo "</div>";
            }
            ?>
                </ul>
            </div>
        </div>
        <!--end section-navigation-->
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>