<?= $this->extend("admin/layouts/master") ?>
<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h4 class="card-title m-0">Add <?= $title ?></h4></div>
            <form action="<?= base_url() ?>admin/sponsor-category" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <span>Category Name</span>
                        <input type="text" class="form-control form-control-sm" name="sponsor-categpry" required>
                    </div>
                </div>
                <div class="card-footer p-2">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>