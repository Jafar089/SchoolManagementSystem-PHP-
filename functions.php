<?php

include 'config.php';
include 'head.php';

// getting all data from data-base
function getPersonData()
{
    global $conn;
    $query = "SELECT id,fname,lname,email,phone, DATE_FORMAT(created_at, '%b %e, %Y (%a)') AS created_at_formatted FROM student";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// Add record in a data-base
function addRecords($fname, $lname, $email, $phone)
{
    global $conn;
    $query = "INSERT INTO student (fname,lname,email,phone ) VALUES ('$fname', '$lname', '$email','$phone')";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        return '<script>swal("Record Added", "Your Record Added Successfully", "success");</script>';
    }
    else
    {
        return '<script>swal("Record Not Added", "Your Record Not Added", "danger");</script>';
    }
}



// deleting record from the data base
function deleteRecords($id)
{
    global $conn;

    $result = $conn->query("SELECT COUNT(*) as count FROM student WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($row["count"] > 0) 
    {
        $query = "DELETE FROM `student` WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return '<script>swal("Record Deleted", "Your Record Deleted Successfully", "success");</script>';
        }
        else
        {
            return '<script>swal("Record Not Deleted", "Your Record Not Deleted", "danger");</script>';
        }
    } 
    else 
    {
        return '<script>swal("Not Found", "This id not exit", "danger");</script>';
    }



}


// for update records
function updateRecords($id,$fname, $lname, $email, $phone)
{
    global $conn;

    $result = $conn->query("SELECT COUNT(*) as count FROM student WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($row["count"] > 0)
    {
        $query = "UPDATE `student` SET fname='$fname', lname='$lname', email='$email', phone='$phone'  WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            return '<script>swal("Record Updated", "Your Record updated Successfully", "success");</script>';
        }
        else
        {
            return '<script>swal("Record Not Updated", "Your Record Not Updated", "danger");</script>';
        }
    }
    else
    {
        return 0;
    }
    
}


// function for return total records count in student table
function returnStudent()
{
    global $conn;
    $query="SELECT COUNT(*) as total_records FROM student";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row["total_records"];
    return $total_records;
}


// function for return last 7 days records count in student table
function Studentlast()
{
    global $conn;
    $query="SELECT COUNT(*) as records FROM student WHERE created_at >= DATE(NOW()) - INTERVAL 7 DAY;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row["records"];
    return $total_records;
}

// getting specific record according to id from the data-base
function getRecord($id)
{
    global $conn;
    $result = $conn->query("SELECT COUNT(*) as count FROM student WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($row["count"] > 0)
    {
        $query = "SELECT * FROM `student` WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else
    {
        return 0;
    }
    
}

?>