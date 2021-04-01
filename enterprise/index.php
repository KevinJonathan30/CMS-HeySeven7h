<?php
session_start();
include 'connect.php';

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
    <title>Dashboard - Enterprise</title>
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
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <strong>Database Status</strong><br><br>
                                <p><i class="fa fa-server" aria-hidden="true"></i>&nbsp;
                                    <?php 
                                        if ($conn->connect_error){
                                            echo "Down";
                                        }
                                        else {
                                            echo "OK!";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                <strong>Admin Count</strong><br><br>
                                <p><i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                                    <?php 
                                        $sql = "select * from heyseven7h_admin";
                                        $result = $conn->query($sql);
                                        $admin_count = $result->num_rows;
                                        echo $admin_count
                                    ?>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <strong>Question Count</strong><br><br>
                                <p><i class="fas fa-question"></i>
                                    &nbsp;
                                    <?php 
                                        $sql = "select * from heyseven7h_question";
                                        $result = $conn->query($sql);
                                        $admin_count = $result->num_rows;
                                        echo $admin_count
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="alltests.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <strong>Submitted Tryout Count</strong><br><br>
                                <p><i class="fas fa-book-reader"></i>
                                    &nbsp;
                                    <?php 
                                        $sql = "select * from heyseven7h_score";
                                        $result = $conn->query($sql);
                                        $admin_count = $result->num_rows;
                                        echo $admin_count
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="viewscore.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Score Area Statistics
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <!--<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>-->
                </div>
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
                                                <td>" . $row["cal31"]. "</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!--<script src="assets/demo/chart-area-demo.js"></script>-->
    <!--<script src="assets/demo/chart-bar-demo.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

    <script>
    score012 = 0;
    score1325 = 0;
    score2637 = 0;
    score3850 = 0;
    score5163 = 0;
    score6475 = 0;
    score7687 = 0;
    score88100 = 0;
    maxScore = 0;
    $(document).ready(function() {
        $.ajax({
            url: "API/getScoreData.php",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                for (var prop in data) {
                    if (data[prop].score <= 13) {
                        score012++;
                    } else if (data[prop].score <= 25) {
                        score1325++;
                    } else if (data[prop].score <= 37) {
                        score2637++;
                    } else if (data[prop].score <= 50) {
                        score3850++;
                    } else if (data[prop].score <= 63) {
                        score5163++;
                    } else if (data[prop].score <= 75) {
                        score6475++;
                    } else if (data[prop].score <= 87) {
                        score7687++;
                    } else {
                        score88100++;
                    }
                }
                if (maxScore < score012) {
                    maxScore = score012;
                }
                if (maxScore < score1325) {
                    maxScore = score1325;
                }
                if (maxScore < score2637) {
                    maxScore = score2637;
                }
                if (maxScore < score3850) {
                    maxScore = score3850;
                }
                if (maxScore < score5163) {
                    maxScore = score5163;
                }
                if (maxScore < score6475) {
                    maxScore = score6475;
                }
                if (maxScore < score7687) {
                    maxScore = score7687;
                }
                if (maxScore < score88100) {
                    maxScore = score88100;
                }
                maxScore++
                Chart.defaults.global.defaultFontFamily =
                    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#292b2c';

                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["0-12", "13-25", "26-37", "38-50", "51-63", "64-75",
                            "76-87", "88-100"
                        ],
                        datasets: [{
                            label: "Counts",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: [score012, score1325, score2637, score3850,
                                score5163, score6475, score7687, score88100
                            ],
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'string'
                                },
                                gridLines: {
                                    display: true
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: maxScore,
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                        },
                        legend: {
                            display: true
                        }
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
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