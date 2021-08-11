<?php
session_start();
require_once 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["idDeletion"]);
    if($id != "") {
        $sql = "DELETE FROM heyseven7h_private_attendance WHERE id=$id";
        if ($conn->multi_query($sql) === TRUE) {
            header("location:privateattendance.php");
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
    <title>Student Attendance - Enterprise</title>
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
                <h1 class="mt-4">Student Attendance</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="privateattendance.php">Private Attendance</a></li>
                    <li class="breadcrumb-item active">Student Attendance</li>
                </ol>
                <a style="float: right;"><button data-toggle='modal' data-target='#addModal' class="btn btn-dark">Add
                        New</button></a>
                <br><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Student Attendance List
                    </div>
                    <?php 
                        if($_SERVER["REQUEST_METHOD"] == "GET") {
                            if(isset($_GET["id"])) {
                                $id = $_GET["id"];
                            }
                        }  
                        $sql = "SELECT * FROM heyseven7h_student WHERE id=$id";
                        $result = $conn->query($sql);

                        $pricePerHour = 0;

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              echo "<div style='margin-left: 1rem; margin-top: 1rem;'><p>Name: " . $row["name"]. "</p><p>Address: " . $row["address"]. "</p><p>Phone Number: " .
                              $row["phone"]."</p><p>Price/Hour: Rp ".$row["priceperhour"]."</p></div>";
                              $pricePerHour = $row["priceperhour"];
                            } 
                          }
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Total (Hours)</th>
                                        <th>Subject</th>
                                        <th>Topic</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_hours = 0;
                                                $sql = "SELECT id, ROW_NUMBER() OVER(
                                                    ORDER BY id) AS row_num, date, start, finish, EXTRACT(HOUR FROM TIMEDIFF(finish, start)) + (EXTRACT(MINUTE FROM TIMEDIFF(finish, start)) + EXTRACT(SECOND FROM TIMEDIFF(finish, start))/60)/60 AS difference, subject, topic, comment, student_id FROM heyseven7h_private_attendance WHERE student_id=$id";
                                                $result = $conn->query($sql);
                       
                                                if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    $total_hours += $row["difference"];
                                                    echo "<td>" . $row["row_num"]. "</td><td>" . $row["date"]. "</td><td>" .
                                                    $row["start"]."</td><td>".$row["finish"]."</td><td>".
                                                    floatval($row["difference"])."</td><td>".
                                                    $row["subject"]."</td><td>".$row["topic"]."</td><td>".$row["comment"]."<td>
                                                    <button class='btn btn-warning' title='Edit' onclick='editPage(".$row["id"].")' data-toggle='modal' data-target='#editModal'><i class='fas fa-edit'></i></button>&nbsp;<button class='btn btn-danger' title='Delete' onclick='deletePage(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td></tr></a>";
                                                  } 
                                                }
                                                $conn->close();
                                            ?>
                                </tbody>
                            </table>
                            <p style="font-weight: bold; text-align: center;">
                                <?php 
                                $total_hours *= $pricePerHour;
                                echo "Total Amount: $total_hours" ;
                            ?>
                            </p>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Add Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Date</label>
                    <input type="date" id="DateAdd" class="form-control">
                    <label>Start</label>
                    <input type="time" id="StartAdd" step="1" class="form-control">
                    <label>Finish</label>
                    <input type="time" id="FinishAdd" step="1" class="form-control">
                    <label>Subject</label>
                    <input type="text" id="SubjectAdd" value="" class="form-control">
                    <label>Topic</label>
                    <input type="text" id="TopicAdd" value="" class="form-control">
                    <label>Comment</label>
                    <input type="text" id="CommentAdd" value="" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="addEntry(<?php echo $id; ?>)" class="btn btn-warning"
                        data-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="IDEdit" class="form-control">
                    <label>Date</label>
                    <input type="date" id="DateEdit" class="form-control">
                    <label>Start</label>
                    <input type="time" id="StartEdit" step="1" class="form-control">
                    <label>Finish</label>
                    <input type="time" id="FinishEdit" step="1" class="form-control">
                    <label>Subject</label>
                    <input type="text" id="SubjectEdit" value="" class="form-control">
                    <label>Topic</label>
                    <input type="text" id="TopicEdit" value="" class="form-control">
                    <label>Comment</label>
                    <input type="text" id="CommentEdit" value="" class="form-control">
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
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this entry?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This entry will be deleted permanently if you do.
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
    function addEntry(id) {
        var date = document.getElementById("DateAdd").value;
        var start = document.getElementById("StartAdd").value;
        var finish = document.getElementById("FinishAdd").value;
        var subject = document.getElementById("SubjectAdd").value;
        var topic = document.getElementById("TopicAdd").value;
        var comment = document.getElementById("CommentAdd").value;
        if (date != "" && start != "" && finish != "") {
            $.ajax({
                url: "API/addStudentAttendance.php",
                type: "POST",
                data: {
                    date: date,
                    start: start,
                    finish: finish,
                    subject: subject,
                    topic: topic,
                    comment: comment,
                    id: id
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
            url: "API/getAttendanceDetail.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                document.getElementById("IDEdit").value = data[0].id;
                document.getElementById("DateEdit").value = data[0].date;
                document.getElementById("StartEdit").value = data[0].start;
                document.getElementById("FinishEdit").value = data[0].finish;
                document.getElementById("SubjectEdit").value = data[0].subject;
                document.getElementById("TopicEdit").value = data[0].topic;
                document.getElementById("CommentEdit").value = data[0].comment;
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function submitEdit() {
        var id = document.getElementById("IDEdit").value;
        var date = document.getElementById("DateEdit").value;
        var start = document.getElementById("StartEdit").value;
        var finish = document.getElementById("FinishEdit").value;
        var subject = document.getElementById("SubjectEdit").value;
        var topic = document.getElementById("TopicEdit").value;
        var comment = document.getElementById("CommentEdit").value;
        if (date != "" && start != "" && finish != "") {
            $.ajax({
                url: "API/submitEditAttendance.php",
                type: "POST",
                data: {
                    id: id,
                    date: date,
                    start: start,
                    finish: finish,
                    subject: subject,
                    topic: topic,
                    comment: comment,
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