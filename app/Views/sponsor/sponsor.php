<?= $this->extend('layouts/master') ?>
<?= $this->section('body-content') ?>

<?php

use App\Models\Sponsor_model;
use App\Models\Sponsor_package_model;
use App\Models\Sponsor_package_type_model;

$sponsor_model = new Sponsor_model();
$sponsor_package_model = new Sponsor_package_model();
$sponsor_package_type_model = new Sponsor_package_type_model();
?>

<style>
    .pricing-card {
        border-radius: 20px;
        color: #fff;
        padding: 30px 20px;
        text-align: center;
        margin: 20px 10px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .personal {
        background: linear-gradient(to bottom, #f85032, #e73827);
    }

    .standard {
        background: linear-gradient(to bottom, #000428, #004e92);
    }

    .business {
        background: linear-gradient(to bottom, #50D5B7, #067D68);
    }

    .pricing-card h3 {
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .pricing-card .icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .pricing-card .price {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .pricing-card ul {
        list-style: none;
        padding: 0;
        margin: 20px 0;
        text-align: left;
    }

    .pricing-card ul li {
        font-size: 16px;
        margin: 10px 0;
        text-align: center;
    }

    .check {
        color: #00ff90;
        margin-right: 5px;
    }

    .cross {
        color: #ff4b2b;
        margin-right: 5px;
    }

    .btn-started {
        border: none;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        margin-top: 15px;
        transition: 0.3s;
    }

    .btn-personal {
        background: #fff;
        color: #ff4b2b;
    }

    .btn-standard {
        background: #fff;
        color: #7f00ff;
    }

    .btn-business {
        background: #fff;
        color: #78ffd6;
    }

    .btn-started:hover {
        background: #333;
        color: #fff;
    }
    .pricing-card ul li:nth-child(even) {
        background: rgba(255, 255, 255, 0.5);  /* semi-transparent white background */
        padding: 5px;
        text-align: center;
    }
    .pricing-card ul li:nth-child(odd) {
        background: rgba(255, 255, 255, 0.13);  /* semi-transparent white background */
        padding: 5px;
        text-align: center;
    }
</style>
<div class="container-fluid my-5">
    <div class="row">

    <?php foreach ($sponsor_category as $key => $cat) {
            $sponsors = $sponsor_model->getByCategory($cat['id']); ?>
            <div class="col-lg-12">
                <h1 class="m-4 text-center"><?= $cat['sponsor_categpry'] ?></h1>
            </div>
            <?php if ($sponsors) {
                foreach ($sponsors as $key => $value) {
                    $package = $sponsor_package_model->get($value['package_name']);
            ?>

        <!-- Personal Plan -->
        <div class="col-md-4">
            <div class="pricing-card personal">
                <div class="icon"><i class="fas fa-file-alt"></i></div>
                <h3>PERSONAL</h3>
                <div class="price">$10<span style="font-size:16px;">/month</span></div>
                <ul>
                    <li><span class="check">&#10003;</span> Lorem ipsum sit amet</li>
                    <li><span class="check">&#10003;</span> Consectetur adipiscing</li>
                    <li><span class="check">&#10003;</span> Sed do eiusmod tempor</li>
                    <li><span class="check">&#10003;</span> Incididunt ut labore</li>
                    <li><span class="cross">&#10007;</span> Dolore magna aliqua</li>
                    <li><span class="cross">&#10007;</span> Enim ad minim veniam</li>
                </ul>
                <button class="btn-started btn-personal">GET STARTED</button>
            </div>
        </div>

        <?php } 
        }
    }?>

        

    </div>
</div>
<?= $this->endSection() ?>