<?php

require 'connection.php';




$email = $_POST['email'];
$uname = $_POST['uname'];
$password = $_POST['pswd'];

$query = "SELECT * FROM register WHERE email = '$email'";
$res = mysqli_query($con, $query);
$d = mysqli_num_rows($res);

if ($d  > 0) {
    echo "Email already exits";
} else {
    // Insert data into MySQL table
    $sql = "INSERT INTO register VALUES ('$uname','$email', '$password')";
    if (mysqli_query($con, $sql)) {
        echo "User registered successfully in MySQL database.";
        header("Location: ../login.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

}





// Close MySQL database connection
mysqli_close($con);
exit;

?>