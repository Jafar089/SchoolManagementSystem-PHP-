<?php
include 'functions.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="dashbody.css">
    <link rel="stylesheet" href="listing.css">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <p>Welcome To School Management System</p>
    </div>

    <div class="side-bar">

        <div class="heading">
            <p>Jafar@512</p>
        </div>

        <div class="dashboard">
            <img src="ii.png" alt="">
            <a href="/school">Dashboard</a>
        </div>

        <div class="student">
            <img src="ii.png" alt="">
            <a href="students">Student Module</a> 
        </div>
        
    </div>

    <div class="mybody">

    <?php
        $request = $_SERVER['REQUEST_URI'];
        $router = str_replace('/school','',$request);
        
        // echo $router;
        
        if($router=='/')
        {
            include('dashbody.php');
        }
        elseif($router=='/students')
        {
            include('listing.php');
        }
        
        elseif($router=='/students/create')
        {
            include('create.php');
        }
        
        elseif($router=='students/show' || preg_match("/students\/show\/[0-9]/i",$router))
        {
            include('show.php');
        }
        
        elseif($router=='students/edit' || preg_match("/students\/edit\/[0-9]/i",$router))
        {
            include('edit.php');
        }
        
        elseif($router=='/students/del' || preg_match("/students\/del\/[0-9]/i",$router))
        {
            if (isset($_GET['url']))
            {
                $regex = '/\/del\/(\d+)/';
                preg_match($regex, $router, $matches);
                $id = $matches[1];
                echo deleteRecords($id);
                header("Refresh: 1.5; url=/school/students");
            }
        }
        ?>

    </div>

    <div class="footer">
        <p>Jafar@512</p>
    </div>
</body>
</html>