<?= $this->extend("admin/layouts/master") ?>
<?=  $this->section("body-content"); ?>

<!-- start page title -->
<div class="row">
<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Add Tournament</h4>
            </div>
            <?php
            if (session()->getFlashdata('status')) {
                echo session()->getFlashdata('status');
            }
            ?>
            <form action="<?= base_url() ?>admin/edit-tournament/<?= $tournament_id ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span>Tournament Title</span>
                                <input type="text" class="form-control" name="tournament_title" value="<?= $tournament_detail['title'] ?>" minlength="5" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span>League Session Name</span>
                                <select class="form-control" name="league_category_name" required>
                                    <option value="">Select League Name</option>
                                    <?php
                                    foreach ($league_session as $session) {
                                        echo '<option value="' . $session['id'] . '">' . $session['league_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>League For</span>
                                <select class="form-control" name="league_for" required>
                                    <option value="">Select League Name</option>
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                    <option value="Junior">Junior</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Game Type</span>
                                <select class="form-control" name="game_type"  id="game_type" required>
                                    <option value="">Select Game Type</option>
                                    <option value="Single">Single</option>
                                    <option value="Team">Team</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Sports Category</span>
                                <select class="form-control" name="sports_category" id="sports_category" required>
                                    <option value="">Select Sports Category</option>
                                    <?php
                                    foreach ($sports as $sports) {
                                        echo '<option value="' . $sports['id'] . '">' . $sports['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Sub Category</span>
                                <select class="form-control" name="sport_subcategory" id="sport_subcategory" required>
                                    <option value="">Select SubCategory</option>
                                   
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Required Player(min)</span>
                                <input type="number" class="form-control" name="min_players" id="min_players" placeholder="Min. Players" min="1" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Required Player(max)</span>
                                <input type="number" class="form-control" name="max_players" id="max_players" placeholder="Max. Players" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Required Age(min)</span>
                                <input type="number" class="form-control" name="min_age" id="min_age" placeholder="Min. Players Age" min="6" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <span>Required Age(max)</span>
                                <input type="number" class="form-control" name="max_age" id="max_age" placeholder="Max Players Age" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="bg-light" colspan="4">Event Venue Details <i class="fa fa-play" aria-hidden="true"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>Address</span>
                                                <input type="text" class="form-control" placeholder="Enter Address" name="venue_address" required>
                                            </td>
                                            <td>
                                                <span>City</span>
                                                <input type="text" class="form-control" placeholder="Enter City" name="venue_city" required>
                                            </td>
                                            <td>
                                                <span>State</span>
                                                <input type="text" class="form-control" placeholder="Enter State" name="venue_state">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="bg-light" colspan="4">Registration Fee Details <i class="fa fa-play" aria-hidden="true"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>Individual Entry Fee</span>
                                                <input type="number" class="form-control individual_fee" placeholder="Enter registration fee" name="registration_fee" required>
                                            </td>
                                            <td>
                                                <span>After Discount Individual Entry Fee</span>
                                                <input type="number" class="form-control individual_fee" placeholder="Enter after discount fee" name="registration_fee_after_discount" required>
                                            </td>
                                            <td>
                                                <span>Team Entry Fee</span>
                                                <input type="number" class="form-control team_fee" placeholder="Enter team entry fee" name="team_entry_fee">
                                            </td>
                                            <td>
                                                <span>Afer Dis. Team Entry Fee</span>
                                                <input type="number" class="form-control team_fee" placeholder="Enter team entry fee" name="discount_team_entry_fee">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="bg-light" colspan="3">Winner Team Rank, Price & Trophy <i class="fa fa-trophy" aria-hidden="true"></i></th>
                                        </tr>
                                        <tr>
                                            <th>1st Rank Details</th>
                                            <th>2nd Ranck Details</th>
                                            <th>3rd Rank Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="team_list">
                                        <tr>
                                            <td>
                                                <input type="number" class="form-control" placeholder="Enter 1st rank price" name="first_rank_price" required>
                                                <input type="text" class="form-control mt-1" placeholder="Enter trophy type" name="first_rank_trophy" required>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" placeholder="Enter 2nd rank price" name="second_rank_price" required>
                                                <input type="text" class="form-control mt-1" placeholder="Enter trophy type" name="second_rank_trophy" required>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" placeholder="Enter 3rd rank price" name="third_rank_price">
                                                <input type="text" class="form-control mt-1" placeholder="Enter trophy type" name="third_rank_trophy">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <span>Reg. Start Date</span>
                            <input type="date" class="form-control" name="reg_start_date" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <span>Reg. Start Date</span>
                            <input type="date" class="form-control" name="reg_end_date" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <span>Other Benefits / Offers</span>
                            <input type="text" class="form-control" name="git_hampers">
                        </div>

                    </div>
                    <div class="form-group">
                        <span>Description</span>
                        <textarea class="form-control" name="description" id="editor"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <span>Featured Image</span>
                        <input type="file" class="form-control" name="featured_image" required>
                    </div> -->
                    <div class="form-group">
                        <span>Status</span>
                        <select class="form-control" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Add Tournament</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>public/admin/assets/js/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $('#game_type').on('change',function () { 
            var game_type = $(this).val();
            if (game_type == "Team") {
                $('.individual_fee').prop("disabled",true);
                $('.individual_fee').val("");
                $('.team_fee').prop("disabled",false);
            }else if (game_type == "Single") {
                $('.individual_fee').prop("disabled",false);
                $('.team_fee').prop("disabled",true);
                $('.team_fee').val("");
            }else{
                $('.individual_fee').prop("disabled",false);
                $('.team_fee').prop("disabled",false);
                $('.team_fee').val("");
                $('.individual_fee').val("");
            }
        });

        $('#sports_category').on('change', function () { 
            var sports_id = $(this).val();
            if(sports_id!==""){
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>fetch_sports_subcategory",
                    data: {sports_id:sports_id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#sport_subcategory').empty();
                        $('#sport_subcategory').html('<option value="">Select Subcategory</option>');
                        if (response.length > 0) {
                            $.each(response, function(index, subcat) {
                                $('#sport_subcategory').append('<option value="' + subcat.id + '">' + subcat.sub_category_name + '</option>');
                            });
                        } else {
                            $('#sport_subcategory').html('<option value="">No cities available</option>');
                        }
                    }
                });
            }else{
                $('#sport_subcategory').empty();
            }
         });
    });
</script>


<?= $this->endSection() ?>