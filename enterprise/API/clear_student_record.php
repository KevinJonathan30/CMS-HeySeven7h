<?php
        require_once("../connect.php");


        $sql = "UPDATE heyseven7h_attendance
            SET cal1='', cal2='', cal3='', cal4='', cal5='', cal6='', cal7='', cal8='', cal9='', cal10='', cal11='', cal12='', cal13='', cal14='', cal15='', cal16='', cal17='', cal18='', cal19='', cal20='', cal21='', cal22='', cal23='', cal24='', cal25='', cal26='', cal27='', cal28='', cal29='', cal30='', cal31=''";

        if ($conn->query($sql) === TRUE) {
            echo "Record cleared successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
?>