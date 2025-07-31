               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                    <?= date('Y') ?> © <a href="<?= base_url() ?>"><?= $_CONFIG['title'] ?></a>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
<? require _DIR_('library/modal') ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?= assets('js/jquery.min.js') ?>"></script>
      <script src="<?= assets('js/popper.min.js') ?>"></script>
      <script src="<?= assets('js/bootstrap.min.js') ?>"></script>
      <script src="<?= assets('js/jquery.appear.js') ?>"></script>
      <script src="<?= assets('js/countdown.min.js') ?>"></script>
      <script src="<?= assets('js/waypoints.min.js') ?>"></script>
      <script src="<?= assets('js/jquery.counterup.min.js') ?>"></script>
      <script src="<?= assets('js/wow.min.js') ?>"></script>
      <script src="<?= assets('js/apexcharts.js') ?>"></script>
      <script src="<?= assets('js/slick.min.js') ?>"></script>
      <script src="<?= assets('js/select2.min.js') ?>"></script>
      <script src="<?= assets('js/owl.carousel.min.js') ?>"></script>
      <script src="<?= assets('js/jquery.magnific-popup.min.js') ?>"></script>
      <script src="<?= assets('js/smooth-scrollbar.js') ?>"></script>
      <script src="<?= assets('js/lottie.js') ?>"></script>
      <script src="<?= assets('js/core.js') ?>"></script>
      <script src="<?= assets('js/charts.js') ?>"></script>
      <script src="<?= assets('js/animated.js') ?>"></script>
      <script src="<?= assets('js/kelly.js') ?>"></script>
      <script src="<?= assets('js/maps.js') ?>"></script>
      <script src="<?= assets('js/worldLow.js') ?>"></script>
      <script src="<?= assets('js/raphael-min.js') ?>"></script>
      <script src="<?= assets('js/morris.js') ?>"></script>
      <script src="<?= assets('js/morris.min.js') ?>"></script>
      <script src="<?= assets('js/flatpickr.js') ?>"></script>
      <script src="<?= assets('js/style-customizer.js') ?>?v=<?= time() ?>"></script>
      <script src="<?= assets('js/chart-custom.js') ?>"></script>
      <script src="<?= assets('js/custom.js') ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      
      <script type="text/javascript">
        function copy(element) {
            var copyText = document.getElementById(element);
            copyText.select();
            document.execCommand("copy");
        }
      </script>
   </body>

</html>