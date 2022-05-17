<?php

include("admin/functions/functions.php");

$portofolio = query("SELECT * FROM portofolio");
?>


<?php
include "header.php";
?>
<!-- ======= Portfolio Section ======= -->
<div class="jumbotron jumbotron-fluid" style="background-image: url(assets/img/about/bg.jpg);">
  <div class="container">
    <h1 class="display-4">Portofolio</h1>
    <p class="lead"></p>
  </div>
</div>
<div id="portfolio" class="portfolio-area area-padding fix">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline text-center">
          <h2>Our Portfolio</h2>
        </div>
      </div>
    </div>
    <div class="row wesome-project-1 fix">
      <!-- Start Portfolio -page -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">CCTV</li>
          <li data-filter=".filter-card">SOLAR PANEL</li>
          <li data-filter=".filter-web">IT SOLUTION</li>
        </ul>
      </div>
    </div>
    <?php $i = 1; ?>
    <?php foreach ($portofolio as $row) : ?>
      <div class="row awesome-project-content portfolio-container">
        <!-- portfolio-item start -->
        <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
          <div class="single-awesome-project">
            <div class="awesome-img">
              <a href="#"><img src="admin/assets/image/portofolio/<?= $row["gambar"];?>"></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="portfolio-lightbox" data-gallery="myGallery" href="admin/assets/image/portofolio/<?= $row["gambar"];?>">
                    <h4><?= $row["judul"];?></h4>
                    <span><?= $row["alamat"];?></span>
                    <br>
                    <span><?= $row["keterangan"];?></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $i++ ?>
      <?php endforeach; ?>
      </div>
  </div>
</div>
<!-- End Portfolio Section -->
<?php
include "footer.php";
?>