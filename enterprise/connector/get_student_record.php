<?php
        require_once("connect.php");

        if(isset($_POST["id"])) {
            $id = $_POST["id"];

            $sql = "SELECT * FROM heyseven7h_attendance WHERE id=$id";

            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    array_push($arr, $row);
                }
            }
            echo json_encode($arr);
        }
        else {
            echo "Parameter not set";
        }
        $conn->close();
?>