<!-- ADD QUESTION -->
<?php
if (isset($_POST['addQuestion'])) {
    $uid = uniqid();
    $keyAnswer = mysqli_real_escape_string($con, $_POST['keyAnswer']);
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $choiceA = mysqli_real_escape_string($con, $_POST['choiceA']);
    $choiceB = mysqli_real_escape_string($con, $_POST['choiceB']);
    $choiceC = mysqli_real_escape_string($con, $_POST['choiceC']);
    $choiceD = mysqli_real_escape_string($con, $_POST['choiceD']);
    $query = "INSERT INTO examinationtbl (uid, question, answer, option1, option2, option3, option4) 
              VALUES ('$uid', '$question', '$keyAnswer', '$choiceA', '$choiceB', '$choiceC', '$choiceD')";
    if (mysqli_query($con, $query)) {
        $info = "Question Added";
        $_SESSION['info'] = $info;
        header('Location: index.php');
        exit();
    } else {
        $errors['db-error'] = "Failed to add question!";
    }
}
?>
<!-- DELETE QUESTION -->
<?php
// Check if the delete_id parameter is provided
if (isset($_POST['delete_id'])) {
    // Get the ID value
    $id = $_POST['delete_id'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'userform');

    // Prepare the SQL query to delete the record
    $sql = "DELETE FROM examinationtbl WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Return a success response
        echo "success";
    } else {
        // Return an error response
        echo "error";
    }

    // Close the database connection
    mysqli_close($con);

    // Prevent further execution of the PHP script
    exit();
}

?>
<!-- EDIT QUESTION -->
<?php
if (isset($_POST['editQuestion'])) {
    // Retrieve the form data
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];

    // Update the record in the examinationtbl table
    $sql = "UPDATE examinationtbl SET question='$question', answer='$answer', option1='$option1', option2='$option2', option3='$option3', option4='$option4' WHERE id='$id'";
    if (mysqli_query($con, $sql)) {
        $info = "Question Edited Succesfully";
        $_SESSION['info'] = $info;
        header('Location: index.php');
        exit();
    } else {
        $errors['db-error'] = "Failed to edit question!";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

