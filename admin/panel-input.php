<?php

session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}

require("functions/functions.php");

$error = "";
$sukses = "";

// cek kondisi apakah sudah ditekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan
    if (createPanel($_POST) > 0) {
        $sukses = "Data berhasil ditambahkan";
    } else {
        $error = "Data gagal ditambahkan";
    }
}
?>
<?php include("components/header.php"); ?>
<div class="container">
    <h1 class="text-center">Halaman Input</h1>
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
        <a href="panel.php">
            << back to page</a>
    </div>
    <form action="" method="post">
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label" required >Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Simpan Data" name="submit">
            </div>
        </div>
    </form>
</div>

<?php include("components/footer.php"); ?>