<?php
        require_once("../connect.php");

        if(isset($_POST["id"])) {
            $id = $_POST["id"];

            $sql = "DELETE FROM heyseven7h_private_attendance WHERE student_id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>