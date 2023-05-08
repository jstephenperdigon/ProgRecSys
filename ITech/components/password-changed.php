<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: ../index.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Changed</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

    html,body{
    font-family: 'Poppins', sans-serif;
}
::selection{
    color: #fff;
    background: #5080ff;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.container .form form .forget-pass{
    margin: -15px 0 15px 0;
}
.container .form form .forget-pass a{
   font-size: 15px;
}
.container .form form .button{
    background: #5080ff;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #3d6deb;
}
.container .form form .link{
    padding: 5px 0;
}
.container .form form .link a{
    color: #5080ff;
}
.container .login-form form p{
    font-size: 14px;
}
.container .row .alert{
    font-size: 14px;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action='home.php' method="POST">
                    <div class="form-group">
                        <input class="form-control button" name="login-now" type="submit"  value="Login Now">
                    </div>
                </form>
            </div>
        </div>  
    </div>
    
</body>
</html>