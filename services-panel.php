<?php

include("admin/functions/functions.php");

$panel = query("SELECT * FROM panel");
?>

<?php
include "header.php";
?>
<style media="screen">
    body {
        background: #dedddb;
    }

    .tables {
        padding-bottom: 20px;
        position: relative;
        text-align: center;
        background: #fff;
        border-radius: 10px;
        transition: all .3sease 0s;
    }

    .tittle {
        background: linear-gradient(to bottom right, #3EC1D5, #a81ff7);
        padding: 40px 20px 170px;
        margin: 0;
        font-size: 30px;
        font-weight: 600;
        position: relative;
        text-transform: uppercase;
        color: #fff;
        overflow: hidden;
    }

    .tittle::before {
        content: "";
        height: 200px;
        width: 280px;
        position: absolute;
        bottom: -175px;
        left: -46px;
        background: #fff;
        border-radius: 80px;
        transform: rotate(-85deg);
    }

    .tittle::after {
        content: "";
        height: 200px;
        width: 290px;
        position: absolute;
        top: 150px;
        right: -70px;
        bottom: auto;
        left: auto;
        background: #fff;
        border-radius: 100px;
        transform: rotate(-40deg);
    }

    .price {
        width: 120px;
        height: 120px;
        position: absolute;
        top: 100px;
        left: 50%;
        background: #fff;
        color: #404040;
        display: inline-block;
        padding: 30px 0;
        font-size: 30px;
        line-height: 50px;
        font-weight: 600;
        border-radius: 50%;
        transform: translate(-50%);
        transition: all .3s ease 0s;
        box-shadow: 0 0 0 8px rgba(0, 0, 0, .3);
    }

    .tables:hover .price {
        background: linear-gradient(to bottom right, #3EC1D5, #a81ff7);
        color: #fff;
    }

    .content {
        list-style: none;
        padding: 0;
        margin: 20px;
        text-align: left;
        transition: all .3s ease 0s;
    }

    .content li {
        padding: 7px 0 7px 50px;
        position: relative;
        color: #000;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
    }

    .content li::before {
        content: "\f00c";
        height: 24px;
        width: 24px;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        line-height: 20px;
        border-radius: 50%;
        border: 2px solid #a81ff7;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
    }

    .buy {
        background: linear-gradient(to bottom right, #3EC1D5, #a81ff7);
        position: relative;
        padding: 10px 40px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 30px;
        display: inline-block;
        color: #000;
        text-decoration: none;
        text-transform: uppercase;
        transition: all .3s ease 0s;
        z-index: 1;
    }

    .buy:hover {
        color: #fff;
    }

    .buy:before {
        content: "";
        height: 92%;
        width: 98%;
        position: absolute;
        top: 2px;
        left: 2px;
        background: #fff;
        border-radius: 30px;
        z-index: -1;
    }

    .buy:hover::before {
        background: 0 0;
    }

    @media screen and (min-widht: 375px) {
        .col {
            grid-column: span 4;
            padding: 4px;
        }
    }

    @media screen and (min-widht: 760px) {
        .col {
            width: 350px;
            padding: 4px;
        }
    }
</style>

<div class="jumbotron jumbotron-fluid" style="background-image: url(assets/img/services/panel/bg.jpg); background-repeat: no-repeat; ">
    <div class="container">
        <h1 class="display-4">Solar Cell</h1>
        <p class="lead">Berkualitas Dan Bergaransi</p>
    </div>
</div>

<!-- Product -->
<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Solar Cell</h2>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <!-- Product 1 -->
            <?php $i = 1; ?>
            <?php foreach ($panel as $row) : ?>
                <div class="col-md-4 col-sm-6 p-4">
                    <div class="tables">
                        <h3 class="tittle"><?= $row["judul"]; ?> </h3>
                        <div class="price">
                            Rp.<?= $row["harga"]; ?>jt
                        </div>
                        <ul class="content">
                            <li>2 Kamera</li>
                            <li>1 Outdoor HD 2MP</li>
                            <li>1 Indoor HD 2MP</li>
                            <li>1 DVR 4 Channel</li>
                            <li>1 HDD 250 GB</li>
                            <li>2 Unit Adaptor</li>
                        </ul>
                        <a href="https://wa.me/083899790773" class="buy">Buy Now</a>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Product -->


<?php
include "footer.php";
?>