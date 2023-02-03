<?php
        require_once("connect.php");

        if(isset($_POST["name"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $cal1 = $_POST["cal1"];
            $cal2 = $_POST["cal2"];
            $cal3 = $_POST["cal3"];
            $cal4 = $_POST["cal4"];
            $cal5 = $_POST["cal5"];
            $cal6 = $_POST["cal6"];
            $cal7 = $_POST["cal7"];
            $cal8 = $_POST["cal8"];
            $cal9 = $_POST["cal9"];
            $cal10 = $_POST["cal10"];
            $cal11 = $_POST["cal11"];
            $cal12 = $_POST["cal12"];
            $cal13 = $_POST["cal13"];
            $cal14 = $_POST["cal14"];
            $cal15 = $_POST["cal15"];
            $cal16 = $_POST["cal16"];
            $cal17 = $_POST["cal17"];
            $cal18 = $_POST["cal18"];
            $cal19 = $_POST["cal19"];
            $cal20 = $_POST["cal20"];
            $cal21 = $_POST["cal21"];
            $cal22 = $_POST["cal22"];
            $cal23 = $_POST["cal23"];
            $cal24 = $_POST["cal24"];
            $cal25 = $_POST["cal25"];
            $cal26 = $_POST["cal26"];
            $cal27 = $_POST["cal27"];
            $cal28 = $_POST["cal28"];
            $cal29 = $_POST["cal29"];
            $cal30 = $_POST["cal30"];
            $cal31 = $_POST["cal31"];

            $sql = "UPDATE heyseven7h_attendance
            SET name='$name', cal1='$cal1', cal2='$cal2', cal3='$cal3', cal4='$cal4', cal5='$cal5', cal6='$cal6', cal7='$cal7', cal8='$cal8', cal9='$cal9', cal10='$cal10', cal11='$cal11', cal12='$cal12', cal13='$cal13', cal14='$cal14', cal15='$cal15', cal16='$cal16', cal17='$cal17', cal18='$cal18', cal19='$cal19', cal20='$cal20', cal21='$cal21', cal22='$cal22', cal23='$cal23', cal24='$cal24', cal25='$cal25', cal26='$cal26', cal27='$cal27', cal28='$cal28', cal29='$cal29', cal30='$cal30', cal31='$cal31' WHERE id=$id";

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