<?php

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

// Insert the answers into the database
$insertedRows = 0;
foreach ($answers as $answer) {
    $questionId = $answer['questionId'];
    $ChoiceID = $answer['ChoiceID'];
    $optionName = $answer['optionName'];
    // Prepare the SQL statement
    $sql = "INSERT INTO answertbl (questionid, choice, optionname) VALUES ('$questionId', '$ChoiceID', '$optionName')";

    if ($con->query($sql) === TRUE) {
        $insertedRows++;
    } else {
        // Error handling if the insertion fails
    }
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
