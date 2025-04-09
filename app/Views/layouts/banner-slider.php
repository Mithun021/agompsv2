<style>
    .banner-slider .carousel-item img {
        width: 100%;
        height: 450px;
    }
</style>
<div class="row banner-slider">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-0">
                 <!-- Swiper -->
                <div class="swiper mySwiper banner_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?= base_url() ?>public/assets/images/banner/cricket.png" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url() ?>public/assets/images/banner/cricket.png" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url() ?>public/assets/images/banner/cricket.png" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url() ?>public/assets/images/banner/cricket.png" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
