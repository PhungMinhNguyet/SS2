
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
            <li><a href="intro.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="add_categories.php"><i class="fas fa-project-diagram"></i>Add Categories</a></li>
            <li><a href="view_categories.php"><i class="fas fa-address-card"></i>View Categories</a></li>
            <li><a href="add_pages.php"><i class="fas fa-address-book"></i>Add Pages</a></li>
            <li><a href="view_pages.php"><i class="fas fa-blog"></i>View Pages</a></li>
            <li><a href="manage_users.php"><i class="fas fa-user"></i>Manage Users</a></li>
            
        </ul> 
    
    </div>

</div>
</div>
</div>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script><!--end section-navigation-->