<?php 
    require_once 'connect.php';

    $password = "seven7h2020";
    $password = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO heyseven7h_admin (id, name, username, password) VALUES (0, 'Administrator', 'admin', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>