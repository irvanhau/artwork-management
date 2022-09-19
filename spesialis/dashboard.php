<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$id = $_GET['id'];
$proses_id = "";
$drafter_id = "";
$corrector_id = "";
$keyword = "";
if (isset($_POST['search'])) {
    $proses_id = $_POST['proses_id'];
    $drafter_id = $_POST['drafter_id'];
    $corrector_id = $_POST['corrector_id'];
    $keyword = $_POST['keyword'];
}
if ($proses_id > 0 && $drafter_id > 0 && $corrector_id > 0) {
    $where = "WHERE ($proses_id = proses.process_id AND $drafter_id = job_order.drafter_id 
                        AND $corrector_id=job_order.corrector_id) and job_order.specialist_id=$id";
} elseif ($proses_id > 0) {
    $where = "WHERE $proses_id = proses.process_id  and job_order.specialist_id=$id";
} else if ($drafter_id > 0) {
    $where = "WHERE $drafter_id = job_order.drafter_id  and job_order.specialist_id=$id";
} else {
    $where = "WHERE job_order.specialist_id=$id";
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
            <div class="col-md-12 py-3 px-3">
                <form name="filter-specialist" id="filter-specialist" action="" method="POST">
                    <div class="row mb-2">
                        <div class="col-sm-2">
                            <a href="<?php echo BASE_URL1 . "add_jo.php?id=$id"; ?>" class="text-decoration-none text-white"><button class="btn btn-success" type="button"> Add Job Order</button></a>
                        </div>
                        <!--filter drafter-->
                        <div class="col-sm-2">
                            <select class="form-control priority selectFilter" name="drafter_id" data-tagert="">
                                <option value="0" selected="selected">Sort by Drafter</option>
                                <?php
                                $queryDrafter = mysqli_query($koneksi, "SELECT * from drafter");
                                while ($row = mysqli_fetch_assoc($queryDrafter)) {
                                    if ($drafter_id == $row['id']) {
                                        echo "<option value='$row[id]' selected='true'>$row[username]</option>";
                                    } else {
                                        echo "<option value='$row[id]'>$row[username]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!--filter corrector-->
                        <div class="col-sm-2">
                            <select class="form-control priority selectFilter" name="corrector_id" data-tagert="">
                                <option value="0" selected="selected">Sort by Corrector</option>
                                <?php
                                $queryCorrector = mysqli_query($koneksi, "SELECT * from corrector");
                                while ($row = mysqli_fetch_assoc($queryCorrector)) {
                                    if ($corrector_id == $row['id']) {
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
                            <button class="btn btn-success" name="search">Search</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered">
                    <?php
                    $queryJob = mysqli_query(
                        $koneksi,
                        "SELECT job_order.*,product.product_name as prod_name,corrector.username as corrector,proses.process_id,drafter.username as drafter 
                    from job_order 
                    join corrector on job_order.corrector_id=corrector.id 
                    join proses on proses.job_id=job_order.jo_number 
                    join drafter on job_order.drafter_id = drafter.id
                    join product on job_order.product_id=product.id
                    $where $likeKeyword order by job_order.jo_number desc"
                    );
                    if (mysqli_num_rows($queryJob) == 0) {
                        echo "<center><button type='button' class='btn btn-primary btn-lg' disabled>
                        Saat ini belum ada data User</button></center>";
                    } else {

                        echo "<thead>";
                        echo "<tr class='title'>
                        <th>NO</th>
                        <th>Product</th>
                        <th>Due Date</th>
                        <th>Drafter</th>
                        <th>Corrector</th>
                        <th>Process</th>
                        <th>Action</th>
                        </tr>";
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($queryJob)) {
                            $process = $row['process_id'];
                            if ($process == 1) {
                                $proses = "Drafting";
                            } else if ($process == 2) {
                                $proses = "Checked";
                            } else {
                                $proses = "Done";
                            }

                            echo "<tbody class='isi'>
                                    <td>$no</td>
                                    <td>$row[prod_name]</td>
                                    <td>$row[due_date]</td>
                                    <td>$row[drafter]</td>
                                    <td>$row[corrector]</td>
                                    <td>$proses</td>
                                    <td>
                                        <a href='" . BASE_URL1 . "detail.php?job_id=$row[jo_number]'><button class='btn btn-primary' type='button'>Detail</button></a>
                                    </td>
                                </tbody>";
                            $no++;
                        }
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>