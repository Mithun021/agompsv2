<?= $this->extend('layouts/master') ?>
<?= $this->section('body-content') ?>
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body">
                <h2 class="text-primary">Apply Now</h2>
                <form action="<?= base_url() ?>apply-sponsor/<?= $sponsor_id ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <span>Firm/Business/Company Name</span>
                            <input type="text" class="form-control form-control-sm" name="firm_name" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <span>Customer Name</span>
                            <input type="text" class="form-control form-control-sm" name="customer_name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <span>Customer Phone</span>
                            <input type="tel" class="form-control form-control-sm" name="phone_number" maxlength="10" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <span>Customer E-Mail</span>
                            <input type="email" class="form-control form-control-sm" name="email_id" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <span>State</span>
                            <input type="email" class="form-control form-control-sm" name="state" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <span>City</span>
                            <input type="email" class="form-control form-control-sm" name="city" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <span>Pincode</span>
                            <input type="email" class="form-control form-control-sm" name="pincode" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <span>Aadhar Number</span>
                            <input type="number" class="form-control form-control-sm" name="aadhar_no" maxlength="12" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <span>PAN Number</span>
                            <input type="text" class="form-control form-control-sm" name="pan_no" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <span>Amount</span>
                            <input type="text" class="form-control form-control-sm" name="sponsor_amount" value="<?= $sponsor_detail['discount_promotion_amount'] ??  $sponsor_detail['promotion_amount'] ?>" readonly required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-primary" value="Apply Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>