<html>

<head>
    <style>
        body {
            font-family: latha;
            color: white;
            background: linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.38), rgba(0, 0, 0, 0)), url(https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?cs=srgb&dl=daylight-environment-forest-idyllic-459225.jpg&fm=jpg)no-repeat;
            background-size: cover;
        }
        
        .box {
            width: 900px;
            float: right;
            border: 1px solid none;
        }
        
        .box ul li {
            width: 120px;
            float: left;
            margin: 10px auto;
            text-align: center;
        }
        
        .box ul li a {
            text-decoration: none;
            color: darkgray;
        }
        
        .box ul li:hover {
            color: aliceblue;
            box-shadow: 0 0 0 6px #000;
        }
        
        .box ul li a:hover {
            color: white;
        }
        
        .wd {
            width: 300px;
            height: 539px;
            background-color: black;
            opacity: 0.9;
            padding: 55px;
        }
        
        .wd h1 {
            text-align: center;
            text-transform: uppercase;
            font-weight: 100px;
        }
        
        .wd h4 {
            text-align: justify;
            color: darkgray;
            font-weight: normal;
        }
        
        .wd h2 {
            text-align: center;
            text-transform: uppercase;
            font-weight: normal;
            margin: 70px auto;
        }
        
        .opt form,
        button a {
            font-family: latha;
            font-size: large;
            background-color: black;
            color: white;
            padding: 10px;
            margin: 55px auto;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
            text-decoration: none;
        }
        
        form,
        button a:hover {
            background-color: whitesmoke;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="box">
        <ul type="none">


        </ul>
    </div>

    <div class="wd">

        <h1> Welcome!</h1>

        <h4> Hi everyone ^^ , please check here to view all my stories; it's a piece of cake , click "HOME" to blow your mind .</h4>

        <h2> Explore now... </h2>
        <div class="opt">
            <form action="intro.php" method="GET">

                <button><a href="intro.php">HOME</a> </button>
            </form>

        </div>
    </div>
