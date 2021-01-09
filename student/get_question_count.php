<?php
        require_once("connect.php");

        if(isset($_POST["id"])) {
            $id = $_POST["id"];

            $sql = "SELECT * from heyseven7h_question WHERE tryout_id=$id";
            $result = $conn->query($sql);
            echo $result->num_rows;
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>