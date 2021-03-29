<?php
        require_once("../connect.php");

        if(isset($_POST["name"])) {
            $name = $_POST["name"];

            $sql = "INSERT INTO heyseven7h_attendance (id, name)
            VALUES (0, '$name')";

            if ($conn->query($sql) === TRUE) {
                echo "Record added successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>