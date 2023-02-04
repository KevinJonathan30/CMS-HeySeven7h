<?php
session_start();
include 'connector/connect.php';

$err = "";
$success = "";

$cekpassword = "";
$username = $_SESSION["username"];

$data = mysqli_query($conn,"SELECT password FROM heyseven7h_admin where username = '$username'");
while($res = mysqli_fetch_assoc($data)){
    $cekpassword = $res["password"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $retypepassword = $_POST["retypepassword"];

    if(!password_verify($password, $cekpassword)){
        $err = "Enter a valid password and try again!";
    } else{
        if(!empty($newpassword) && !empty($retypepassword)){
            if($newpassword != $retypepassword){
                $err = "Passwords do not match!";
            }
            else{
                    $newpassword=password_hash($newpassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE heyseven7h_admin SET password=? where username = ?");
                    $stmt->bind_param("ss", $newpassword,$username);
                    $stmt->execute();
                    $err = "";
                    $success = "Password successfully changed!";
            }
        }
        else{
            $err ="Fill all the required fields!";
        }
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
    <title>Change Password - Enterprise</title>
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
                <h1 class="mt-4">Change Password</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nameInput">Current Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="timeInput">New Password</label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword">
                        <label for="tryoutIDLink">Retype New Password</label>
                        <input type="password" class="form-control" id="retypepassword" name="retypepassword">
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
</body>

</html>
<?php

}
else {
    header("location:login.php");
}
?>