<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title>
    <?php echo $fetch_info['name'] ?> | Home
</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/admin.css">

</head>
<!-- Image and text -->

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-xxl shadow ">
        <div class="container">
            <a class="navbar-brand d-inline-block align-text-top " style="padding-left: 1vw" href="home.php"><img
                    src="../img/UCC.png" id="navLogo"></a>
            Program Recommendation System<br>for University of Caloocan City

            <button class="navbar-toggler ms-auto" style="margin-right: 25px; margin-left: 25px; " type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse align-center" style="margin-left: 350px;" id="collapseNavbar">
                <ul class="navbar-nav ms-auto active">
                    <li class="nav-item">

                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm" type="button">
                            </button>
                            <button class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" type="button"
                                id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu position-absolute" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="user-management.php">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout-user.php">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md">

                <?php
                require '../components/connection.php';

                $output = '';
                if (isset($_POST["query"])) {
                    $search = mysqli_real_escape_string($con, $_POST["query"]);
                    $query = "
    SELECT * FROM usertable 
    WHERE id LIKE '%" . $search . "%'
    OR firstname LIKE '%" . $search . "%'
    OR lastname LIKE '%" . $search . "%'  
    OR email LIKE '%" . $search . "%'
    OR password LIKE '%" . $search . "%' 
    OR user_type LIKE '%" . $search . "%' 
    ";
                } else {
                    $query = "SELECT * FROM usertable ORDER BY id";
                }
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    $output .= '
    <div class="container-fluid card-body">
    
    <table class="table table-bordered table-striped"> 
        <thead >

            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
                    while ($row = mysqli_fetch_array($result)) {
                        $output .= '
        <tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["password"] . '</td>
        <td>
        
        <center>
        <a href="employee-view.php?id=' . $row["id"] . '" class="btn btn-info btn-sm">View</a>
        <a href="user-edit.php?id=' . $row["id"] . '" class="btn btn-success btn-sm">Edit</a>
        <form action="code.php" method="POST" class="d-inline">
        <button type="submit" name="delete_user" value=' . $row["id"] . ' class="btn btn-danger btn-sm">Delete</button>
        </form>
        </td>
        </tr>
        </center>
        </div>
        ';
                    }
                    echo $output;
                } else {
                    echo "No Record Found";
                }
                ?>

            </div>
            <div class="col-md">

            </div>
            <div class="col-md">

            </div>
        </div>
    </div>

    <div class="container-fluid" style="padding-top: 50px; ">

    </div>
</body>

</html>