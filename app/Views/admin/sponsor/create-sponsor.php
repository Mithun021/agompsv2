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
                            <div class="col-md-4 form-group">
                                <span>Category Name</span>
                                <select name="sponsor_name" id="sponsor_name" class="form-control form-control-sm">
                                    <option value="">--Select--</option>
                                <?php foreach ($category as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['sponsor_categpry'] ?></option>
                                <?php } ?>
                                </select>
                            </div>
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