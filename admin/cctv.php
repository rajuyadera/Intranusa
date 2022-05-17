<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: login/index.php");
  die();
}

include("functions/functions.php");

// session login
$query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
}

// ambil data dari database
$cctv = query("SELECT * FROM cctv");

if (isset($_POST["search"])) {
  $cctv = searchCctv($_POST["keyword"]);
}
?>

<?php include("components/header.php"); ?>
<h1 class="text-center">Halaman Cctv</h1>
<form action="" class="row g-3 pb-3" method="post">
  <div class="col-auto">
    <input type="text" class="form-control" placeholder="Input key text" name="keyword" autofocus autocomplete="off">
  </div>
  <div class="col-auto">
    <button type="submit" name="search" class="btn btn-secondary">Search Text</button>
  </div>
</form>

<form action="" class="row g-3" method="get">
  <p>
    <a href="cctv-input.php">
      <input type="button" class="btn btn-primary" value="Buat Halaman Baru">
    </a>
  </p>
</form>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="col-1">No</th>
      <th>Judul</th>
      <th>Harga</th>
      <th>Specifikasi</th>
      <th class="col-2">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($cctv as $row) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["harga"]; ?></td>
        <td>
          <ul>
            <li><?= $row["specifikasi"]; ?></li>
          </ul>
        </td>
        <td>
          <a href="edit-cctv.php?id=<?= $row["id"]; ?>">
            <span class="badge bg-primary">Edit</span>
          </a>
          <a href="components/delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda ingin menghapus data?')">
            <span class="badge bg-danger">Delete</span>
          </a>
        </td>
      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
include("components/footer.php");
?>