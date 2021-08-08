<?php
        require_once("../connect.php");

        if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = password_hash($password,PASSWORD_DEFAULT);

            $sql = "UPDATE heyseven7h_admin SET name='$name', username='$username', password='$password' WHERE id=$id";

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