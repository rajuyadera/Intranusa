<?php

session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: login/index.php");
  die();
}

require("functions/functions.php");

$error = "";
$sukses = "";

// ambil data di URL
$id = $_GET["id"];
$cctv = query("SELECT * FROM cctv WHERE id = $id") [0];

// cek kondisi apakah sudah ditekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diedit
    if (updateCctv($_POST) > 0) {
        $sukses = "Data berhasil diupdate";
    } else {
        $error = "Data gagal diupdate";
    }
}
?>
<?php include("components/header.php"); ?>
<div class="container">
    <h1 class="text-center">Halaman update</h1>
    <?php
    if ($error) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php
    }
    ?>
    <?php
    if ($sukses) {
    ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php
    }
    ?>
    <div class="mb-3 row">
        <a href="cctv.php">
            << back to page cctv</a>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $cctv["id"]?>">
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label" required >Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $cctv["judul"] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $cctv["harga"] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="specifikasi" class="col-sm-2 col-form-label">specifikasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="specifikasi" name="specifikasi" value="<?= $cctv["judul"] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Update" name="submit">
            </div>
        </div>
    </form>
</div>

<?php include("components/footer.php"); ?>