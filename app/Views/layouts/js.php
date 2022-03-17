   <!-- jQuery  -->
   <script src="<?= base_url('themes') ?>/assets/js/jquery.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/popper.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/modernizr.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/detect.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/fastclick.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/jquery.slimscroll.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/jquery.blockUI.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/waves.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/jquery.nicescroll.js"></script>
   <script src="<?= base_url('themes') ?>/assets/js/jquery.scrollTo.min.js"></script>

   <!-- Required datatable js -->
   <script src="<?= base_url('themes') ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

   <script src="<?= base_url('themes') ?>/assets/plugins/skycons/skycons.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/raphael/raphael-min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/morris/morris.min.js"></script>

   <script src="<?= base_url('themes') ?>/assets/pages/dashborad.js"></script>

   <!-- Plugins js -->
   <script src="<?= base_url('themes') ?>/assets/plugins/timepicker/moment.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript">
   </script>
   <script src="<?= base_url('themes') ?>/assets/plugins/colorpicker/jquery-asColorPicker.min.js"
       type="text/javascript"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/select2/select2.min.js" type="text/javascript"></script>

   <script src="<?= base_url('themes') ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
   </script>
   <script src="<?= base_url('themes') ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"
       type="text/javascript"></script>
   <script src="<?= base_url('themes') ?>/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"
       type="text/javascript">
   </script>

   <!-- Plugins Init js -->
   <script src="<?= base_url('themes') ?>/assets/pages/form-advanced.js"></script>

   <!-- App js -->
   <script src="<?= base_url('themes') ?>/assets/js/app.js"></script>
   <!-- Datatable init js -->
   <script src="<?= base_url('themes') ?>/assets/pages/datatables.init.js"></script>
   <script type="text/javascript">
       $(document).ready(function () {
           $('#datatable2').DataTable();
       });
   </script>
   <script>
       /* BEGIN SVG WEATHER ICON */
       if (typeof Skycons !== 'undefined') {
           var icons = new Skycons({
                   "color": "#fff"
               }, {
                   "resizeClear": true
               }),
               list = [
                   "clear-day", "clear-night", "partly-cloudy-day",
                   "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                   "fog"
               ],
               i;

           for (i = list.length; i--;)
               icons.set(list[i], list[i]);
           icons.play();
       };

       // scroll

       $(document).ready(function () {

           $("#boxscroll").niceScroll({
               cursorborder: "",
               cursorcolor: "#cecece",
               boxzoom: true
           });
           $("#boxscroll2").niceScroll({
               cursorborder: "",
               cursorcolor: "#cecece",
               boxzoom: true
           });

       });
   </script>

   <script>
        $(document).ready(function () {
            $("#filter").on('change', function () {
                var value = $(this).val().toLowerCase();
                $("#tahun tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
   </script>