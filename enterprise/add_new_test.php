<?php
session_start();
include 'connector/connect.php';

$err = "";
$success = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $time = trim($_POST["time"]);
    $linkTo = trim($_POST["tryoutIDLink"]);
    if($name != "" && $time >= 0) {
        $sql = "INSERT INTO heyseven7h_tryout (id, name, time, linkTo)
        VALUES (0, '$name', $time, '$linkTo')";

        if ($conn->query($sql) === TRUE) {
            $err = "";
            $success = "New Test Added";
        } else {
            $err = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $success = "";
        $err = "Please fill all the required field with valid data!";
    }
}
if (isset($_SESSION["loggedin"])) {
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add New Test - Enterprise</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <?php include('views/navbar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Add New Test</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tests</li>
                    <li class="breadcrumb-item active">Add New</li>
                </ol>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nameInput">Tryout Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name">
                        <label for="timeInput">Tryout Time (in Minutes, 0 = Forever)</label>
                        <input type="number" value=0 min=0 class="form-control" name="time" id="timeInput">
                        <label for="tryoutIDLink">Link To ID</label>
                        <select class="form-control" id="tryoutIDLink" name="tryoutIDLink">
                            <option value="None">None</option>
                            <?php 
                                    $sql = "SELECT * from heyseven7h_tryout";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()){
                                            echo "<option value='". $row["id"] ."'>" . $row["id"] ." - ". $row["name"] . "</option>";
                                        }
                                    }
                                ?>
                        </select>
                    </div>
                    <span style="color: red;"><?php echo $err; ?></span>
                    <span style="color: green;"><?php echo $success; ?></span><br>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </main>
        <?php include('views/footer.php'); ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
<?php

}
else{
    header("location:login.php");
}
?>