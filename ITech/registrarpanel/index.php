<?php require_once "../components/controllerUserData.php"; ?>
<?php require "./components/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<title>
    <?php echo $fetch_info['firstName'] ?> | Registrar
</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- END IMPORTS -->

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- END IMPORTS -->
</head>
<!-- Image and text -->

<body>


    <!-- NAV BAR -->
    <nav class="nav fixed-top  bg-white shadow">
        <div class="container">
            <div class="row justify-content-end align-items-center">
                <div class="col-auto ">
                    <a class="navbar-brand"><img src="../img/logo.png" id="navLogo">
                    </a>
                </div>
                <div class="col justify-content-start">
                    Program Recommendation System
                </div>
                <div class="col text-center">
                    <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab0" data-mdb-toggle="tab" data-mdb-target="#contact0"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">

                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col text-center ">
                    <!-- Example split primary button -->
                    <div class="btn-group" style="box-shadow: none;">
                        <button type="button" class="btn btn-primary">
                            <?php echo $fetch_info['firstName'] ?>
                        </button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="../components/user-completion.php">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li> <a class="dropdown-item" href="../components/logout-user.php">Logout</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <!-- NAV BAR -->
    <div class="container" style="margin-top: 120px;">
        <div class="row w-100">
            <div class="col-3">
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                    aria-orientation="vertical">
                    <ul class="nav flex-column nav-pills">
                        <!-- Tab navs -->
                        <li class="nav-item">
                            <a class="nav-link active" id="v-tabs-home-tab" data-mdb-toggle="tab" href="#v-tabs-home"
                                role="tab" aria-controls="v-tabs-home" aria-selected="true">
                                View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-tabs-profile-tab" data-mdb-toggle="tab" href="#v-tabs-profile"
                                role="tab" aria-controls="v-tabs-profile" aria-selected="false">
                                View Examination</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-tabs-messages-tab" data-mdb-toggle="tab" href="#v-tabs-messages"
                                role="tab" aria-controls="v-tabs-messages" aria-selected="false">
                                View Users</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab navs -->
            </div>

            <div class="col-9">
                <!-- Tab content -->
                <div class="tab-content" id="v-tabs-tabContent">
                    <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                        aria-labelledby="v-tabs-home-tab">
                        <!-- Main content area -->
                        <div class="col-md-10">
                            <h1>Registrar Dashboard</h1>
                            <p>Welcome,
                                <?php echo $fetch_info['firstName'] ?>!
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                        <!-- Add question form -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 mt-5">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel"
                        aria-labelledby="v-tabs-messages-tab">
                        <div class="col-auto">
                            
                        </div>
                        <!-- Sidebar navigation -->
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8 mt-5">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                           
                                                            <th>First Name</th>
                                                            <th>Middle Initial</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile Number</th>
                                                            <th>Status</th>
                                                            <th>Role</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Connect to the database
                                                        $con = mysqli_connect('localhost', 'root', '', 'userform');

                                                        // Query the database for records
                                                        $sql = "SELECT * FROM usertable";
                                                        $result = mysqli_query($con, $sql);

                                                        // Loop through the records and display them in the table
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                          
                                                            echo "<td>" . $row['lastName'] . "</td>";
                                                            echo "<td>" . $row['middleInitial'] . "</td>";
                                                            echo "<td>" . $row['firstName'] . "</td>";
                                                            echo "<td>" . $row['email'] . "</td>";
                                                            echo "<td>" . $row['phoneNumber'] . "</td>";
                                                            echo "<td>" . $row['status'] . "</td>";
                                                            echo "<td>" . $row['role'] . "</td>";
                                                            echo "<td>";
                                                           echo "</td>";
                                                            echo "</tr>";
                                                        }
                                                        // Close the database connection
                                                        mysqli_close($con);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Tab content -->
            </div>
        </div>
    </div>

    <!-- IMPORTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- END IMPORTS -->
</body>

</html>