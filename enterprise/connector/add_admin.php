<?php
        require_once("connect.php");

        if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"])) {
            $name = $_POST["name"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = password_hash($password,PASSWORD_DEFAULT);

            $sql = "INSERT INTO heyseven7h_admin (id, name, username, password, role) VALUES (0, '$name', '$username', '$password', 1)";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>