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
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-success" onclick="exportTableToXlsx()">Export to Excel</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#clearModal">Clear Monthly
                            Record</button>
                    </div>
                    <div class="col-sm-6">
                        <button style="float: right;" class="btn btn-dark" data-toggle="modal"
                            data-target="#addNewModal">Add
                            New</button>
                    </div>
                </div>


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
                                        <th colspan="34" id="monthName"></th>
                                    </tr>
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
                                        <th class="action">Edit</th>
                                        <th class="action">Delete</th>
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
                                                <td>" . $row["cal31"]. "</td><td><button class='btn btn-warning action' title='Edit' onclick='editEntry(".$row["id"].")' data-toggle='modal' data-target='#editModal'><i class='fas fa-edit'></i></button></td><td>
                                                <button class='btn btn-danger action' title='Delete' onclick='deleteEntry(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td>
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
                <!--add new modal-->
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
                <!--clear entry modal-->
                <div class="modal fade" id="clearModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Clear Monthly Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to clear the monthly record?</p>
                                <ul>
                                    <li>Have you exported the table into Excel for this month? (for backup purpose)</li>
                                    <li>This action cannot be undone</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" onclick="clearMonthlyRecord()" class="btn btn-danger"
                                    data-dismiss="modal">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--edit modal-->
                <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Entry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Student ID</label>
                                <input type="number" id="studentIDEdit" class="form-control" disabled>
                                <label>Name</label>
                                <input type="text" id="studentNameEdit" class="form-control" maxlength="200">
                                <label>Day 1</label>
                                <input type="text" maxlength="10" id="studentCal1" class="form-control">
                                <label>Day 2</label>
                                <input type="text" maxlength="10" id="studentCal2" class="form-control">
                                <label>Day 3</label>
                                <input type="text" maxlength="10" id="studentCal3" class="form-control">
                                <label>Day 4</label>
                                <input type="text" maxlength="10" id="studentCal4" class="form-control">
                                <label>Day 5</label>
                                <input type="text" maxlength="10" id="studentCal5" class="form-control">
                                <label>Day 6</label>
                                <input type="text" maxlength="10" id="studentCal6" class="form-control">
                                <label>Day 7</label>
                                <input type="text" maxlength="10" id="studentCal7" class="form-control">
                                <label>Day 8</label>
                                <input type="text" maxlength="10" id="studentCal8" class="form-control">
                                <label>Day 9</label>
                                <input type="text" maxlength="10" id="studentCal9" class="form-control">
                                <label>Day 10</label>
                                <input type="text" maxlength="10" id="studentCal10" class="form-control">
                                <label>Day 11</label>
                                <input type="text" maxlength="10" id="studentCal11" class="form-control">
                                <label>Day 12</label>
                                <input type="text" maxlength="10" id="studentCal12" class="form-control">
                                <label>Day 13</label>
                                <input type="text" maxlength="10" id="studentCal13" class="form-control">
                                <label>Day 14</label>
                                <input type="text" maxlength="10" id="studentCal14" class="form-control">
                                <label>Day 15</label>
                                <input type="text" maxlength="10" id="studentCal15" class="form-control">
                                <label>Day 16</label>
                                <input type="text" maxlength="10" id="studentCal16" class="form-control">
                                <label>Day 17</label>
                                <input type="text" maxlength="10" id="studentCal17" class="form-control">
                                <label>Day 18</label>
                                <input type="text" maxlength="10" id="studentCal18" class="form-control">
                                <label>Day 19</label>
                                <input type="text" maxlength="10" id="studentCal19" class="form-control">
                                <label>Day 20</label>
                                <input type="text" maxlength="10" id="studentCal20" class="form-control">
                                <label>Day 21</label>
                                <input type="text" maxlength="10" id="studentCal21" class="form-control">
                                <label>Day 22</label>
                                <input type="text" maxlength="10" id="studentCal22" class="form-control">
                                <label>Day 23</label>
                                <input type="text" maxlength="10" id="studentCal23" class="form-control">
                                <label>Day 24</label>
                                <input type="text" maxlength="10" id="studentCal24" class="form-control">
                                <label>Day 25</label>
                                <input type="text" maxlength="10" id="studentCal25" class="form-control">
                                <label>Day 26</label>
                                <input type="text" maxlength="10" id="studentCal26" class="form-control">
                                <label>Day 27</label>
                                <input type="text" maxlength="10" id="studentCal27" class="form-control">
                                <label>Day 28</label>
                                <input type="text" maxlength="10" id="studentCal28" class="form-control">
                                <label>Day 29</label>
                                <input type="text" maxlength="10" id="studentCal29" class="form-control">
                                <label>Day 30</label>
                                <input type="text" maxlength="10" id="studentCal30" class="form-control">
                                <label>Day 31</label>
                                <input type="text" maxlength="10" id="studentCal31" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" onclick="editStudent()" class="btn btn-warning"
                                    data-dismiss="modal">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--delete modal-->
                <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Delete Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this
                                student?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="hidden" name="idDeletion" id="idTemp" value=0>
                                <button onclick="deleteStudent()" class="btn btn-danger">Delete!</button>
                                </form>
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
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
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

    function editEntry(id) {
        $.ajax({
            url: "API/get_student_record.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                document.getElementById("studentIDEdit").value = data[0].id;
                document.getElementById("studentNameEdit").value = data[0].name;
                document.getElementById("studentCal1").value = data[0].cal1;
                document.getElementById("studentCal2").value = data[0].cal2;
                document.getElementById("studentCal3").value = data[0].cal3;
                document.getElementById("studentCal4").value = data[0].cal4;
                document.getElementById("studentCal5").value = data[0].cal5;
                document.getElementById("studentCal6").value = data[0].cal6;
                document.getElementById("studentCal7").value = data[0].cal7;
                document.getElementById("studentCal8").value = data[0].cal8;
                document.getElementById("studentCal9").value = data[0].cal9;
                document.getElementById("studentCal10").value = data[0].cal10;
                document.getElementById("studentCal11").value = data[0].cal11;
                document.getElementById("studentCal12").value = data[0].cal12;
                document.getElementById("studentCal13").value = data[0].cal13;
                document.getElementById("studentCal14").value = data[0].cal14;
                document.getElementById("studentCal15").value = data[0].cal15;
                document.getElementById("studentCal16").value = data[0].cal16;
                document.getElementById("studentCal17").value = data[0].cal17;
                document.getElementById("studentCal18").value = data[0].cal18;
                document.getElementById("studentCal19").value = data[0].cal19;
                document.getElementById("studentCal20").value = data[0].cal20;
                document.getElementById("studentCal21").value = data[0].cal21;
                document.getElementById("studentCal22").value = data[0].cal22;
                document.getElementById("studentCal23").value = data[0].cal23;
                document.getElementById("studentCal24").value = data[0].cal24;
                document.getElementById("studentCal25").value = data[0].cal25;
                document.getElementById("studentCal26").value = data[0].cal26;
                document.getElementById("studentCal27").value = data[0].cal27;
                document.getElementById("studentCal28").value = data[0].cal28;
                document.getElementById("studentCal29").value = data[0].cal29;
                document.getElementById("studentCal30").value = data[0].cal30;
                document.getElementById("studentCal31").value = data[0].cal31;
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editStudent() {
        var id = document.getElementById("studentIDEdit").value;
        var name = document.getElementById("studentNameEdit").value;
        var cal1 = document.getElementById("studentCal1").value;
        var cal2 = document.getElementById("studentCal2").value;
        var cal3 = document.getElementById("studentCal3").value;
        var cal4 = document.getElementById("studentCal4").value;
        var cal5 = document.getElementById("studentCal5").value;
        var cal6 = document.getElementById("studentCal6").value;
        var cal7 = document.getElementById("studentCal7").value;
        var cal8 = document.getElementById("studentCal8").value;
        var cal9 = document.getElementById("studentCal9").value;
        var cal10 = document.getElementById("studentCal10").value;
        var cal11 = document.getElementById("studentCal11").value;
        var cal12 = document.getElementById("studentCal12").value;
        var cal13 = document.getElementById("studentCal13").value;
        var cal14 = document.getElementById("studentCal14").value;
        var cal15 = document.getElementById("studentCal15").value;
        var cal16 = document.getElementById("studentCal16").value;
        var cal17 = document.getElementById("studentCal17").value;
        var cal18 = document.getElementById("studentCal18").value;
        var cal19 = document.getElementById("studentCal19").value;
        var cal20 = document.getElementById("studentCal20").value;
        var cal21 = document.getElementById("studentCal21").value;
        var cal22 = document.getElementById("studentCal22").value;
        var cal23 = document.getElementById("studentCal23").value;
        var cal24 = document.getElementById("studentCal24").value;
        var cal25 = document.getElementById("studentCal25").value;
        var cal26 = document.getElementById("studentCal26").value;
        var cal27 = document.getElementById("studentCal27").value;
        var cal28 = document.getElementById("studentCal28").value;
        var cal29 = document.getElementById("studentCal29").value;
        var cal30 = document.getElementById("studentCal30").value;
        var cal31 = document.getElementById("studentCal31").value;
        $.ajax({
            url: "API/update_student_record.php",
            type: "POST",
            data: {
                id: id,
                name: name,
                cal1: cal1,
                cal2: cal2,
                cal3: cal3,
                cal4: cal4,
                cal5: cal5,
                cal6: cal6,
                cal7: cal7,
                cal8: cal8,
                cal9: cal9,
                cal10: cal10,
                cal11: cal11,
                cal12: cal12,
                cal13: cal13,
                cal14: cal14,
                cal15: cal15,
                cal16: cal16,
                cal17: cal17,
                cal18: cal18,
                cal19: cal19,
                cal20: cal20,
                cal21: cal21,
                cal22: cal22,
                cal23: cal23,
                cal24: cal24,
                cal25: cal25,
                cal26: cal26,
                cal27: cal27,
                cal28: cal28,
                cal29: cal29,
                cal30: cal30,
                cal31: cal31
            },
            success: function(data) {
                location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteEntry(id) {
        document.getElementById("idTemp").value = id;
    }

    function deleteStudent() {
        var id = document.getElementById("idTemp").value;
        $.ajax({
            url: "API/delete_student_record.php",
            type: "POST",
            data: {
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

    function clearMonthlyRecord() {
        var id = document.getElementById("idTemp").value;
        $.ajax({
            url: "API/clear_student_record.php",
            type: "POST",
            success: function(data) {
                location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function exportTableToXlsx() {
        var today = new Date();
        $('.action').remove();
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], {
            name: today + '_Students.xlsx',
            sheet: {
                name: 'Sheet1'
            }
        });
        setTimeout(function() {
            location.reload();
        }, 5000);

    }

    $(document).ready(function() {
        const date = new Date();
        const month = date.toLocaleString('default', {
            month: 'long'
        });
        $("#monthName").html(month + " " + date.getFullYear())
    });
    </script>
</body>

</html>
<?php

}
else{
    header("location:login.php");
}
?>