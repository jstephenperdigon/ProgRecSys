<?php require_once "../components/controllerUserData.php"; ?>
<?php require "./components/header.php"; ?>
<?php require "./query/examinationController.php"; ?>
<?php 

 // Check if the delete form is submitted
 if (isset($_POST['deleteQuestion'])) {
    // Get the question ID to delete
    $questionId = $_POST['questionId'];

    // Delete the record from the database
    $deleteSql = "DELETE FROM examinationtbl WHERE id = $questionId";
    if (mysqli_query($con, $deleteSql)) {
        $info = "Record Deleted";
        $_SESSION['info'] = $info;
        header('Location: index.php');
        exit();
    } else {
        $errors['db-error'] = "Failed to delete record!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<title>
    <?php echo $fetch_info['firstName'] ?> | Admin
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
    <link rel="stylesheet" href="ui/style.css">
    <!-- END IMPORTS -->
    <style>

    </style>
</head>
<!-- Image and text -->

<body>

    <!-- Edit Modal -->
    <div id="editModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Question</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="index.php">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editQuestion" class="form-label">Question:</label>
                            <input type="text" class="form-control" id="editQuestion" name="question" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAnswer" class="form-label">Answer:</label>
                            <input tyle="text" class="form-control" id="editAnswer" name="answer" required/>
                        </div>
                        <div class="mb-3">
                            <label for="editOption1" class="form-label">Option A:</label>
                            <input type="text" class="form-control" id="editOption1" name="option1" required>
                        </div>
                        <div class="mb-3">
                            <label for="editOption2" class="form-label">Option B:</label>
                            <input type="text" class="form-control" id="editOption2" name="option2" required>
                        </div>
                        <div class="mb-3">
                            <label for="editOption3" class="form-label">Option C:</label>
                            <input type="text" class="form-control" id="editOption3" name="option3" required>
                        </div>
                        <div class="mb-3">
                            <label for="editOption4" class="form-label">Option D:</label>
                            <input type="text" class="form-control" id="editOption4" name="option4" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="editQuestion" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



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
                        <button type="button" class="btn btn-warning">
                            <?php echo $fetch_info['firstName'] ?>
                        </button>
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="user-completion.php">Settings</a></li>
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
    <div class="container-fluid" style="margin-top: 180px;">
        <div class="row w-100">
            <div class="col-3">
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                    aria-orientation="vertical">
                    <ul class="nav flex-column nav-pills ">
                        <!-- Tab navs -->
                        <li class="nav-item">
                            <a class="nav-link" id="v-tabs-home-tab" data-mdb-toggle="tab" href="#v-tabs-home"
                                role="tab" aria-controls="v-tabs-home" aria-selected="false">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-tabs-profile-tab" data-mdb-toggle="tab" href="#v-tabs-profile"
                                role="tab" aria-controls="v-tabs-profile" aria-selected="false">
                                Manage Examination
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-tabs-messages-tab" data-mdb-toggle="tab" href="#v-tabs-messages"
                                role="tab" aria-controls="v-tabs-messages" aria-selected="false">
                                Manage Users
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab navs -->
            </div>

            <div class="col-9">
                <!-- Tab content -->
                <div class="tab-content" id="v-tabs-tabContent">
                    <div class="tab-pane fade show" id="v-tabs-home" role="tabpanel" aria-labelledby="v-tabs-home-tab">
                        <!-- Main content area -->
                        <div class="col-md-10">
                            <h1>Admin Dashboard</h1>
                            <p>Welcome,
                                <?php echo $fetch_info['firstName'] ?>!
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                        <div class="alert">
                            <?php
                            if (isset($_SESSION['info'])) {
                                ?>
                                <div class="alert alert-success text-center fade show">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                                <?php
                                unset($_SESSION['info']); // Clear the success message variable
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                                foreach ($errors as $showerror) {
                                    ?>
                                    <div class="container alert alert-danger text-center">
                                        <?php
                                        echo $showerror;
                                }
                                unset($errors); // Clear the errors array
                                ?>
                                </div>
                                <?php
                            }

                            ?>
                        </div>

                        <!-- Add question form -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <h3>Create a new question:</h3>
                                    <form id="add-question-form" action="index.php" method="POST">
                                        <div class="form-group">
                                            <label class="form-label mt-5" for="question-text">Question:</label>
                                            <textarea class="form-control" id="question-text"
                                                name="question"></textarea>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input type="text" id="answer-a" class="form-control" name="choiceA" />
                                            <label class="form-label" for="answer-a">Choice A</label>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input type="text" id="answer-b" class="form-control" name="choiceB" />
                                            <label class="form-label" for="answer-b">Choice B</label>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input type="text" id="answer-c" class="form-control" name="choiceC" />
                                            <label class="form-label" for="answer-c">Choice C</label>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input type="text" id="answer-d" class="form-control" name="choiceD" />
                                            <label class="form-label" for="answer-d">Choice D</label>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input class="form-control" id="correct-answer" name="keyAnswer" />
                                            <label class="form-label" for="correct-answer">Answer Key</label>
                                        </div>
                                        <div class="form-outline flex-fill mb-0 mt-5">
                                            <input class="form-control" id="form-control" name="role" />
                                            <label class="form-label" for="correct-answer">Question part</label>
                                        </div>
                                        <button type="submit" name="addQuestion"
                                                        class="btn btn-primary mt-4">Add Question</button>
                                    </div>

                                    <div class="container mt-5 align-items-center">
                                        <h3 class="text-center">Manage Questions</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto mt-5">
                                                <table class="table align-middle mb-0 bg-white">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="background-color: #202020; color: #fff;">ID
                                                            </th>
                                                            <th>QUESTION</th>
                                                            <th>ANSWER</th>
                                                            <th>A</th>
                                                            <th>B</th>
                                                            <th>C</th>
                                                            <th>D</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Connect to the database
                                                        $con = mysqli_connect('localhost', 'root', '', 'userform');

                                                            // Query the database for records
                                                            $sql = "SELECT * FROM examinationtbl";
                                                            
                                                            $result = mysqli_query($con, $sql);

                                                        // Loop through the records and display them in the table
                                                        $rowNumber = 0;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $rowNumber++;
                                                            $rowClass = $rowNumber % 2 == 0 ? 'even' : 'odd'; // Apply different classes to even and odd rows
                                                            echo "<tr class='$rowClass'>";
                                                            echo "<td>" . $row['id'] . "</td>";
                                                            echo "<td>" . $row['question'] . "</td>";
                                                            echo "<td>" . $row['answer'] . "</td>";
                                                            echo "<td>" . $row['option1'] . "</td>";
                                                            echo "<td>" . $row['option2'] . "</td>";
                                                            echo "<td>" . $row['option3'] . "</td>";
                                                            echo "<td>" . $row['option4'] . "</td>";
                                                            echo "<td>";
                                                            echo "<a onclick='deleteRecord(" . $row['id'] . ")' class='btn btn-sm btn-danger' style='box-shadow: none'>Delete</a>";
                                                            echo "</td>";
                                                            echo "<td>";
                                                            echo "<a data-id='" . $row['id'] . "' data-question='" . $row['question'] . "' data-answer='" . $row['answer'] . "' data-option1='" . $row['option1'] . "' data-option2='" . $row['option2'] . "' data-option3='" . $row['option3'] . "' data-option4='" . $row['option4'] . "' 
                            class='btn btn-sm btn-warning edit-btn' style='box-shadow: none' onclick='showEditModal(this)'>Edit</a>";
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
                <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel" aria-labelledby="v-tabs-messages-tab">
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-6 mx-auto">
                                <form method="POST" action="process.php">
                                    <h1 class="text-center mt-5">ADD RECORD</h1>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="firstName" class="form-control"
                                                        name="firstName" required />
                                                    <label class="form-label" for="firstName">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="lastName" class="form-control"
                                                        name="lastName" required />
                                                    <label class="form-label" for="lastName">Last Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="middleInitial" class="form-control"
                                                        name="middleInitial" required />
                                                    <label class="form-label" for="middleInitial">Middle Initial</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="mobileNumber" class="form-control"
                                                        name="mobileNumber" required />
                                                    <label class="form-label" for="mobileNumber">Mobile Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="email" class="form-control" name="email"
                                                        required />
                                                    <label class="form-label" for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline form-group flex-fill mb-3">
                                                    <input type="text" id="password" class="form-control"
                                                        name="password" required />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label mt-5"><strong>USER TYPE</strong></label>
                                            <ul class="role text-center">
                                                <li>
                                                    <input type="radio" id="choiceA1" name="q2" />
                                                    <label for="choiceA1">Student</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="choiceB1" name="q2" />
                                                    <label for="choiceB1">Administrator</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="choiceC1" name="q2" />
                                                    <label for="choiceC1">Developer</label>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <button type="submit" class="btn btn-primary" style="box-shadow: none;">Add
                                                Record</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar navigation -->
                    <div class="container mt-5 align-items-center">
                    <h3 class="text-center">MANAGE USERS</h3>
                    <div class="row align-items-center">
                                            <div class="col-auto mt-5">
                                            <table class="table align-middle mb-0 bg-white">
                                            <thead class="text-center">
                                                <tr>
                                                    <th style="background-color: #202020; color: #fff;">ID</th>
                                                    <th>FIRST NAME</th>
                                                    <th>MIDDLE INITIAL</th>
                                                    <th>LAST NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>MOBILE NUMBER</th>
                                                    <th>STATUS</th>
                                                    <th>ROLE</th>
                                                    <th>ACTIONS</th>
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
                                                $rowColor = false; // Variable to track the row color
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    // Determine the row class based on the row color variable
                                                    $rowClass = $rowColor ? 'even-row' : 'odd-row';

                                                    echo "<tr class='$rowClass'>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['lastName'] . "</td>";
                                                    echo "<td>" . $row['middleInitial'] . "</td>";
                                                    echo "<td>" . $row['firstName'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['phoneNumber'] . "</td>";
                                                    echo "<td>" . $row['status'] . "</td>";
                                                    echo "<td>" . $row['role'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='edit_record.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "<a href='delete_record.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>";
                                                    echo "</td>";
                                                    echo "</tr>";

                                                    // Toggle the row color
                                                    $rowColor = !$rowColor;
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
            <!-- Tab content -->
        </div>
    </div>
    </div>


    <script src="adminJs/admin.js"></script>
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