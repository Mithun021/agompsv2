<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-0">Add <?= $title ?></h4>
                </div>
                <form action="<?= base_url() ?>admin/create-sponsor" method="post">
                    <div class="card-body p-2">
                        <?php
                        if (session()->getFlashdata('status')) {
                            echo session()->getFlashdata('status');
                        }
                        ?>
                        <div class="row">

                        </div>
                    </div>
                    <div class="card-footer p-2">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>