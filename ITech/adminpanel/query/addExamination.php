<?php
$errors = array();

//if user signup button
if (isset($_POST['addQuestion'])) {
    // Generate a unique ID
    $uniqueID = uniqid();
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $choiceA = mysqli_real_escape_string($con, $_POST['choiceA']);
    $choiceB = mysqli_real_escape_string($con, $_POST['choiceB']);
    $choiceC = mysqli_real_escape_string($con, $_POST['choiceC']);
    $choiceD = mysqli_real_escape_string($con, $_POST['choiceD']);
    $key = mysqli_real_escape_string($con, $_POST['key']);

    $questionCheck = "SELECT * FROM examinationtbl WHERE question = '$question'";
    $result = mysqli_query($con, $questionCheck);
    if (mysqli_num_rows($result) > 0) {
        $errors['question'] = " Question is already in use!.";
    }

    if (count($errors) === 0) {

        $inserQuestion = "INSERT INTO examinationtbl ()
                        values('$choiceA',)";
        $data_check = mysqli_query($con, $inserQuestion);
        if ($data_check) {

        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}


?>