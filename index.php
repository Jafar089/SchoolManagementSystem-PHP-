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
            <img src="<?= getCurrentPageURL(false) ?>/school/ii.png" alt="">
            <a href="/school">Dashboard</a>
        </div>

        <div class="student">
            <img src="<?= getCurrentPageURL(false) ?>/school/ii.png" alt="">
            <a href="student">Student Module</a>
        </div>
    </div>

    <div class="mybody">

    <?php
    

    // echo $router;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) 
    {
        $request = $_SERVER['REQUEST_URI'];
        $router = str_replace('/school', '', $request);

        if ($router == '/') 
        {
            include 'dashbody.php';
        } 
        elseif ($router == '/student' || preg_match('/student\/page\/[0-9]/i', $router) || preg_match('/student\/search\/[a-zA-Z0-9]/i', $router)) 
        {
            include 'listing.php';
        } 
        elseif ($router == '/student/create') 
        {
            include 'create.php';
        } 
        elseif ($router == 'student/show' || preg_match('/student\/show\/[0-9]/i', $router))
        {
            include 'show.php';
        } 
        elseif ($router == 'student/edit' || preg_match('/student\/edit\/[0-9]/i', $router))
        {
            include 'edit.php';
        } 
        elseif ($router == '/student/del' || preg_match('/student\/del\/[0-9]/i', $router)) 
        {
            if (isset($_GET['url'])) 
            {
                $regex = '/\/del\/(\d+)/';
                preg_match($regex, $router, $matches);
                $id = $matches[1];
                echo deleteRecords($id);
                header('Refresh: 1.5; url=/school/student');
            }
        }
    }
    else 
    {
        header('Location: login.php');
        exit();
    }
    ?>
    </div>

    <div class="footer">
        <p>Jafar@512</p>
    </div>
</body>

</html>