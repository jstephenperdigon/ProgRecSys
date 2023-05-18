<?php
function addQuestionToDatabase($question, $choiceA, $choiceB, $choiceC, $choiceD, $keyAnswer)
{
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'userform');

    // Check if the connection was successful
    if (!$con) {
        echo "Error connecting to the database: " . mysqli_connect_error();
        return;
    }

    // Prepare the SQL query to insert the data into the table
    $insertSql = "INSERT INTO examinationtbl (question, option1, option2, option3, option4, answer) VALUES ('$question', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$keyAnswer')";

    // Execute the query
    if (mysqli_query($con, $insertSql)) {
        echo "<div class='alert alert-success'>Question added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding question: " . mysqli_error($con) . "</div>";
    }

    // Close the database connection
    mysqli_close($con);
}

// Check if the form was submitted and the addQuestion button was clicked
if (isset($_POST['addQuestion'])) {
    $question = $_POST['question'];
    $choiceA = $_POST['choiceA'];
    $choiceB = $_POST['choiceB'];
    $choiceC = $_POST['choiceC'];
    $choiceD = $_POST['choiceD'];
    $keyAnswer = $_POST['keyAnswer'];

    // Call the function to add the question to the database
    addQuestionToDatabase($question, $choiceA, $choiceB, $choiceC, $choiceD, $keyAnswer);
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