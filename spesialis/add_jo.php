<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");
$id = isset($_GET['id']) ? $_GET['id'] : "";

$jo_number = "";
$artwork = "";
$input_date = "";
$due_date = "";
$prod_name = "";
$generic_name = "";
$drug_id = "";
$dosage_form = "";
$roa = "";
$storage = "";
$manufactured = "";
$for = "";
$marketed = "";
$imported = "";
$license = "";
$distributed = "";
$cc_number = "";
$cc_detail = "";
$composition = "";
$persentation = "";
$nie = "";
$packaging_id = "";
$no_item = "";
$dimension = "";
$material = "";
$corrector_id = "";
$drafter_id = "";
$artwork_draft = "";
$artwork_final = "";
$sfp = "";
$drawing = "";
$nie_att = "";
$spm = "";
$button = "Submit";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        .form-label {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
    <title>Add Job Order</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="col-md-12 py-3 px-3">
                <form action="<?php echo BASE_URL1 . "add_jo_action.php"; ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col">
                            <label for="JONumber" class="form-label">JO Number</label>
                            <input type="text" class="form-control" value="<?php echo $jo_number; ?>" aria-label="JONumber" disabled>
                        </div>
                        <div class="col py-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="artwork[]" type="checkbox" id="regis" value="regis" onclick="regis()">
                                <label class="form-check-label" for="inlineCheckbox1">Registrasi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="artwork[]" type="checkbox" id="launch" value="launching">
                                <label class="form-check-label" for="inlineCheckbox2">Launching</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="artwork[]" type="checkbox" id="new" value="new">
                                <label class="form-check-label" for="inlineCheckbox3">New</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="artwork[]" type="checkbox" id="change" value="change">
                                <label class="form-check-label" for="inlineCheckbox4">Change</label>
                            </div>
                            <a href="<?php echo BASE_URL1 . "dashboard.php?id=$id"; ?>">
                                <button class="btn btn-danger" type="button">Cancel</button></a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="formFile" class="form-label">Input Date</label>
                            <input type="date" class="form-control" name="input_date" value="<?php echo "$input_date"; ?>" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="formFile" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" value="<?php echo "$due_date"; ?>" aria-label="Last name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="ProductName" class="form-label">Product Name</label>
                            <select onchange="cek_database()" class="form-select mb-3" name="product_id" id="product_name" aria-label=".form-select-lg example">
                                <option selected disabled>--- Product Name ---</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT id,product_name FROM product");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<option value='$row[id]'>$row[product_name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="GenericName" class="form-label">Generic Name</label>
                            <input type="text" id="generic_name" disabled name="generic_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="DrugCategory" class="form-label">Drug Category</label>
                            <select disabled class="form-select mb-3" name="drug_id" id="drug_id" aria-label=".form-select-lg example">
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
                            <select class="form-select mb-3" id="dossage_id" name="dossage_id" aria-label=".form-select-lg example" disabled>
                                <option selected disabled>--- Dossage Form ---</option>
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
                            <select class="form-select mb-3" name="roa_id" aria-label=".form-select-lg example" disabled id="roa_id">
                                <option selected disabled>--- Route Of Administration ---</option>
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
                            <input type="text" name="storage" class="form-control" id="storage" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="mfg" class="form-label">Manufactured By</label>
                            <select class="form-select mb-3" id="manufactured_id" name="manufactured_id" aria-label=".form-select-lg example" disabled>
                                <option selected disabled>--- Manufactured By ---</option>
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
                            <select disabled class="form-select mb-3" name="for_id" id="for_id" aria-label=".form-select-lg example">
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
                            <select disabled class="form-select mb-3" name="market_id" id="market_id" aria-label=".form-select-lg example">
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
                            <select disabled class="form-select mb-3" name="import_id" id="import_id" aria-label=".form-select-lg example">
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
                            <select disabled class="form-select mb-3" id="under_id" name="under_id" aria-label=".form-select-lg example">
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
                            <select disabled class="form-select mb-3" name="distribute_id" id="distribute_id" aria-label=".form-select-lg example">
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
                            <label for="distributed" class="form-label">No Change Control</label>
                            <select onchange="cek_ccNo()" class="form-select mb-3" name="cc_no" id="cc_no" aria-label=".form-select-lg example">
                                <option selected disabled>--- No Change Control ---</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT id,cc_no FROM change_control");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<option value='$row[id]'>$row[cc_no]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="nie" class="form-label">Change Control Detail</label>
                            <textarea disabled class="form-control" name="cc_detail" id="cc_detail" rows="3"></textarea>
                            <!-- <input disabled type="text" name="cc_detail" class="form-control" id="cc_detail"> -->
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="composition" class="form-label">Composition</label>
                            <textarea disabled class="form-control" name="composition" id="composition" rows="3"></textarea>
                        </div>
                        <div class="col">
                            <label for="persentation" class="form-label">Persentation</label>
                            <textarea disabled class="form-control" name="persentation" id="persentation" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="nie" class="form-label">NIE</label>
                            <input disabled type="text" name="nie" class="form-control" value="<?php echo $nie; ?>" id="nie" aria-label="nie">
                        </div>
                        <div class="col">
                            <label for="distributed" class="form-label">Packaging By</label>
                            <select class="form-select mb-3" name="packaging_id" id="packaging_id" aria-label=".form-select-lg example">
                                <option selected>--- Packaging ---</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT id,name FROM packaging");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="nie" class="form-label">No Item</label>
                            <input disabled type="text" name="no_item" class="form-control" id="no_item">
                        </div>
                        <div class="col">
                            <label for="dimension" class="form-label">Dimension</label>
                            <select class="form-select mb-3" name="dimension_id" id="dimension_id" aria-label=".form-select-lg example">
                                <option selected>--- Dimension ---</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="distributed" class="form-label">Material</label>
                            <select class="form-select mb-3" name="material_id" id="material_id" aria-label=".form-select-lg example">
                                <option selected>--- Material ---</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="specialist" class="form-label">Specialist</label>
                            <input type="text" name="spesialis_id" class="form-control" value="<?php echo $specialist_name; ?>" id="material" aria-label="material" disabled>
                            <!-- <select class="form-select mb-3" name="spesialis_id" aria-label=".form-select-lg example">
                                <?php
                                echo "<option disabled selected='true'>--- Pilih Specialist ---</option>";
                                $querySpesialis = mysqli_query($koneksi, "SELECT * from specialist ");
                                while ($row = mysqli_fetch_assoc($querySpesialis)) {
                                    if ($spesialis_id == $row['id']) {
                                        echo "<option value='$row[id]' selected='true'>$row[username]</option>";
                                    } else {
                                        echo "<option value='$row[id]'>$row[username]</option>";
                                    }
                                }
                                ?>
                            </select> -->
                        </div>
                        <div class="col">
                            <label for="corrector" class="form-label">Corrector</label>
                            <select class="form-select mb-3" name="corrector_id" aria-label=".form-select-lg example">
                                <?php
                                echo "<option disabled selected='true'>---  Pilih Corrector ---</option>";
                                $queryCorector = mysqli_query($koneksi, "SELECT * from corrector");
                                while ($row = mysqli_fetch_assoc($queryCorector)) {
                                    if ($corrector_id == $row['id']) {
                                        echo "<option value='$row[id]' selected='true'>$row[username]</option>";
                                    } else {
                                        echo "<option value='$row[id]'>$row[username]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="drafter" class="form-label">Drafter</label>
                            <select class="form-select mb-3" name="drafter_id" aria-label=".form-select-lg example">
                                <?php
                                echo "<option disabled selected='true'>---  Pilih Drafter   ---</option>";
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="Attachment" class="form-label">SFP</label>
                            <input type="file" class="form-control mb-2" name="sfp" id=" inputGroupFile01"><?php echo $sfp; ?>
                            <button type="submit" class="btn btn-primary" disabled>Download SFP</button>
                        </div>
                        <div class="col-3">
                            <label for="Attachment" class="form-label">Drawing</label>
                            <input type="file" class="form-control mb-2" name="drawing" id=" inputGroupFile01"><?php echo $drawing; ?>
                            <button type="submit" class="btn btn-primary" disabled>Download Drawing</button>
                        </div>
                        <div class="col-3">
                            <label for="Attachment" class="form-label">NIE</label>
                            <input type="file" class="form-control mb-2" name="nie" id=" inputGroupFile01"><?php echo $nie_att; ?>
                            <button type="submit" class="btn btn-primary" disabled>Download NIE</button>
                        </div>
                        <div class="col-3">
                            <label for="Attachment" class="form-label">SPM</label>
                            <input type="file" class="form-control mb-2" name="spm" id=" inputGroupFile01"><?php echo $spm; ?>
                            <button type="submit" class="btn btn-primary" disabled>Download SPM</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary">
                        <a href="<?php echo BASE_URL1 . "dashboard.php?id=$id"; ?>">
                            <button class="btn btn-danger" type="button">Cancel</button></a>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $("#regis").click(function() {
            if ($(this).is(':checked')) {
                $('#launch').prop('disabled', true)
            } else {
                $('#launch').prop('disabled', false)
            }
        })
        $("#launch").click(function() {
            if ($(this).is(':checked')) {
                $('#regis').prop('disabled', true)
            } else {
                $('#regis').prop('disabled', false)
            }
        })
        $("#new").click(function() {
            if ($(this).is(':checked')) {
                $('#change').prop('disabled', true)
            } else {
                $('#change').prop('disabled', false)
            }
        })
        $("#change").click(function() {
            if ($(this).is(':checked')) {
                $('#new').prop('disabled', true)
            } else {
                $('#new').prop('disabled', false)
            }
        })
    </script>
    <script type="text/javascript">
        function cek_database() {
            var prod_name = $("#product_name").val();
            $.ajax({
                url: 'product_ajax.php',
                data: "id=" + prod_name,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#generic_name').val(obj.generic_name);
                $('#drug_id').val(obj.drug_id);
                $('#dossage_id').val(obj.dossage_id);
                $('#roa_id').val(obj.roa_id);
                $('#storage').val(obj.storage);
                $('#manufactured_id').val(obj.manufactured_id);
                $('#for_id').val(obj.for_id);
                $('#market_id').val(obj.market_id);
                $('#import_id').val(obj.import_id);
                $('#under_id').val(obj.under_id);
                $('#distribute_id').val(obj.distribute_id);
                $('#composition').val(obj.composition);
                $('#persentation').val(obj.persentation);
                $('#nie').val(obj.nie);
            });
        }

        function cek_ccNo() {
            var cc_no = $('#cc_no').val();
            $.ajax({
                url: 'cc_no_ajax.php',
                data: "cc_id=" + cc_no
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#cc_detail').val(obj.cc_detail);
                $('#no_item').val(obj.no_item);
            })
        }

        $('#packaging_id').change(function() {
            var packaging = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'dimension_ajax.php',
                data: 'packaging_id=' + packaging,
                success: function(response) {
                    $('#dimension_id').html(response);
                }
            });
        });
        $('#packaging_id').change(function() {
            var packaging = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'material_ajax.php',
                data: 'packaging_id=' + packaging,
                success: function(response) {
                    $('#material_id').html(response);
                }
            });
        });
    </script>
</body>

</html>