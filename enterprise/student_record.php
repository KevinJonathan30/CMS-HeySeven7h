<?php
session_start();
require_once 'connector/connect.php';

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
    <?php include('views/navbar.php'); ?>
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
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM heyseven7h_attendance";
                                        $result = $conn->query($sql);
                         
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                <td contenteditable='true' id='studentNameEditId" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["name"]. "</td>
                                                <td contenteditable='true' id='studentCal1Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal1"]. "</td>
                                                <td contenteditable='true' id='studentCal2Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal2"]. "</td>
                                                <td contenteditable='true' id='studentCal3Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal3"]. "</td>
                                                <td contenteditable='true' id='studentCal4Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal4"]. "</td>
                                                <td contenteditable='true' id='studentCal5Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal5"]. "</td>
                                                <td contenteditable='true' id='studentCal6Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal6"]. "</td>
                                                <td contenteditable='true' id='studentCal7Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal7"]. "</td>
                                                <td contenteditable='true' id='studentCal8Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal8"]. "</td>
                                                <td contenteditable='true' id='studentCal9Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal9"]. "</td>
                                                <td contenteditable='true' id='studentCal10Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal10"]. "</td>
                                                <td contenteditable='true' id='studentCal11Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal11"]. "</td>
                                                <td contenteditable='true' id='studentCal12Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal12"]. "</td>
                                                <td contenteditable='true' id='studentCal13Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal13"]. "</td>
                                                <td contenteditable='true' id='studentCal14Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal14"]. "</td>
                                                <td contenteditable='true' id='studentCal15Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal15"]. "</td>
                                                <td contenteditable='true' id='studentCal16Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal16"]. "</td>
                                                <td contenteditable='true' id='studentCal17Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal17"]. "</td>
                                                <td contenteditable='true' id='studentCal18Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal18"]. "</td>
                                                <td contenteditable='true' id='studentCal19Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal19"]. "</td>
                                                <td contenteditable='true' id='studentCal20Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal20"]. "</td>
                                                <td contenteditable='true' id='studentCal21Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal21"]. "</td>
                                                <td contenteditable='true' id='studentCal22Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal22"]. "</td>
                                                <td contenteditable='true' id='studentCal23Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal23"]. "</td>
                                                <td contenteditable='true' id='studentCal24Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal24"]. "</td>
                                                <td contenteditable='true' id='studentCal25Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal25"]. "</td>
                                                <td contenteditable='true' id='studentCal26Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal26"]. "</td>
                                                <td contenteditable='true' id='studentCal27Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal27"]. "</td>
                                                <td contenteditable='true' id='studentCal28Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal28"]. "</td>
                                                <td contenteditable='true' id='studentCal29Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal29"]. "</td>
                                                <td contenteditable='true' id='studentCal30Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal30"]. "</td>
                                                <td contenteditable='true' id='studentCal31Id" . $row["id"] . "' onfocusout='onEntryEdit(" . $row["id"] . ")'>" . $row["cal31"]. "</td>
                                                <td><button class='btn btn-danger action' title='Delete' onclick='deleteEntry(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td>
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
        <?php include('views/footer.php'); ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    <script>
    function addStudent() {
        var name = document.getElementById("nameAdd").value;
        if (name != "") {
            $.ajax({
                url: "connector/add_student_record.php",
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

    $(document).keypress(
        function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });

    function onEntryEdit(id) {
        var name = document.getElementById("studentNameEditId" + id).innerHTML;
        var cal1 = document.getElementById("studentCal1Id" + id).innerHTML;
        var cal2 = document.getElementById("studentCal2Id" + id).innerHTML;
        var cal3 = document.getElementById("studentCal3Id" + id).innerHTML;
        var cal4 = document.getElementById("studentCal4Id" + id).innerHTML;
        var cal5 = document.getElementById("studentCal5Id" + id).innerHTML;
        var cal6 = document.getElementById("studentCal6Id" + id).innerHTML;
        var cal7 = document.getElementById("studentCal7Id" + id).innerHTML;
        var cal8 = document.getElementById("studentCal8Id" + id).innerHTML;
        var cal9 = document.getElementById("studentCal9Id" + id).innerHTML;
        var cal10 = document.getElementById("studentCal10Id" + id).innerHTML;
        var cal11 = document.getElementById("studentCal11Id" + id).innerHTML;
        var cal12 = document.getElementById("studentCal12Id" + id).innerHTML;
        var cal13 = document.getElementById("studentCal13Id" + id).innerHTML;
        var cal14 = document.getElementById("studentCal14Id" + id).innerHTML;
        var cal15 = document.getElementById("studentCal15Id" + id).innerHTML;
        var cal16 = document.getElementById("studentCal16Id" + id).innerHTML;
        var cal17 = document.getElementById("studentCal17Id" + id).innerHTML;
        var cal18 = document.getElementById("studentCal18Id" + id).innerHTML;
        var cal19 = document.getElementById("studentCal19Id" + id).innerHTML;
        var cal20 = document.getElementById("studentCal20Id" + id).innerHTML;
        var cal21 = document.getElementById("studentCal21Id" + id).innerHTML;
        var cal22 = document.getElementById("studentCal22Id" + id).innerHTML;
        var cal23 = document.getElementById("studentCal23Id" + id).innerHTML;
        var cal24 = document.getElementById("studentCal24Id" + id).innerHTML;
        var cal25 = document.getElementById("studentCal25Id" + id).innerHTML;
        var cal26 = document.getElementById("studentCal26Id" + id).innerHTML;
        var cal27 = document.getElementById("studentCal27Id" + id).innerHTML;
        var cal28 = document.getElementById("studentCal28Id" + id).innerHTML;
        var cal29 = document.getElementById("studentCal29Id" + id).innerHTML;
        var cal30 = document.getElementById("studentCal30Id" + id).innerHTML;
        var cal31 = document.getElementById("studentCal31Id" + id).innerHTML;
        $.ajax({
            url: "connector/update_student_record.php",
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
                console.log(data);
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
            url: "connector/delete_student_record.php",
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
        $.ajax({
            url: "connector/clear_student_record.php",
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

    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $("table td").blur();
        }
    });
    </script>
</body>

</html>
<?php

}
else {
    header("location:login.php");
}
?>