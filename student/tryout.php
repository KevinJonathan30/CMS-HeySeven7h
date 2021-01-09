<?php
session_start();
require_once 'connect.php';

if(!$_GET || $_GET["id"]=="" || !ctype_digit($_GET['id'])){
    header("location:index.php");
} else {
    $id = $_GET["id"];
    $sql = "SELECT name FROM heyseven7h_tryout WHERE id=$id";
    $result = $conn->query($sql);                     
    if ($result->num_rows == 0) {
        header("location:index.php");
    }
}
if(isset($_COOKIE["student_name"])) {

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Try Out Online - Seven7h Edu Course</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Seven7h Edu</a>
            <span class="navbar-text" id="time">
                00:00
            </span>
        </div>
    </nav>
    <div class="container" style="margin-top:30px; margin-bottom:30px;">
    <input type="hidden" value="<?php echo $id; ?>" id="tryoutId">
        <?php 
            $sql = "SELECT * FROM heyseven7h_question WHERE tryout_id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["correctAnswer"] == "A") {
                        echo $row["question"]."<div class='form-check'>
                  <label class='form-check-label'>
                      <input type='radio' class='form-check-input correct' name='optradio".$row["id"]."'>".$row["answerA"]."</label>
                      </div>"."<div class='form-check'>
                      <label class='form-check-label'>
                          <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerB"]."</label>
                          </div>"."<div class='form-check'>
                          <label class='form-check-label'>
                              <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerC"]."</label>
                              </div>"."<div class='form-check'>
                              <label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerD"]."</label>
                                  </div>"."<div class='form-check'>
                                  <label class='form-check-label'>
                                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerE"]."</label>
                                      </div>"."<br>";
                    } else if($row["correctAnswer"] == "B") {
                        echo $row["question"]."<div class='form-check'>
                  <label class='form-check-label'>
                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerA"]."</label>
                      </div>"."<div class='form-check'>
                      <label class='form-check-label'>
                          <input type='radio' class='form-check-input correct' name='optradio".$row["id"]."'>".$row["answerB"]."</label>
                          </div>"."<div class='form-check'>
                          <label class='form-check-label'>
                              <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerC"]."</label>
                              </div>"."<div class='form-check'>
                              <label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerD"]."</label>
                                  </div>"."<div class='form-check'>
                                  <label class='form-check-label'>
                                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerE"]."</label>
                                      </div>"."<br>";
                    } else if($row["correctAnswer"] == "C") {
                        echo $row["question"]."<div class='form-check'>
                  <label class='form-check-label'>
                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerA"]."</label>
                      </div>"."<div class='form-check'>
                      <label class='form-check-label'>
                          <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerB"]."</label>
                          </div>"."<div class='form-check'>
                          <label class='form-check-label'>
                              <input type='radio' class='form-check-input correct' name='optradio".$row["id"]."'>".$row["answerC"]."</label>
                              </div>"."<div class='form-check'>
                              <label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerD"]."</label>
                                  </div>"."<div class='form-check'>
                                  <label class='form-check-label'>
                                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerE"]."</label>
                                      </div>"."<br>";
                    } else if($row["correctAnswer"] == "D") {
                        echo $row["question"]."<div class='form-check'>
                  <label class='form-check-label'>
                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerA"]."</label>
                      </div>"."<div class='form-check'>
                      <label class='form-check-label'>
                          <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerB"]."</label>
                          </div>"."<div class='form-check'>
                          <label class='form-check-label'>
                              <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerC"]."</label>
                              </div>"."<div class='form-check'>
                              <label class='form-check-label'>
                                  <input type='radio' class='form-check-input correct' name='optradio".$row["id"]."'>".$row["answerD"]."</label>
                                  </div>"."<div class='form-check'>
                                  <label class='form-check-label'>
                                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerE"]."</label>
                                      </div>"."<br>";
                    } else {
                            echo $row["question"]."<div class='form-check'>
                      <label class='form-check-label'>
                          <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerA"]."</label>
                          </div>"."<div class='form-check'>
                          <label class='form-check-label'>
                              <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerB"]."</label>
                              </div>"."<div class='form-check'>
                              <label class='form-check-label'>
                                  <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerC"]."</label>
                                  </div>"."<div class='form-check'>
                                  <label class='form-check-label'>
                                      <input type='radio' class='form-check-input' name='optradio".$row["id"]."'>".$row["answerD"]."</label>
                                      </div>"."<div class='form-check'>
                                      <label class='form-check-label'>
                                          <input type='radio' class='form-check-input correct' name='optradio".$row["id"]."'>".$row["answerE"]."</label>
                                          </div>"."<br>";
                    }
                  
                } 
              } 
              $conn->close();
        ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            onclick="submitResult();">
            Submit
        </button>
        <br>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Hasil Tryout</h5>
                    </div>
                    <div class="modal-body">
                        <p id="score"></p>
                        <p id="warning"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="retryCounter()" data-bs-dismiss="modal"
                            id="retryButton">Retry</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
<?php 
} else {
    header("location: welcome.php?id=".$id);
}

?>