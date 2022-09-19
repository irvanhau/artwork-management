<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");
?>

<?php

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.4s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
    <title>Analytics</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Home')">Summary</button>
                <button class="tablinks" onclick="openTab(event, 'SP')">Specialist</button>
                <button class="tablinks" onclick="openTab(event, 'DR')">Drafter</button>
                <button class="tablinks" onclick="openTab(event, 'CR')">Corrector</button>
            </div>

            <div id="Home" class="tabcontent" class="col-md-12 py-3 px-3">
                <div class="container-fluid px-1">
                    <div style="width: 600px;">
                        <canvas id="myChartSummary"></canvas>
                    </div>
                </div>
            </div>
            <div id="SP" class="tabcontent" class="col-md-12 py-3 px-3">
                <div class="container-fluid px-1">
                    <div style="width: 600px;">
                        <canvas id="myChartSp"></canvas>
                    </div>
                </div>
            </div>
            <div id="DR" class="tabcontent" class="col-md-12 py-3 px-3">
                <div class="container-fluid px-1">
                    <div style="width: 600px;">
                        <canvas id="myChartDr"></canvas>
                    </div>
                </div>
            </div>
            <div id="CR" class="tabcontent" class="col-md-12 py-3 px-3">
                <div class="container-fluid px-1">
                    <div style="width: 600px;">
                        <canvas id="myChartCr"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $.getJSON("http://localhost/APP/data_analytic_sp.php", function(data) {
            // buat array untuk label nama username
            var labels = []

            // buat array berdasarkan proses
            var drafting = []
            var checked = []
            var done = []

            $(data).each(function(i) {
                labels.push(data[i].username);
                drafting.push(data[i].Drafting);
                checked.push(data[i].Checked);
                done.push(data[i].Done);
            });


            var ctx = document.getElementById("myChartSp").getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Drafting',
                            backgroundColor: "pink",
                            borderColor: "red",
                            borderWidth: 1,
                            data: drafting
                        },
                        {
                            label: 'Checked',
                            backgroundColor: "lightblue",
                            borderColor: "blue",
                            borderWidth: 1,
                            data: checked
                        },
                        {
                            label: 'Done',
                            backgroundColor: "yellow",
                            borderColor: "gold",
                            borderWidth: 1,
                            data: done
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        $.getJSON("http://localhost/APP/data_analytic_dr.php", function(data) {
            // buat array untuk label nama username
            var labels = []

            // buat array berdasarkan proses
            var drafting = []
            var checked = []
            var done = []

            $(data).each(function(i) {
                labels.push(data[i].username);
                drafting.push(data[i].Drafting);
                checked.push(data[i].Checked);
                done.push(data[i].Done);
            });


            var ctx = document.getElementById("myChartDr").getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Drafting',
                            backgroundColor: "pink",
                            borderColor: "red",
                            borderWidth: 1,
                            data: drafting
                        },
                        {
                            label: 'Checked',
                            backgroundColor: "lightblue",
                            borderColor: "blue",
                            borderWidth: 1,
                            data: checked
                        },
                        {
                            label: 'Done',
                            backgroundColor: "yellow",
                            borderColor: "gold",
                            borderWidth: 1,
                            data: done
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        $.getJSON("http://localhost/APP/data_analytic_cr.php", function(data) {
            // buat array untuk label nama username
            var labels = []

            // buat array berdasarkan proses
            var drafting = []
            var checked = []
            var done = []

            $(data).each(function(i) {
                labels.push(data[i].username);
                drafting.push(data[i].Drafting);
                checked.push(data[i].Checked);
                done.push(data[i].Done);
            });


            var ctx = document.getElementById("myChartCr").getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Drafting',
                            backgroundColor: "pink",
                            borderColor: "red",
                            borderWidth: 1,
                            data: drafting
                        },
                        {
                            label: 'Checked',
                            backgroundColor: "lightblue",
                            borderColor: "blue",
                            borderWidth: 1,
                            data: checked
                        },
                        {
                            label: 'Done',
                            backgroundColor: "yellow",
                            borderColor: "gold",
                            borderWidth: 1,
                            data: done
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        $.getJSON("http://localhost/APP/data_analytic_summary.php", function(data) {
            // buat array untuk label nama username

            // buat array berdasarkan proses
            var drafting = []
            var checked = []
            var done = []

            $(data).each(function(i) {
                drafting.push(data[i].Drafting);
                checked.push(data[i].Checked);
                done.push(data[i].Done);
            });


            var ctx = document.getElementById("myChartSummary").getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Drafting", "Checked", "Done"],
                    datasets: [{
                        label: 'Drafting',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        borderWidth: 4,
                        data: [drafting, checked, done]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        function openTab(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>