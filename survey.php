<?php
    
    $surname = filter_input(INPUT_POST, 'surname');
  $names = filter_input(INPUT_POST, 'names');
  $contact = filter_input(INPUT_POST, 'contact');
  $date = filter_input(INPUT_POST, 'date');
  $age = filter_input(INPUT_POST, 'age');
  $favoritefood = isset($_POST['favoritefood']) ? implode(', ', (array)$_POST['favoritefood']) : '';
  $response1 = filter_input(INPUT_POST, 'response1');
  $response2 = filter_input(INPUT_POST, 'response2');
  $response3 = filter_input(INPUT_POST, 'response3');
  $response4 = filter_input(INPUT_POST, 'response4');

if (!empty($surname) && !empty($names)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "practice";

    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO account (surname, names, contact, date, age, favoritefood, response1, response2, response3, response4)
            VALUES ('$surname', '$names', '$contact', '$date', '$age', '$favoritefood', '$response1', '$response2', '$response3', '$response4')";
    if ($conn->query($sql)) {
        echo "New record is inserted successfully";
        $conn->close();
        header('Location: homepage.html'); 
        exit;
    } else {
        echo "Error: " . $sql . " " . $conn->error;
    }
} else {
    echo "Surname and Names should not be empty";
    die();
}
?>