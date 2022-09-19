<?php
include_once("../function/helper.php");
include_once("../function/koneksi.php");

$job_id = $_GET['job_id'];

$queryJob = mysqli_query($koneksi, "SELECT job_order.*,specialist.username,proses.process_id from job_order join specialist on job_order.specialist_id=specialist.id join proses on proses.job_id=job_order.jo_number where job_order.jo_number = '$job_id'");
$queryDraft = mysqli_query($koneksi, "SELECT artwork_draft.* from artwork_draft join job_order on artwork_draft.job_id=job_order.jo_number where artwork_draft.job_id=$job_id");
$queryFinal = mysqli_query($koneksi, "SELECT artwork_final.* from artwork_final join job_order on artwork_final.job_id=job_order.jo_number where artwork_final.job_id=$job_id");
$queryComment = mysqli_query($koneksi, "SELECT corrector_comment.comment as comment from corrector_comment join job_order on corrector_comment.jo_number=job_order.jo_number where corrector_comment.jo_number=$job_id");
$queryProses = mysqli_query($koneksi, "SELECT proses.* from proses join job_order on proses.job_id=job_order.jo_number where job_order.jo_number=$job_id");

$querySfp = mysqli_query($koneksi, "SELECT sfp.* from sfp join job_order
on sfp.job_id=job_order.jo_number where sfp.job_id=$job_id");

$queryDrawing = mysqli_query($koneksi, "SELECT drawing.* from drawing join job_order
on drawing.job_id=job_order.jo_number where drawing.job_id=$job_id ");

$queryNie = mysqli_query($koneksi, "SELECT nie.* from nie join job_order
on nie.job_id=job_order.jo_number where nie.job_id=$job_id");

$querySpm = mysqli_query($koneksi, "SELECT spm.* from spm join job_order
on spm.job_id=job_order.jo_number where spm.job_id=$job_id");

$queryProduct = mysqli_query($koneksi, "SELECT product.* from product join job_order on product.id=job_order.product_id where job_order.jo_number = '$job_id'");
$queryCC = mysqli_query($koneksi, "SELECT change_control.* from change_control join job_order on change_control.id=job_order.cc_no_id where job_order.jo_number = '$job_id'");

$row = mysqli_fetch_assoc($queryJob);
$rowDraft = mysqli_fetch_assoc($queryDraft);
$rowFinal = mysqli_fetch_assoc($queryFinal);
$rowComment = mysqli_fetch_assoc($queryComment);
$rowProses = mysqli_fetch_assoc($queryProses);
$rowSfp = mysqli_fetch_assoc($querySfp);
$rowDrawing = mysqli_fetch_assoc($queryDrawing);
$rowNie = mysqli_fetch_assoc($queryNie);
$rowSpm = mysqli_fetch_assoc($querySpm);
$rowProduct = mysqli_fetch_assoc($queryProduct);
$rowCC = mysqli_fetch_assoc($queryCC);

$jo_number = $row['jo_number'];
$artwork = explode(',', $row['artwork_status']);
$input_date = date('d-m-Y', strtotime($row['input_date']));
$due_date = date('d-m-Y', strtotime($row['due_date']));
$product_id = $row['product_id'];
$cc_no_id = $row['cc_no_id'];
$packaging_id = $row['packaging_id'];
$dimension_id = $row['dimension_id'];
$material_id = $row['material_id'];
$spesialis_id = $row['specialist_id'];
$corrector_id = $row['corrector_id'];
$drafter_id = $row['drafter_id'];
$comment = mysqli_num_rows($queryComment) != 0 ? $rowComment['comment'] : "";
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
        th {
            width: 20%;
        }

        td {
            width: fit-content;
        }
    </style>

    <title>Designer Job Order Details</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="col-md-12 py-3 px-3">
                <div class="row">
                    <div class="col">
                        <label for="JONumber" class="form-label">JO Number</label>
                        <input type="text" class="form-control" value="<?php echo $jo_number; ?>" aria-label="JONumber" disabled>
                    </div>
                    <div class="col py-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="artwork[]" type="checkbox" id="inlineCheckbox1" value="regis" <?php if (in_array("regis", $artwork)) echo "checked"; ?> disabled>
                            <label class="form-check-label" for="inlineCheckbox1">Registrasi</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="artwork[]" type="checkbox" id="inlineCheckbox2" value="launching" <?php if (in_array("launching", $artwork)) echo "checked"; ?> disabled>
                            <label class="form-check-label" for="inlineCheckbox2">Launching</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="artwork[]" type="checkbox" id="inlineCheckbox3" value="new" <?php if (in_array("new", $artwork)) echo "checked"; ?> disabled>
                            <label class="form-check-label" for="inlineCheckbox3">New</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="artwork[]" type="checkbox" id="inlineCheckbox4" value="change" <?php if (in_array("change", $artwork)) echo "checked"; ?> disabled>
                            <label class="form-check-label" for="inlineCheckbox4">Change</label>
                        </div>
                        <a href="<?php echo BASE_URL3 . "dashboard.php?id=$id"; ?>"><button class="btn btn-warning" type="button">Back</button></a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="formFile" class="form-label">Input Date</label>
                        <input type="text" class="form-control" value="<?php echo $input_date; ?>" aria-label="First name" disabled>
                    </div>
                    <div class="col">
                        <label for="formFile" class="form-label">Due Date</label>
                        <input type="text" class="form-control" value="<?php echo $due_date; ?>" aria-label="Last name" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="ProductName" class="form-label">Product Name</label>
                        <select disabled class="form-select mb-3" name="product_id" id="product_name" aria-label=".form-select-lg example">
                            <option selected>--- Product Name ---</option>
                            <?php
                            $queryProduct = mysqli_query($koneksi, "SELECT id,product_name FROM product");
                            while ($row = mysqli_fetch_assoc($queryProduct)) {
                                if ($product_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[product_name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[product_name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="GenericName" class="form-label">Generic Name</label>
                        <input type="text" id="generic_name" value="<?php echo $rowProduct['generic_name'] ?>" disabled name="generic_name" class="form-control">
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
                                if ($rowProduct['drug_id'] == $row['id']) {
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
                                if ($rowProduct['dossage_id'] == $row['id']) {
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
                                if ($rowProduct['roa_id'] == $row['id']) {
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
                        <input type="text" value="<?php echo $rowProduct['storage'] ?>" name="storage" class="form-control" id="storage" disabled>
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
                                if ($rowProduct['manufactured_id'] == $row['id']) {
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
                            <option selected disabled>--- For ---</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,name FROM company");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($rowProduct['for_id'] == $row['id']) {
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
                                if ($rowProduct['market_id'] == $row['id']) {
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
                                if ($rowProduct['import_id'] == $row['id']) {
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
                                if ($rowProduct['under_id'] == $row['id']) {
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
                                if ($rowProduct['distribute_id'] == $row['id']) {
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
                        <select disabled class="form-select mb-3" name="cc_no" id="cc_no" aria-label=".form-select-lg example">
                            <option selected>--- No Change Control ---</option>
                            <?php
                            $queryCc = mysqli_query($koneksi, "SELECT id,cc_no FROM change_control");
                            while ($row = mysqli_fetch_assoc($queryCc)) {
                                if ($cc_no_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[cc_no]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[cc_no]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="nie" class="form-label">Change Control Detail</label>
                        <textarea disabled class="form-control" name="cc_detail" rows="3"><?php echo $rowCC['cc_detail'] ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="composition" class="form-label">Composition</label>
                        <textarea disabled class="form-control" name="composition" rows="3"><?php echo $rowProduct['composition'] ?></textarea>
                    </div>
                    <div class="col">
                        <label for="persentation" class="form-label">Persentation</label>
                        <textarea disabled class="form-control" name="persentation" id="persentation" rows="3"><?php echo $rowProduct['persentation'] ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nie" class="form-label">NIE</label>
                        <input disabled type="text" name="nie" class="form-control" value="<?php echo $rowProduct['nie'] ?>" id="nie" aria-label="nie">
                    </div>
                    <div class="col">
                        <label for="distributed" class="form-label">Packaging By</label>
                        <select disabled class="form-select mb-3" name="packaging_id" id="packaging_id" aria-label=".form-select-lg example">
                            <option selected>--- Packaging ---</option>
                            <?php
                            $queryPackaging = mysqli_query($koneksi, "SELECT id,name FROM packaging");
                            while ($row = mysqli_fetch_assoc($queryPackaging)) {
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

                <div class="row mb-3">
                    <div class="col">
                        <label for="nie" class="form-label">No Item</label>
                        <input disabled type="text" name="no_item" class="form-control" value="<?php echo $rowCC['cc_no'] ?>" id="no_item">
                    </div>
                    <div class="col">
                        <label for="dimension" class="form-label">Dimension</label>
                        <select disabled class="form-select mb-3" name="dimension_id" id="dimension_id" aria-label=".form-select-lg example">
                            <option selected>--- Dimension ---</option>
                            <?php
                            $queryDimension = mysqli_query($koneksi, "SELECT id,name FROM dimension");
                            while ($row = mysqli_fetch_assoc($queryDimension)) {
                                if ($dimension_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="distributed" class="form-label">Material</label>
                        <select disabled class="form-select mb-3" name="material_id" id="material_id" aria-label=".form-select-lg example">
                            <option selected>--- Material ---</option>
                            <?php
                            $queryMaterial = mysqli_query($koneksi, "SELECT id,name FROM material");
                            while ($row = mysqli_fetch_assoc($queryMaterial)) {
                                if ($material_id == $row['id']) {
                                    echo "<option value='$row[id]' selected='true'>$row[name]</option>";
                                } else {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="specialist" class="form-label">Specialist</label>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" disabled>
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
                        </select>
                    </div>
                    <div class="col">
                        <label for="corrector" class="form-label">Corrector</label>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" disabled>
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
                        <select class="form-select mb-3" aria-label=".form-select-lg example" disabled>
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

                <div class="row">
                    <div class="col-3">
                        <label for="SFP" class="form-label">SFP</label>
                        <input type="text" class="form-control mb-2" name="sfp" id=" inputGroupFile01" disabled value="<?php echo $rowSfp['sfp_attach']; ?>">
                        <a href="<?php echo BASE_URL . "download.php?file=$rowSfp[sfp_attach]&name=sfp&job_id=$job_id"; ?>"><button type='submit' class='btn btn-primary'>Download SFP</button></a>
                    </div>
                    <div class="col-3">
                        <label for="Drawing" class="form-label">Drawing</label>
                        <input type="text" class="form-control mb-2" name="drawing" id=" inputGroupFile01" disabled value="<?php echo $rowDrawing['draw_attach']; ?>">
                        <a href="<?php echo BASE_URL . "download.php?file=$rowDrawing[draw_attach]&name=drawing&job_id=$job_id"; ?>"><button type='submit' class='btn btn-primary'>Download Drawing</button></a>
                    </div>
                    <div class="col-3">
                        <label for="NIE" class="form-label">NIE</label>
                        <input type="text" class="form-control mb-2" name="nie" id=" inputGroupFile01" disabled value="<?php echo $rowNie['nie_attach']; ?>">
                        <a href="<?php echo BASE_URL . "download.php?file=$rowNie[nie_attach]&name=nie&job_id=$job_id"; ?>"><button type='submit' class='btn btn-primary'>Download NIE</button></a>
                    </div>
                    <div class="col-3">
                        <label for="SPM" class="form-label">SPM</label>
                        <input type="text" class="form-control mb-2" name="spm" id=" inputGroupFile01" disabled value="<?php echo $rowSpm['spm_attach']; ?>">
                        <a href="<?php echo BASE_URL . "download.php?file=$rowSpm[spm_attach]&name=spm&job_id=$job_id"; ?>"><button type='submit' class='btn btn-primary'>Download SPM</button></a>
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="ArtwrokDraft" class="form-label">Artwrok Draft</label>
                    <?php
                    if (mysqli_num_rows($queryDraft) == 0) {
                        echo "
                                <input type='file' class='form-control mb-2' disabled name='artwork_draft'>
                                <button type='submit' class='btn btn-primary' disabled>Download Artwrok Final</button>
                                ";
                    } else {
                        echo "<input type='text' class='form-control mb-2' name='artwork_draft' value='$rowDraft[artwork_draft]' disabled>";
                        echo "<a href='" . BASE_URL
                            . "download.php?file=$rowDraft[artwork_draft]&name=artwork-draft'><button type='submit' class='btn btn-primary'>Download Attachment</button></a>";
                    }
                    ?>
                </div>

                <?php
                if ($rowProses['process_id'] == 2) {
                    echo "<form action='" . BASE_URL3 . "detail_action.php?job_id=$job_id' method='POST' enctype='multipart/form-data'>";
                }
                ?>
                <div class="col">
                    <?php
                    if (mysqli_num_rows($queryFinal) != 0) {
                        echo "<label for='ArtwrokFinal' class='form-label'>Artwrok Final</label>";
                        echo "<input type='text' class='form-control mb-2' name='artwork_final' value='$rowFinal[artwork_final]' disabled>";
                        echo "<a href='" . BASE_URL
                            . "download.php?file=$rowFinal[artwork_final]&name=artwork-final'><button type='submit' class='btn btn-primary'>Download Attachment</button></a>";
                        // echo "<button type='submit' class='btn btn-primary'>Download Artwrok Draft</button>";
                    } else if (mysqli_num_rows($queryFinal) == 0) {
                        if ($rowProses['process_id'] == 2) {
                            echo "<label for='ArtwrokFinal' class='form-label'>Artwrok Final</label>";
                            echo "
                            <input type='file' class='form-control mb-2' name='artwork_final'>
                            <button type='submit' class='btn btn-primary' disabled>Download Artwrok Final</button>
                            ";
                        } else {
                            echo "<label for='ArtwrokFinal' class='form-label d-none'>Artwrok Final</label>";
                            echo "
                            <input type='file' class='form-control mb-2 d-none' name='artwork_final'>
                            <button type='submit' class='btn btn-primary d-none' disabled>Download Artwrok Final</button>
                            ";
                        }
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <?php
                    if ($rowProses['process_id'] == 2) {
                        echo "<textarea class='form-control' name='comment' id='comment' rows='3'>$comment</textarea>";
                    } else {
                        echo "<textarea class='form-control' disabled name='comment' id='comment' rows='3'>$comment</textarea>";
                    }
                    ?>
                </div>

                <div class="mb-3">
                    <?php
                    if ($rowProses['process_id'] == 3) {
                        echo "
                        <input type='radio' value='Done' checked name='submit'>
                        <label>Done</label>
                        <input type='radio' value='Revisi' name='submit'>
                        <label>Revisi</label>";
                    } else if ($rowProses['process_id'] == 2) {
                        if (mysqli_num_rows($queryComment) != 0) {

                            echo "
                            <input type='radio' value='Done' name='submit'>
                            <label>Done</label>
                            <input type='radio' checked value='Revisi' name='submit'>
                            <label>Revisi</label>";
                        } else {
                            echo "
                        <input type='radio' value='Done' name='submit'>
                        <label>Done</label>
                        <input type='radio' value='Revisi' name='submit'>
                        <label>Revisi</label>";
                        }
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                    if ($rowProses['process_id'] == 2) {
                        echo "
                        <input type='submit' name='button' value='Submit' class='btn btn-primary'>";
                    } else {
                        echo "
                        <input type='submit' name='button' value='Submit' class='btn btn-primary' disabled>";
                    }
                    ?>
                    <a href="<?php echo BASE_URL3 . "dashboard.php?id=$id"; ?>"><button class="btn btn-danger" type="button">Back</button></a>
                </div>
                <?php
                if ($rowProses['process_id'] == 2) {
                    echo "</form>";
                }
                ?>
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