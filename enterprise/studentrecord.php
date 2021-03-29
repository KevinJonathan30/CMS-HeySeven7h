<?php
session_start();
require_once 'connect.php';

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
    <title>Student Record - Enterprise</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <?php include('components/navbar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Student Record</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Student Record</li>
                </ol>
                <button style="float: right;" class="btn btn-dark" data-toggle="modal" data-target="#addNewModal">Add
                    New</button>
                <br><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Student Monthly Record
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
                                        <th>20</th>
                                        <th>21</th>
                                        <th>22</th>
                                        <th>23</th>
                                        <th>24</th>
                                        <th>25</th>
                                        <th>26</th>
                                        <th>27</th>
                                        <th>28</th>
                                        <th>29</th>
                                        <th>30</th>
                                        <th>31</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM heyseven7h_attendance";
                                        $result = $conn->query($sql);
                         
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                <td>" . $row["name"]. "</td>
                                                <td>" . $row["cal1"]. "</td>
                                                <td>" . $row["cal2"]. "</td>
                                                <td>" . $row["cal3"]. "</td>
                                                <td>" . $row["cal4"]. "</td>
                                                <td>" . $row["cal5"]. "</td>
                                                <td>" . $row["cal6"]. "</td>
                                                <td>" . $row["cal7"]. "</td>
                                                <td>" . $row["cal8"]. "</td>
                                                <td>" . $row["cal9"]. "</td>
                                                <td>" . $row["cal10"]. "</td>
                                                <td>" . $row["cal11"]. "</td>
                                                <td>" . $row["cal12"]. "</td>
                                                <td>" . $row["cal13"]. "</td>
                                                <td>" . $row["cal14"]. "</td>
                                                <td>" . $row["cal15"]. "</td>
                                                <td>" . $row["cal16"]. "</td>
                                                <td>" . $row["cal17"]. "</td>
                                                <td>" . $row["cal18"]. "</td>
                                                <td>" . $row["cal19"]. "</td>
                                                <td>" . $row["cal20"]. "</td>
                                                <td>" . $row["cal21"]. "</td>
                                                <td>" . $row["cal22"]. "</td>
                                                <td>" . $row["cal23"]. "</td>
                                                <td>" . $row["cal24"]. "</td>
                                                <td>" . $row["cal25"]. "</td>
                                                <td>" . $row["cal26"]. "</td>
                                                <td>" . $row["cal27"]. "</td>
                                                <td>" . $row["cal28"]. "</td>
                                                <td>" . $row["cal29"]. "</td>
                                                <td>" . $row["cal30"]. "</td>
                                                <td>" . $row["cal31"]. "</td><td><button class='btn btn-warning' title='Edit' onclick='editEntry(".$row["id"].")' data-toggle='modal' data-target='#editModal'><i class='fas fa-edit'></i></button></td><td>
                                                <button class='btn btn-danger' title='Delete' onclick='deleteEntry(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td>
                                                </tr>";
                                            } 
                                        } 
                                        $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addNewModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add New Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Student Name</label>
                                <input type="text" id="nameAdd" class="form-control" max="200">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" onclick="addStudent()" class="btn btn-dark"
                                    data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('components/footer.php'); ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script>
    function addStudent() {
        var name = document.getElementById("nameAdd").value;
        if (name != "") {
            $.ajax({
                url: "API/add_student_record.php",
                type: "POST",
                data: {
                    name: name
                },
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }
    </script>
</body>

</html>
<?php

}
else{
    header("location:login.php");
}
?>