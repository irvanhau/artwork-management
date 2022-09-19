<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$id = $_GET['id'];
$proses_id = "";
$specialist_id = "";
$keyword = "";
if (isset($_POST['search'])) {
    $proses_id = $_POST['proses_id'];
    $specialist_id = $_POST['specialist_id'];
    $keyword = $_POST['keyword'];
}
if ($proses_id > 0 && $specialist_id > 0) {
    $where = "WHERE ($proses_id = proses.process_id AND $specialist_id = job_order.specialist_id) AND job_order.drafter_id=$id";
} elseif ($proses_id > 0) {
    $where = "WHERE $proses_id = proses.process_id AND job_order.drafter_id=$id";
} else if ($specialist_id > 0) {
    $where = "WHERE $specialist_id = job_order.specialist_id AND job_order.drafter_id=$id";
} else {
    $where = "WHERE job_order.drafter_id=$id";
}
$likeKeyword = $keyword != "" ? "AND product.product_name LIKE '%$keyword%'" : "";
?>

<?php

?>
<!doctype html>
<html lang="en">

<head>
    <title>Dashboard Specialist</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <!--
            <nav class="navbar pb-3 sticky-top">
                <div class="container-fluid py-3">
                    <button class="btn btn-outline-success" type="button"><i class="fas fa-plus-square"></i>&nbsp Add Job Order</button>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>-->
            <div class="col-md-12 py-3 px-3">
                <!--<div class="card">
                    <div class="card-header">
                        Job Order List
                    </div>
                    <div class="card-body">-->
                <form name="filter-specialist" id="filter-specialist" action="" method="POST">
                    <div class="row mb-2">
                        <!--filter specialist-->
                        <div class="col-sm-2">
                            <select class="form-control priority selectFilter" name="specialist_id" data-tagert="">
                                <option value="0" selected="selected">Sort by Specialist</option>
                                <?php
                                $querySpesialis = mysqli_query($koneksi, "SELECT * from specialist");
                                while ($row = mysqli_fetch_assoc($querySpesialis)) {
                                    if ($specialist_id == $row['id']) {
                                        echo "<option value='$row[id]' selected='true'>$row[username]</option>";
                                    } else {
                                        echo "<option value='$row[id]'>$row[username]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!-- filter designer -->
                        <div class="col-sm-2">
                            <select class="form-control priority selectFilter" name="proses_id" data-tagert="">
                                <option selected="selected" value="0">Sort by Process</option>
                                <?php
                                $queryProses = mysqli_query($koneksi, "SELECT * from proses_detail");
                                while ($row = mysqli_fetch_assoc($queryProses)) {
                                    $id = $row['id'];
                                    $proses = $row['name'];
                                    if ($proses_id == $id) {
                                        echo "<option value='$id' selected='true'>$proses</option>";
                                    } else {
                                        echo "<option value='$id'>$proses</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="keyword" class="form-control" placeholder="Input Keyword" value="<?php echo $keyword; ?>">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary" name="search">Search</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered">
                    <?php
                    $queryJob = mysqli_query($koneksi, "SELECT product.product_name as prodName,job_order.*,specialist.username as specialist,corrector.username as corrector,proses.process_id 
                    from job_order 
                    join specialist on job_order.specialist_id=specialist.id 
                    join proses on proses.job_id=job_order.jo_number 
                    join corrector on corrector.id=job_order.corrector_id 
                    join product on product.id = job_order.product_id
                    $where $likeKeyword order by job_order.jo_number desc");
                    if (mysqli_num_rows($queryJob) == 0) {
                        echo "<center><button type='button' class='btn btn-primary btn-lg' disabled>Saat ini belum ada Job Order</button></center>";
                    } else {

                        echo "<thead>";
                        echo "<tr class='title'>
                        <th>NO</th>
                        <th>Product</th>
                        <th>Due Date</th>
                        <th>Specialist</th>
                        <th>Corrector</th>
                        <th>Process</th>
                        <th>Action</th>
                        </tr>";
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($queryJob)) {
                            $process = $row['process_id'];
                            // $process = 3;
                            if ($process == 1) {
                                $proses = "Drafting";
                            } else if ($process == 2) {
                                $proses = "Checked";
                            } else {
                                $proses = "Done";
                            }

                            echo "<tbody class='isi'>
                                    <td>$no</td>
                                    <td>$row[prodName]</td>
                                    <td>$row[due_date]</td>
                                    <td>$row[specialist]</td>
                                    <td>$row[corrector]</td>
                                    <td>$proses</td>
                                    <td>
                                        <a href='" . BASE_URL2 . "detail.php?job_id=$row[jo_number]'><button class='btn btn-danger' type='button'>Detail</button></a>
                                    </td>
                                </tbody>";
                            $no++;
                        }
                    }

                    ?>
                    <!-- <thead>
                        <tr class="title">
                            <th>No</th>
                            <th>JO</th>
                            <th>Product</th>
                            <th>Due Date</th>
                            <th>Specialist</th>
                            <th>Process</th>
                            <th>Action</th>
                        </tr>
                    <tbody class="isi">
                        <tr>
                            <td>1</td>
                            <td>1234</td>
                            <td>Paracetamol forte capsule powder for injection</td>
                            <td>31 may 2022</td>
                            <td>GMO</td>
                            <td>Drafting</td>
                            <td>
                                <button class="btn btn-danger" type="button" href="jo_details.php">Details</button>
                            </td>
                        </tr>
                    </tbody>
                    </thead> -->
                </table>
                <!--</div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</body>

</html>