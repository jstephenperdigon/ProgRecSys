<?php
session_start();
require 'connection.php';

if(isset($_POST['save_user']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    

    $query = "INSERT INTO usertable (name,email,password) VALUES ('$name','$email','$password')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Account Created Successfully";
        header("Location:../user-management.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Account Not Created";
        header("Location: ../user-management.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "UPDATE usertable SET name='$name', email='$email', password='$password' WHERE id ='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully";
        header("Location: user-management.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated";
        header("Location: user-management.php");
        exit(0);
    }

}

if(isset($_POST['delete_user']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM usertable WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: ../user-management.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: ../user-management.php");
        exit(0);
    }
}





?>
