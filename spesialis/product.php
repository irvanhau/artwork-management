<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$id = $_GET['id'];

$keyword = "";
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}

$likeKeyword = $keyword != "" ? "WHERE product.product_name LIKE '%$keyword%' or product.generic_name LIKE '%$keyword%' or dossage_form.name like '%$keyword%' or product.nie like '%$keyword%'" : "";
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
                            <a href="<?php echo BASE_URL1 . "add_product.php?id=$id"; ?>" class="text-decoration-none text-white"><button class="btn btn-success" type="button"> Add Product</button></a>
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
                    $queryProduct = mysqli_query($koneksi, "SELECT product.*,dossage_form.name as name
                    from product 
                    left join dossage_form on product.dossage_id=dossage_form.id
                    $likeKeyword
                    order by product.id desc");
                    if (mysqli_num_rows($queryProduct) == 0) {
                        echo "<center><button type='button' class='btn btn-primary btn-lg' disabled>
                        Saat ini belum ada data User</button></center>";
                    } else {

                        echo "<thead>";
                        echo "<tr class='title'>
                        <th>NO</th>
                        <th>Product Name</th>
                        <th>Generic Name</th>
                        <th>Dossage Form</th>
                        <th>NIE</th>
                        <th>Action</th>
                        </tr>";
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($queryProduct)) {
                            echo "<tbody class='isi'>
                                <td>$no</td>
                                <td>$row[product_name]</td>
                                <td>$row[generic_name]</td>
                                <td>$row[name]</td>
                                <td>$row[nie]</td>
                                <td>
                                    <a href='" . BASE_URL1 . "add_product.php?product_id=$row[id]'><button class='btn btn-warning' type='button'>Edit</button></a>
                                    <a href='" . BASE_URL1 . "detail_product.php?product_id=$row[id]'><button class='btn btn-primary' type='button'>Detail</button></a>";
                    ?>
                            <a href=" <?php echo BASE_URL1 . "add_product_action.php?button=Delete&product_id=$row[id]"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Product Ini ?')">
                                <button class='btn btn-danger' type='button'>Delete</button></a>
                    <?php
                            echo "</td>
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