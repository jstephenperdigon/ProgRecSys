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

<!-- EDIT QUESTION -->
<?php
if (isset($_POST['editQuestion'])) {
    $qid = mysqli_real_escape_string($con, $_POST['qid']);
    $keyAnswer = mysqli_real_escape_string($con, $_POST['keyAnswer']);
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $choiceA = mysqli_real_escape_string($con, $_POST['choiceA']);
    $choiceB = mysqli_real_escape_string($con, $_POST['choiceB']);
    $choiceC = mysqli_real_escape_string($con, $_POST['choiceC']);
    $choiceD = mysqli_real_escape_string($con, $_POST['choiceD']);
    
    $query = "UPDATE examinationtbl SET question = '$question', answer = '$keyAnswer', option1 = '$choiceA', option2 = '$choiceB', option3 = '$choiceC', option4 = '$choiceD' WHERE id = '$qid'";
    
    if (!mysqli_query($con, $query)) {
        echo "THE DATA IS NOT INSERTED!";
    } else {
        echo "THE DATA IS INSERTED!";
        // Redirect to a different page after successful submission
        header("Location: index.php");
        exit(); 
        // Make sure to exit to prevent further script execution
    }
}
?>
