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
                                    <?php for ($i = 1; $i <= 30; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
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
                                <input type="number" name="promotion_amount" class="form-control form-control-sm">
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
    $(document).ready(function() {
        $('#sponsor_name').on('change', function() {
            var sponsor_name = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>find-sponsor-package",
                data: {
                    sponsor_name: sponsor_name
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#package_name').html('<option value="">--Please wait--</option>');
                },
                success: function(response) {
                    $('#package_name').empty(); // Clear all previous options
                    $('#package_name').append('<option value="">--Select--</option>');

                    if (response && response.length > 0) {
                        $.each(response, function(index, category) {
                            $('#package_name').append(
                                $('<option>', {
                                    value: category.id,
                                    text: category.package_name
                                })
                            );
                        });
                    } else {
                        $('#package_name').append('<option value="">No packages found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    $('#package_name').html('<option value="">Error loading packages</option>');
                }
            });
        });

        // Find Sponsor Package Type -------------------------------------
        $('#package_name').on('change', function() {
            var package_name = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>find-sponsor-package-type",
                data: {
                    package_name: package_name
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#package_type').html('<option value="">--Please wait--</option>');
                },
                success: function(response) {
                    $('#package_type').empty(); // Clear all previous options
                    $('#package_type').append('<option value="">--Select--</option>');

                    if (response && response.length > 0) {
                        $.each(response, function(index, category) {
                            $('#package_type').append(
                                $('<option>', {
                                    value: category.id,
                                    text: category.package_type
                                })
                            );
                        });
                    } else {
                        $('#package_type').append('<option value="">Data not found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    $('#package_type').html('<option value="">Error loading packages type</option>');
                }
            });
        });
    });
</script>


<?= $this->endSection() ?>