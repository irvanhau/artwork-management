<?php
include_once("../function/helper.php");
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

    <title>User Management</title>
</head>

<body>

    <div class="main-container d-flex">
        <?php include("sidebar.php") ?>
        <div class="content">
            <div class="col-md-12 py-3 px-3">
                <div class="container-fluid px-1">
                    <button class="btn btn-primary mb-3" type="button" aria-expanded="false">
                        <a class="text-decoration-none text-center text-white" href="<?php echo BASE_URL1 . "user_form.php"; ?>">ADD USER</a>
                    </button>
                    <div class="card">
                        <div class="card-header">
                            User Management
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <?php
                                $querySpesialis = mysqli_query($koneksi, "SELECT * from specialist");
                                $queryCorrector = mysqli_query($koneksi, "SELECT * from corrector");
                                $queryDrafter = mysqli_query($koneksi, "SELECT * from drafter");
                                $role = ["Specialist", "Corrector", "Drafter"];

                                if (
                                    mysqli_num_rows($querySpesialis) == 0 and mysqli_num_rows($queryCorrector) == 0
                                    and mysqli_num_rows($queryDrafter) == 0
                                ) {
                                    echo "Saat ini belum ada data User";
                                } else {
                                    echo "<thead>";
                                    echo "<tr class='title'>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>";

                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($querySpesialis)) {
                                        echo "<tbody class='isi'>
                                    <td>$no</td>
                                    <td>$row[username]</td>
                                    <td>$role[0]</td>
                                    <td>
                                        <a href='" . BASE_URL1 . "user_form.php?user_id=$row[id]&role=SP'>
                                        <button class='btn btn-warning' type='button'>Edit</button></a>"
                                ?>

                                        <a href="<?php echo BASE_URL1 . "user_form_action.php?button=Delete&user_id=$row[id]&role=SP"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User Ini ?')">
                                            <button class='btn btn-danger' type='button'>Delete</button></a>
                                    <?php
                                        echo "</td>
                                </tbody>";
                                        $no++;
                                    }
                                    while ($row = mysqli_fetch_assoc($queryDrafter)) {
                                        echo "<tbody class='isi'>
                                    <td>$no</td>
                                    <td>$row[username]</td>
                                    <td>$role[2]</td>
                                    <td>
                                        <a href='" . BASE_URL1 . "user_form.php?user_id=$row[id]&role=DR'>
                                        <button class='btn btn-warning' type='button'>Edit</button></a>"
                                    ?>
                                        <a href=" <?php echo BASE_URL1 . "user_form_action.php?button=Delete&user_id=$row[id]&role=DR"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User Ini ?')">
                                            <button class='btn btn-danger' type='button'>Delete</button></a>
                                    <?php
                                        echo "</td>
                                </tbody>";
                                        $no++;
                                    }
                                    while ($row = mysqli_fetch_assoc($queryCorrector)) {
                                        echo "<tbody class='isi'>
                                    <td>$no</td>
                                    <td>$row[username]</td>
                                    <td>$role[1]</td>
                                    <td>
                                        <a href='" . BASE_URL1 . "user_form.php?user_id=$row[id]&role=CR'>
                                        <button class='btn btn-warning' type='button'>Edit</button></a>";
                                    ?>

                                        <a href=" <?php echo BASE_URL1 . "user_form_action.php?button=Delete&user_id=$row[id]&role=CR"; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User Ini ?')">
                                            <button class='btn btn-danger' type='button'>Delete</button></a>
                                <?php
                                        echo "</td>
                                </tbody>";
                                        $no++;
                                    }
                                }

                                ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>