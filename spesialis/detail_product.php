<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");

$product_id = $_GET['product_id'];

$queryProduct = mysqli_query($koneksi, "SELECT * from product where id='$product_id'");
$rowProduct = mysqli_fetch_assoc($queryProduct);

$prod_name = $rowProduct['product_name'];
$generic_name = $rowProduct['generic_name'];
$drug_id = $rowProduct['drug_id'];
$dossage_id = $rowProduct['dossage_id'];
$roa_id = $rowProduct['roa_id'];
$storage = $rowProduct['storage'];
$manufactured_id = $rowProduct['manufactured_id'];
$for_id = $rowProduct['for_id'];
$market_id = $rowProduct['market_id'];
$import_id = $rowProduct['import_id'];
$under_id = $rowProduct['under_id'];
$distribute_id = $rowProduct['distribute_id'];
$composition = $rowProduct['composition'];
$persentation = $rowProduct['persentation'];
$nie = $rowProduct['nie'];
$packaging_id = $rowProduct['packaging_id'];

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
        .form-label {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
    <title>Detail Product</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="col-md-12 py-3 px-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="ProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" value="<?php echo $prod_name; ?>" id="ProductName" aria-label="ProductName" disabled>
                    </div>
                    <div class="col">
                        <label for="GenericName" class="form-label">Generic Name</label>
                        <input type="text" class="form-control" value="<?php echo $generic_name; ?>" id="GenericName" aria-label="GenericName" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="DrugCategory" class="form-label">Drug Category</label>
                        <select disabled class="form-select mb-3" aria-label=".form-select-lg example">
                            <option selected>--- Drug Category ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM drug");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($drug_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="DossageForm" class="form-label">Dossage Form</label>
                        <select disabled class="form-select mb-3" name="dossage_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Dossage Form ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM dossage_form");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($dossage_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="ROA" class="form-label">Route Of Administration</label>
                        <select disabled class="form-select mb-3" name="roa_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Route Of Administration ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM roa");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($roa_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Storage" class="form-label">Storage</label>
                        <input disabled type="text" name="storage" class="form-control" value="<?php echo $storage; ?>" id="Storage" aria-label="Storage">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="mfg" class="form-label">Manufactured By</label>
                        <select disabled class="form-select mb-3" name="manufactured_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Manufactured By ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM company");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($manufactured_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="for" class="form-label">For</label>
                        <select disabled class="form-select mb-3" name="for_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- For ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM company");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($for_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="mkt" class="form-label">Marketed By</label>
                        <select disabled class="form-select mb-3" name="market_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Marketed By ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM company");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($market_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="imported" class="form-label">Imported By</label>
                        <select disabled class="form-select mb-3" name="import_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Imported By ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM export");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($import_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="licensed" class="form-label">Under License</label>
                        <select disabled class="form-select mb-3" name="under_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Under License ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM export");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($under_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="distributed" class="form-label">Distributed By</label>
                        <select disabled class="form-select mb-3" name="distribute_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Distributed By ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM export");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($distribute_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="composition" class="form-label">Composition</label>
                        <textarea disabled class="form-control" name="composition" id="composition" rows="3"><?php echo $composition; ?></textarea>
                    </div>
                    <div class="col">
                        <label for="persentation" class="form-label">Persentation</label>
                        <textarea disabled class="form-control" name="persentation" id="persentation" rows="3"><?php echo $persentation; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nie" class="form-label">NIE</label>
                        <input disabled type="text" name="nie" class="form-control" value="<?php echo $nie; ?>" id="nie" aria-label="nie">
                    </div>
                    <div class="col">
                        <label for="distributed" class="form-label">Packaging By</label>
                        <select disabled class="form-select mb-3" name="packaging_id" aria-label=".form-select-lg example" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>--- Packaging ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM packaging");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($packaging_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="my-3">
                    <a href="<?php echo BASE_URL1 . "product.php?id=$product_id"; ?>"><button class="btn btn-danger" type="button">Back</button></a>
                </div>

            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>