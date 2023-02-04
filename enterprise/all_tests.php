<?php
session_start();
require_once 'connector/connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = trim($_POST["idDeletion"]);
    if($id != "") {
        $sql = "UPDATE heyseven7h_tryout SET linkTo='None' WHERE linkTo=$id; DELETE FROM heyseven7h_question WHERE tryout_id=$id; DELETE FROM heyseven7h_score WHERE tryout_id=$id; DELETE FROM heyseven7h_tryout WHERE id=$id";
        if ($conn->multi_query($sql) === TRUE) {
            header("location:all_tests.php");
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
    <title>All Tests - Enterprise</title>
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
                <h1 class="mt-4">All Tests</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tests</li>
                    <li class="breadcrumb-item active">All Tests</li>
                </ol>
                <a href="add_new_test.php" style="float: right;"><button class="btn btn-dark">Add New</button></a>
                <br><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Tryout Test List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tryout Name</th>
                                        <th>Time Limit</th>
                                        <th>Link To ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                $sql = "SELECT * FROM heyseven7h_tryout";
                                                $result = $conn->query($sql);
                       
                                                if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["time"]. " minutes</td><td>". $row["linkTo"] . "</td><td><a  href='test_detail.php?id=".$row["id"]."'><button class='btn btn-info' title='Detail'><i class='fas fa-bars'></i></button></a>&nbsp;<button class='btn btn-success' onclick='copyLink(".$row["id"].")' title='Copy Link'><i class='fas fa-copy'></i></button>&nbsp;
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
        <?php include('views/footer.php'); ?>
    </div>
    </div>
    <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>ID</label>
                    <input type="number" id="tryoutIDEdit" class="form-control" disabled>
                    <label>Tryout Name</label>
                    <input type="text" id="tryoutNameEdit" class="form-control">
                    <label>Tryout Time (in Minutes, 0 = Forever)</label>
                    <input type="number" value="0" id="tryoutTimeEdit" min="0" class="form-control">
                    <label for="tryoutIDLink">Link To ID</label>
                    <select class="form-control" id="tryoutIDLink">
                        <option value="None">None</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="submit_edit()" class="btn btn-warning"
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
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this test?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    All the questions linked to this test will be deleted too.
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
    <script>
    function editPage(id) {
        $.ajax({
            url: "connector/get_page_detail.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                document.getElementById("tryoutIDEdit").value = data[0].id;
                document.getElementById("tryoutNameEdit").value = data[0].name;
                document.getElementById("tryoutTimeEdit").value = data[0].time;
                var currentLink = data[0].linkTo;
                var currentId = data[0].id;
                $.ajax({
                    url: "connector/get_all_pages.php",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        var str = "<option value='None'>None</option>";
                        for (var prop in data) {
                            if (data[prop].id == currentId) {} else if (data[prop].id ==
                                currentLink) {
                                str += "<option value='" + data[prop].id + "' selected>" + data[
                                    prop].id + " - " + data[prop].name + "</option>";
                            } else {
                                str += "<option value='" + data[prop].id + "'>" + data[prop]
                                    .id + " - " + data[prop].name + "</option>";
                            }
                        }
                        document.getElementById("tryoutIDLink").innerHTML = str;
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function submit_edit() {
        var id = document.getElementById("tryoutIDEdit").value;
        var name = document.getElementById("tryoutNameEdit").value;
        var time = document.getElementById("tryoutTimeEdit").value;
        var linkTo = document.getElementById("tryoutIDLink").value;
        if (name != "" && time >= 0) {
            $.ajax({
                url: "connector/submit_edit.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    time: time,
                    linkTo: linkTo
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

    function copyLink(id) {
        var textArea = document.createElement("textarea");

        textArea.style.position = 'fixed';
        textArea.style.top = 0;
        textArea.style.left = 0;

        textArea.style.width = '2em';
        textArea.style.height = '2em';

        textArea.style.padding = 0;

        textArea.style.border = 'none';
        textArea.style.outline = 'none';
        textArea.style.boxShadow = 'none';

        textArea.style.background = 'transparent';

        textArea.value = "http://seven7h-edu.atwebpages.com/heyseven7h/student/tryout.php?id=" + id;

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
        } catch (err) {
            console.log('Oops, unable to copy');
        }

        document.body.removeChild(textArea);
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