<?php
require_once "connect.php";
 
$name = "";
$name_err = "";

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["name"]))){
        $name_err = "Tolong masukkan nama!";
    } else{
        $name = trim($_POST["name"]);
    }
    $newId = $_POST["id"];
    
    if(empty($name_err)){
        $cookieName = "student_name";
        setcookie($cookieName, $name, time() + (86400 * 30), "/");
        header("location: tryout.php?id=".$newId);
    }
}
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Seven7h Edu</a>
        </div>
    </nav>
    <div class="container" style="margin-top:30px; margin-bottom:30px;">
        <b>
            <p>Selamat datang di halaman Try Out ini.</p>
        </b>
        <p>Try Out ini terdiri dari 4 bagian:</p>
        <ol>
            <li>Penalaran Umum (35 Menit)</li>
            <li>Pemahaman Bacaan dan Menulis (25 Menit)</li>
            <li>Pengetahuan dan Pemahaman Umum (25 Menit)</li>
            <li>Pengetahuan Kuantitatif (35 Menit)</li>
        </ol>
        <u>
            <p>Ketentuan dalam pengerjaan:</p>
        </u>
        <ul>
            <li>Harap mengerjakan Try Out dengan jujur</li>
            <li>Jangan beralih dari halaman Try Out saat mengerjakan Try Out</li>
            <li>Harap isi semua jawaban di setiap bagian Try Out sebelum menuju ke bagian Try Out berikutnya</li>
            <li>Peserta dimohon menjawab semua pertanyaan yang terdapat di setiap bagian Try Out sebelum waktunya habis
                dan dialihkan ke bagian berikutnya</li>
            <li>Harap mengisi kolom dibawah ini dengan nama lengkap agar jawaban Try Out dianggap valid</li>
        </ul>
        <b>
            <p>Masukkan nama:</p>
        </b>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="name" class="form-control" id="namaPartisipan" placeholder="Masukkan namamu" maxlength="100"><br>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <button type="submit" class="btn btn-primary" >Mulai Try Out!</button>
            <p style="color: red;"><?php echo $name_err; ?></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="js/script.js"></script>-->
</body>

</html>