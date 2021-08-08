<?php
session_start();
require_once 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["idDeletion"]);
    if($id != "") {
        $sql = "DELETE FROM heyseven7h_admin WHERE id=$id";
        if ($conn->multi_query($sql) === TRUE) {
            header("location:managetutor.php");
        }   
    }
}

if (isset($_SESSION["loggedin"]) && $_SESSION["role"] == 0) {
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Tutor - Enterprise</title>
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
                <h1 class="mt-4">Manage Tutor</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Tutor</li>
                </ol>
                <a style="float: right;"><button data-toggle='modal' data-target='#addModal' class="btn btn-dark">Add
                        New</button></a>
                <br><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Tutor List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                $sql = "SELECT * FROM heyseven7h_admin WHERE role != 0";
                                                $result = $conn->query($sql);
                       
                                                if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["username"]. "</td><td>
                                                    <button class='btn btn-warning' title='Edit' onclick='editPage(".$row["id"].")' data-toggle='modal' data-target='#editModal'><i class='fas fa-edit'></i></button>&nbsp;<button class='btn btn-danger' title='Delete' onclick='deletePage(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td></tr></a>";
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
        <?php include('components/footer.php'); ?>
    </div>
    </div>
    <div class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Name</label>
                    <input type="text" id="TutorNameAdd" class="form-control">
                    <label>Username</label>
                    <input type="text" id="TutorUsernameAdd" class="form-control">
                    <label>Password</label>
                    <input type="password" id="TutorPasswordAdd" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="addTutor()" class="btn btn-warning" data-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>ID</label>
                    <input type="number" id="TutorIDEdit" class="form-control" disabled>
                    <label>Name</label>
                    <input type="text" id="TutorNameEdit" class="form-control">
                    <label>Username</label>
                    <input type="text" id="TutorUsernameEdit" class="form-control">
                    <label>Password</label>
                    <input type="password" id="TutorPasswordEdit" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="submitEdit()" class="btn btn-warning"
                        data-dismiss="modal">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this Tutor?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    All the students linked to this Tutor will be deleted too.
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script>
    function addTutor() {
        var name = document.getElementById("TutorNameAdd").value;
        var username = document.getElementById("TutorUsernameAdd").value;
        var password = document.getElementById("TutorPasswordAdd").value;
        if (name != "" && username != "" && password != "") {
            $.ajax({
                url: "API/addAdmin.php",
                type: "POST",
                data: {
                    name: name,
                    username: username,
                    password: password
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

    function editPage(id) {
        $.ajax({
            url: "API/getAdminDetail.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                document.getElementById("TutorIDEdit").value = data[0].id;
                document.getElementById("TutorNameEdit").value = data[0].name;
                document.getElementById("TutorUsernameEdit").value = data[0].username;
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function submitEdit() {
        var id = document.getElementById("TutorIDEdit").value;
        var name = document.getElementById("TutorNameEdit").value;
        var username = document.getElementById("TutorUsernameEdit").value;
        var password = document.getElementById("TutorPasswordEdit").value;
        if (name != "" && username != "" && password != "") {
            $.ajax({
                url: "API/submitEditAdmin.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    username: username,
                    password: password
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

    function deletePage(id) {
        document.getElementById("idTemp").value = id;
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