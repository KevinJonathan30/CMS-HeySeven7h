<?php
        require_once("connect.php");

            $sql = "SELECT * from heyseven7h_tryout";
            $result = $conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    array_push($arr, $row);
                }
            }
            echo json_encode($arr);
        $conn->close();
?>