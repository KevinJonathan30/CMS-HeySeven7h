<?php
session_start();
require_once 'connector/connect.php';

if (isset($_SESSION["loggedin"])) {
    if(!$_GET || $_GET["id"]=="" || !ctype_digit($_GET['id'])){
        header("location:all_tests.php");
    } else {
        $id = $_GET["id"];
        $sql = "SELECT name FROM heyseven7h_tryout WHERE id=$id";
        $result = $conn->query($sql);          
        if ($result->num_rows == 0) {
            header("location:all_tests.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Test - Enterprise</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
    img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include('views/navbar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Detail Test</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tests</li>
                    <li class="breadcrumb-item"><a href="all_tests.php">All Tests</a></li>
                    <li class="breadcrumb-item active">Detail Test</li>
                </ol>
                <button class="btn btn-dark" style="float: right;" data-toggle="modal" data-target="#addNewModal">Add
                    New</button>
                <br><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        <?php 
                                $id = $_GET["id"];
                                $sql = "SELECT name FROM heyseven7h_tryout WHERE id=$id";
                                $result = $conn->query($sql);                     
                                if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo $row["name"];
                                  }
                                } else {
                                    header("location:all_tests.php");
                                }
                            ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Question ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                $sql = "SELECT * FROM heyseven7h_question WHERE tryout_id=$id";
                                                $result = $conn->query($sql);
                         
                                                if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row["id"]."</td><td><button class='btn btn-info' title='View' data-toggle='modal' data-target='#viewModal' onclick='viewQuestion(".$row["id"].")'><i class='fas fa-eye'></i></button>&nbsp;<button class='btn btn-danger' title='Delete' onclick='deleteQuestion(".$row["id"].")' data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></button></td></tr></a>";
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
    <div class="modal fade" id="viewModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <p><strong>Question: </strong><span id="question"></span></p>
                        <p><strong>Option A: </strong><span id="optionA"></span></p>
                        <p><strong>Option B: </strong><span id="optionB"></span></p>
                        <p><strong>Option C: </strong><span id="optionC"></span></p>
                        <p><strong>Option D: </strong><span id="optionD"></span></p>
                        <p><strong>Option E: </strong><span id="optionE"></span></p>
                        <p><strong>Correct Option: </strong><span id="correct"></span></p>
                        <p><strong>Pembahasan: </strong><span id="pembahasan"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this question?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This deletion cannot be restored.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="idDeletion" id="idTemp" value=0>
                    <button type="button" class="btn btn-danger" onclick="deleteQuestionById();">Delete!</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewModalLabel">Add New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Question:</label>
                    <textarea name="questionEditor" id="question-editor"></textarea><br>
                    <label>Option A:</label>
                    <textarea name="AEditor" id="a-editor"></textarea><br>
                    <label>Option B:</label>
                    <textarea name="BEditor" id="b-editor"></textarea><br>
                    <label>Option C:</label>
                    <textarea name="CEditor" id="c-editor"></textarea><br>
                    <label>Option D:</label>
                    <textarea name="DEditor" id="d-editor"></textarea><br>
                    <label>Option E:</label>
                    <textarea name="EEditor" id="e-editor"></textarea><br>
                    <div class="form-group">
                        <label for="sel1">Correct Option:</label>
                        <select class="form-control" id="sel1">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
                    </div>
                    <label>Pembahasan:</label>
                    <textarea name="pembahasanEditor" id="pembahasan-editor"></textarea><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" data-dismiss="modal" onclick="submitQuestion(<?php echo $id; ?>)"
                        class="btn btn-primary">Submit</button>
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
    function deleteQuestion(id) {
        document.getElementById("idTemp").value = id;
    }

    function deleteQuestionById() {
        let id = document.getElementById("idTemp").value;
        $.ajax({
            url: "connector/delete_question_by_id.php",
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

    function viewQuestion(id) {
        $.ajax({
            url: "connector/get_question.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                for (var prop in data) {
                    document.getElementById("question").innerHTML = data[prop].question;
                    document.getElementById("optionA").innerHTML = data[prop].answerA;
                    document.getElementById("optionB").innerHTML = data[prop].answerB;
                    document.getElementById("optionC").innerHTML = data[prop].answerC;
                    document.getElementById("optionD").innerHTML = data[prop].answerD;
                    document.getElementById("optionE").innerHTML = data[prop].answerE;
                    document.getElementById("correct").innerHTML = data[prop].correctAnswer;
                    document.getElementById("pembahasan").innerHTML = data[prop].pembahasan;
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function submitQuestion(tryout_id) {
        var questionField = tinyMCE.get('question-editor').getContent();
        var aField = tinyMCE.get('a-editor').getContent();
        var bField = tinyMCE.get('b-editor').getContent();
        var cField = tinyMCE.get('c-editor').getContent();
        var dField = tinyMCE.get('d-editor').getContent();
        var eField = tinyMCE.get('e-editor').getContent();
        var correctOption = document.getElementById("sel1").options[document.getElementById("sel1").selectedIndex].text;
        var pembahasanField = tinyMCE.get('pembahasan-editor').getContent();
        if (questionField != "" && aField != "" && bField != "" && cField != "" && dField != "" && eField != "") {            
            $.ajax({
                url: "connector/submit_question.php",
                type: "POST",
                data: {
                    questionField: questionField,
                    aField: aField,
                    bField: bField,
                    cField: cField,
                    dField: dField,
                    eField: eField,
                    correctOption: correctOption,
                    pembahasanField: pembahasanField,
                    tryout_id: tryout_id
                },
                success: function(data) {
                    if (data == "Success") {
                        window.location = window.location;
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    }
    </script>
    <script type="text/javascript"
        src='https://cdn.tiny.cloud/1/blbgb0qs6820fv3a933tg3zxgw9h192irgne74dqy8wzmtul/tinymce/5/tinymce.min.js'
        referrerpolicy="origin">
    </script>
    <script type="text/javascript">
    // Prevent Bootstrap dialog from blocking focusin
    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root")
            .length) {
            e.stopImmediatePropagation();
        }
        $('#addNewModal').on('shown.bs.modal', function() {
            $(document).off('focusin.modal');
            $('#addNewModal').on('hide.bs.modal', function() {
                $(".tox-toolbar__overflow").hide();
            })
        })
    });

    //question
    tinymce.init({
        selector: 'textarea#question-editor',
        height: 400,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //answer A
    tinymce.init({
        selector: 'textarea#a-editor',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //answer B
    tinymce.init({
        selector: 'textarea#b-editor',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //answer C
    tinymce.init({
        selector: 'textarea#c-editor',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //answer D
    tinymce.init({
        selector: 'textarea#d-editor',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //answer E
    tinymce.init({
        selector: 'textarea#e-editor',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    //pembahasan
    tinymce.init({
        selector: 'textarea#pembahasan-editor',
        height: 400,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        paste_data_images: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        images_upload_url: 'connector/post_image.php',
        convert_urls: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'connector/post_image.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
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