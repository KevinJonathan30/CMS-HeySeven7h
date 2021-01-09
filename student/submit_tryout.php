<?php
        require_once("connect.php");

        if (isset($_COOKIE["student_name"])) {
            $name = $_COOKIE["student_name"];
            $score = $_POST["finalResult"];
            $id = $_POST["idTryout"];
            date_default_timezone_set("Asia/Jakarta");
            $date = date("Y-m-d h:i:sa");

            $q = mysqli_query($conn, "INSERT INTO heyseven7h_score (id, name, score, dateSubmitted, tryout_id) values (0, '$name', $score, '$date', $id)");
            if($q) {
                echo "Success";
            }else {
                echo "Failed";
            }

            echo "v";
        }
?>