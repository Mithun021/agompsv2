
                </div>
                <!-- End Page-content -->
                 <br><br><br>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center text-lg-left">
                                    2024 © Agomps India.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-right d-none d-lg-block">
                                    Design & Develop by Sarvin
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="text-right d-none d-lg-block">
                                   <a href="<?= base_url() ?>privacy-policy">Privacy Policy</a> | 
                                   <a href="<?= base_url() ?>term-condition">Terms</a> | 
                                   <a href="<?= base_url() ?>refund">Refund</a> | 
                                   <a href="<?= base_url() ?>contact">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- jQuery  -->
        <script src="<?= base_url() ?>public/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>public/assets/js/waves.js"></script>
        <script src="<?= base_url() ?>public/assets/js/simplebar.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url() ?>public/assets/js/theme.js"></script>

        <!-- Additional JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
            // var swiper = new Swiper(".mySwiper", {
            //     slidesPerView: 4,
            //     spaceBetween: 10,
            //     navigation: {
            //         nextEl: ".swiper-button-next",
            //         prevEl: ".swiper-button-prev",
            //     },
            //     pagination: {
            //         el: ".swiper-pagination",
            //         clickable: true,
            //     },
            //     breakpoints: {
            //         1024: { slidesPerView: 4 },
            //         768: { slidesPerView: 3 },
            //         480: { slidesPerView: 1 }
            //     }
            // });
        </script>
    </body>

</html>