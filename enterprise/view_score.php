<?php
session_start();
require_once 'connector/connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["idDeletion"]);
    if($id != "") {
        $sql = "DELETE FROM heyseven7h_score WHERE id=$id";
        if ($conn->multi_query($sql) === TRUE) {
            header("location:view_score.php");
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
    <title>View Score - Enterprise</title>
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
                <h1 class="mt-4">View Score</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Score</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Student Score List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Score</th>
                                        <th>Date Submitted</th>
                                        <th>Tryout Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                $sql = "SELECT heyseven7h_score.name, heyseven7h_score.id, score, dateSubmitted, heyseven7h_tryout.name as tryout_name FROM `heyseven7h_score` JOIN `heyseven7h_tryout` ON `heyseven7h_score`.tryout_id = `heyseven7h_tryout`.id";
                                                $result = $conn->query($sql);
                                                $scoreCount = $result->num_rows;                         
                                                if ($scoreCount > 0) {
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["score"]. "</td><td>" . $row["dateSubmitted"]. "</td><td>". $row["tryout_name"]."</td><td>
                                                    <button class='btn btn-danger' title='Delete' onclick='deleteScore(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td></tr>";
                                                  } 
                                                }
                                                $conn->close();
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('views/footer.php'); ?>
    </div>
    </div>
    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this score?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This score will be deleted permanently from database.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="idDeletion" id="idTemp" value=0>
                        <button type="submit" class="btn btn-danger">Delete!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
    function deleteScore(id) {
        document.getElementById("idTemp").value = id;
    }
    </script>
</body>

</html>
<?php

}
else {
    header("location:login.php");
}
?>