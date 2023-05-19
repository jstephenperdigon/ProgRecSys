<!--alex-->
<?php require_once "../components/controllerUserData.php"; ?>
<?php require "./components/header.php"; ?>
<?php
require_once __DIR__ . '/lib/perpage.php';
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();

$firstName = "";
$lastName = "";

$queryCondition = "";
if (! empty($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (! empty($v)) {

            $queryCases = array(
                "firstName",
                "lastName"
            );
            if (in_array($k, $queryCases)) {
                if (! empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "firstName":
                    $firstName = $v;
                    $queryCondition .= "firstName LIKE '" . $v . "%'";
                    break;
                case "lastName":
                    $code = $v;
                    $queryCondition .= "lastName LIKE '" . $v . "%'";
                    break;
            }
        }
    }
}
$orderby = " ORDER BY id desc";
$sql = "SELECT * FROM usertable " . $queryCondition;
$href = 'index.php';

$perPage = 3;
$page = 1;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;

$query = $sql . $orderby . " limit " . $start . "," . $perPage;
$result = $database->select($query);

if (! empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
}
?>

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
    <link rel="stylesheet" type="text/css" href="css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- END IMPORTS -->
    <style>
button, input[type=submit].btnSearch {
    width: 140px;
    font-size: 14px;
    margin: 10px 0px 0px 10px;
}

.btnReset {
    width: 140px;
    padding: 8px 0px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 25px;
    color: #000000;
    border: 2px solid #d2d6dd;
    margin-top: 10px;
}

button, input[type=submit].perpage-link {
    width: auto;
    font-size: 14px;
    padding: 5px 10px;
    border: 2px solid #d2d6dd;
    border-radius: 4px;
    margin: 0px 5px;
    background-color: #fff;
    cursor: pointer;
}

.current-page {
    width: auto;
    font-size: 14px;
    padding: 5px 10px;
    border: 2px solid #d2d6dd;
    border-radius: 4px;
    margin: 0px 5px;
    background-color: #efefef;
    cursor: pointer;
}
input, textarea, select {
    box-sizing: border-box;
    width: 170px;
    height: initial;
    padding: 8px 5px;
    border: 1px solid #9a9a9a;
    border-radius: 4px;
}
.table{
    color: #000000;
}
th {
    padding: 1.5rem;
    text-align: left;
}
</style>
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
                           
                                <div class="phppot-container">
   

        <div>
            <form name="frmSearch" method="post" action="">
                <div>
                    <p>
                        <input type="text" placeholder="firstName"
                            name="search[firstName]"
                            value="<?php echo $firstName; ?>" /> <input
                            type="text" placeholder="lastName"
                            name="search[lastName]"
                            value="<?php echo $lastName; ?>" /> <input
                            type="submit" name="go" class="btnSearch"
                            value="Search"> <input type="reset"
                            class="btnReset" value="Reset"
                            onclick="window.location='index.php'">
                    </p>
                </div>
                
                <table class="stripped">
                    <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>MiddleName</th>
                            <th>LastName</th>
                            <th>status</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Role</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $key => $value) {
                            if (is_numeric($key)) {
                                ?>
                     <tr>
                        <ul>
                            <td><?php echo $result[$key]['firstName']; ?></li></td>
                            <td><?php echo $result[$key]['middleInitial']; ?></td>
                            <td><?php echo $result[$key]['lastName']; ?></td>
                            <td><?php echo $result[$key]['status']; ?></td>
                            <td><?php echo $result[$key]['email']; ?></td>
                            <td><?php echo$result[$key]['phoneNumber']; ?></td>
                            <td><?php echo $result[$key]['role']; ?></td>
                            </ul>
                        </tr>
                    <?php
                            }
                        }
                    }
                    if (isset($result["perpage"])) {
                        ?>
                        <tr>
                            <td colspan="6" align=right > <?php echo $result["perpage"]; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
                                
                            </p>
                        </div>
                    </div>
                   
   
                   
                        <link rel="stylesheet" type="text/css" href="css/style.css">
                            <div class="container bootstrap snippet">
                        <div class="container">
                         
                          
                                <div class="row">
                                <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile ">
                                    <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
                                    <div class="circle-tile-content dark-blue">
                                    <div class="circle-tile-description text-faded"> Users</div>
                                   
                                                
                                    <?php  $sql = "SELECT * from usertable";

                                        if ($result = mysqli_query($con, $sql)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            
                                            // Display result

                                        }
                                                ?>
                                                
                                    <div class="circle-tile-number text-faded "> <?php printf("%d\n", $rowcount);?></div>
                                    <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                            <div class="circle-tile ">
                                                <a href="#"><div class="circle-tile-heading red"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></div></a>
                                                <div class="circle-tile-content red">
                                                <div class="circle-tile-description text-faded"> Total Exam </div>
                                                            
                                                <?php  $sql = "SELECT * from examinationtbl";

                                        if ($result = mysqli_query($con, $sql)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            
                                            // Display result

                                        }
                                             ?>
                                        <div class="circle-tile-number text-faded "> <?php printf("%d\n", $rowcount);?></div>
                                        <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-lg-2 col-sm-6">
                                    <div class="circle-tile ">
                                        <a href="#"><div class="circle-tile-heading blue"><i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i></div></a>
                                        <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded"> Total Student </div>
                                        <?php  $sql = "SELECT * from usertable WHERE role = 'Student'";

                                                        if ($result = mysqli_query($con, $sql)) {

                                                            // Return the number of rows in result set
                                                            $rowcount = mysqli_num_rows( $result );
                                                            
                                                            // Display result

                                                        }
                                                        ?>
                                        <div class="circle-tile-number text-faded "> <?php printf("%d\n", $rowcount);?></div>
                                        <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    </div> 
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-check fa-3x" aria-hidden="true"></i></div></a>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> Verified </div>
          <?php  $sql = "SELECT * from usertable WHERE status = 'verified'";

                        if ($result = mysqli_query($con, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result

                        }
                        ?>
        <div class="circle-tile-number text-faded "> <?php printf("%d\n", $rowcount);?></div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading purple"><i class="fa fa-pencil-square fa-3x" aria-hidden="true"></i></div></a>
        <div class="circle-tile-content purple">
          <div class="circle-tile-description text-faded"> Examinee </div>
          <?php  $sql = "SELECT * from examineetbl";

                    if ($result = mysqli_query($con, $sql)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows( $result );
                        
                        // Display result

                    }
        ?>
        <div class="circle-tile-number text-faded "> <?php printf("%d\n", $rowcount);?></div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel"
                        aria-labelledby="v-tabs-messages-tab">
                        <div class="col-auto">
                            
                        </div>
                        <!-- Sidebar navigation -->
                        

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