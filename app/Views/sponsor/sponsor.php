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
    body {
        background-color: #f8f9fa;
    }

    .pricing-card {
        border-radius: 15px;
        padding: 40px 30px;
        text-align: center;
        background: #fff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .pricing-card:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    .plan-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 20px;
    }

    .price {
        font-size: 2.75rem;
        font-weight: bold;
        color: #0d6efd;
    }

    .features li {
        margin: 10px 0;
        font-size: 1rem;
        color: #495057;
    }

    .btn-plan {
        margin-top: 25px;
        padding: 10px 25px;
        font-weight: 600;
    }
</style>
<div class="container-fluid my-5">
    <div class="row">

        <?php foreach ($sponsor_category as $key => $cat) {
            $sponsors = $sponsor_model->getByCategory($cat['id']); ?>
            <div class="col-lg-12">
                <h3 class="m-4 text-center"><?= $cat['sponsor_categpry'] ?></h3>
            </div>
            <?php if ($sponsors) {
                foreach ($sponsors as $key => $value) { ?>
                    <div class="col-md-4">
                        <div class="pricing-card">
                            <div class="plan-title">Starter</div>
                            <div class="price">₹499</div>
                            <ul class="list-unstyled features">
                                <li>✔️ Single User</li>
                                <li>✔️ 10 Projects</li>
                                <li>✔️ Email Support</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary btn-plan">Select Plan</a>
                        </div>
                    </div>
            <?php }
            } ?>
        <?php } ?>



    </div>
</div>
<?= $this->endSection() ?>