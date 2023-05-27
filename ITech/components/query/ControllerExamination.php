<?php
require_once "../controllerUserData.php";
session_start();

// Retrieve the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

// Extract the answers array from the data
$answers = $data['answers'];

// Connect to the database (adjust the credentials as needed)
$con = mysqli_connect('localhost', 'root', '', 'progrecsys');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$currentEmail = $_SESSION['email'];
$usertable = "SELECT id, email FROM usertable WHERE email = ?";
$stmt = $con->prepare($usertable);
$stmt->bind_param("s", $currentEmail);
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_assoc();
$stmt->close();

// Insert the answers into the database
$insertedRows = 0;
foreach ($answers as $answer) {
    $userId = $fetch['id'];
    $userEmail = $fetch['email'];
    $questionId = $answer['questionId'];
    $ChoiceID = $answer['ChoiceID'];
    $optionName = $answer['optionName'];

    // Prepare the SQL statement
    $sql = "INSERT INTO answertbl (questionid, choice, optionname, userid, useremail) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssis", $questionId, $ChoiceID, $optionName, $userId, $userEmail);

    if ($stmt->execute()) {
        $insertedRows++;
    } else {
        // Error handling if the insertion fails
    }
    $stmt->close();
}

// Close the database connection
$con->close();

// Prepare the response
$response = [
    'status' => 'success',
    'message' => 'Data inserted successfully',
    'insertedRows' => $insertedRows
];

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>

<?php
// Assuming you have started the session and the user is logged in

if (isset($_POST['submitExam'])) {
    // Retrieve the current logged-in username from the session
    $email = $_SESSION['email'];

    // Fetching data from examinationtbl
    $examId = mysqli_real_escape_string($con, $_POST['examId']);
    $fetchExamQuery = "SELECT uniqid, question, answerkey FROM examinationtbl WHERE examId = '$examId'";
    $examResult = mysqli_query($con, $fetchExamQuery);

    // Inserting data into calculationtbl
    while ($examRow = mysqli_fetch_assoc($examResult)) {
        $uniqid = $examRow['uniqid'];
        $question = $examRow['question'];
        $answerKey = $examRow['answerkey'];

        // Perform your calculations or processing here

        // Insert the calculated data into calculationtbl
        $insertQuery = "INSERT INTO calculationtbl (uniqid, question, answerkey, username) 
                        VALUES ('$uniqid', '$question', '$answerKey', '$username')";
        mysqli_query($con, $insertQuery);
    }
}
?>