<?php
include_once("../function/koneksi.php");
$packaging_id = $_POST['packaging_id'];
$tampil = mysqli_query($koneksi, "SELECT * from dimension where packaging_id='$packaging_id'");
$jml = mysqli_num_rows($tampil);

if ($jml > 0) {
    while ($row = mysqli_fetch_array($tampil)) {
?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
<?php
    }
} else {
    echo "<option selected>--- Dimension ---</option>";
}
?>