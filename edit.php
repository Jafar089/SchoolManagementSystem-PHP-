<style>
    <?php include 'show.css'; ?>
    <?php include 'index.css'; ?>
</style>

<?php

$responseMsg = '';

if (isset($_POST['updateRecord'])) {
    $url = $_SERVER['REQUEST_URI'];
    $regex = '/\/edit\/(\d+)/';
    preg_match($regex, $url, $matches);
    $id = $matches[1];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $responseMsg = updateRecords($id,$fname, $lname, $email, $phone);
    header("Refresh: 1.2; url=/school/students");
}
?>
<div class="card">

    <div class="card-title">
        <div class="back">
            <a href="/school/students"><button>Go back</button></a>
        </div>
        <div class="left">
            <p> Student&nbsp;|&nbsp;Edit </p>
        </div>
    </div>

    <div class="card-body">
        <?php if (isset($_GET['url']))
        {
            $url = $_SERVER['REQUEST_URI'];
            $regex = '/\/edit\/(\d+)/';
            preg_match($regex, $url, $matches);
            $id = $matches[1];
            $getRecord = getRecord($id);
            if($getRecord > 0)
            {   
            ?>
        <form method="POST" action="" onsubmit="return validateForm()">
            <?=$responseMsg?>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="fname" class="form-control" id="fname" name="fname"
                    value="<?= $getRecord[0]['fname'] ?? null ?>" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="lname" class="form-control" id="lname" name="lname" value="<?= $getRecord[0]['lname']?>"
                    placeholder="Enter last Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $getRecord[0]['email']?>"
                    placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="<?= $getRecord[0]['phone']?>"
                    placeholder="Enter your phone number">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success" name="updateRecord">Update</button>
            </div>
        </form>

        <script>
            function validateForm() {
                var fname = document.forms[0]["fname"].value;
                var lname = document.forms[0]["lname"].value;
                var email = document.forms[0]["email"].value;
                var phone = document.forms[0]["phone"].value;

                if (fname == "" || lname == "" || email == "" || phone == "") {
                    alert("Please fill out all fields");
                    return false;
                }
                return true;
            }
        </script>

        <?php
        }
        else
            {
                echo '<script>swal("Record not found", "Your Record Not Exist", "danger");</script>';      
            }
        } 
        else 
        {
            echo '<div class="mt-3 mb-3 alert alert-danger" role="alert">
            ID Not Get
          </div>';
        } 
        ?>
    </div>