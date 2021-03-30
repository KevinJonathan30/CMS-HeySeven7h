<?php
        require_once("../connect.php");

            $sql = "SELECT score, COUNT(score) AS sum FROM heyseven7h_score GROUP BY score";
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