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
                            <div class="col-md-4 form-group">
                                <span>Package Name</span>
                                <select name="package_name" id="package_name" class="form-control form-control-sm">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <span>Package Type</span>
                                <select name="package_type" id="package_type" class="form-control form-control-sm">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <span>Promotion Days</span>
                                <select name="promotion_days" class="form-control form-control-sm">
                                    <option value="">--Select--</option>
                                    <?php for ($i=0; $i <= 30 ; $i++) { 
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    } ?>
                                    <option value="Parmanent">Parmanent</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <span>Promotion Location</span>
                                <select name="promotion_location" id="promotion_location" class="form-control form-control-sm">
                                    <option value="">--Select--</option>
                                    <option value="Home (Footer)">Home (Footer)</option>
                                    <option value="Side Panel">Side Panel</option>
                                    <option value="Top Slider">Top Slider</option>
                                    <option value="Sponsors Section">Sponsors Section</option>
                                    <option value="Blog/News">Blog/News</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <span>Price (INR)</span>
                                <input type="number" class="promotion_amount" class="form-control form-control-sm">
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

<!-- jQuery  -->
<script src="<?= base_url() ?>public/admin/assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        
    });
</script>


<?= $this->endSection() ?>