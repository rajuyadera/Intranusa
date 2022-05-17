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
$it = query("SELECT * FROM it WHERE id = $id") [0];

// cek kondisi apakah sudah ditekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diedit
    if (updateIt($_POST) > 0) {
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
        <a href="it.php">
            << back to page </a>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $it["id"]?>">
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label" required >Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $it["judul"] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $it["keterangan"] ?>">
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