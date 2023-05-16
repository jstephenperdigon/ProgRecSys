<?php
session_start();
require 'connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
    <title>User Edit</title>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-xxl shadow ">
        <div class="container">
            <a class="navbar-brand d-inline-block align-text-top " style="padding-left: 1vw"
                href="user-management.php"><img src="../img/UCC.png" id="navLogo"></a>
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
                                <button class="dropdown-item btn-sm" href="logout-user.php">Settings</button>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user-management.php">Settings</a>
                                <a class="dropdown-item" href="logout-user.php">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4> USER EDIT
                            <a href="user-management.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM usertable WHERE id ='$id'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $id = mysqli_fetch_array($query_run);
                                ?>
                                <form action="controller.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $id['id']; ?>">

                                    <div class="mb-3">
                                        <label> Name</label>
                                        <input type="text" name="name" value="<?= $id['name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $id['email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" value="<?= $id['password']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>