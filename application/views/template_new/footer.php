<footer class="bdT ta-c p-30"><span>Copyright © 2018 Project Management Tracking Tool (MHADA)</span></footer>
</div>
</div>
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> -->
<script src="<?php echo base_url();?>assets/demo/default/custom/components/portlets/tools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>theme/vendor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>theme/bundle.js"></script>
<script src="<?php echo base_url();?>public/js/sliding.js"></script>
<!-- <script type="text/javascript">
   $('.sidebar').hover(
           function () {
              $('.app:not(.is-collapsed) .sidebar-logo a .logo').attr('style','width:185px !important');
           }, 
   
           function () {
              $('.app:not(.is-collapsed) .sidebar-logo a .logo').attr('style','width:70px !important');
           }
        );
   
   $(document).on('click','#sidebar-toggle',function(){
   	$('.logo').css('width','');
   })
</script> -->

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('.only_img').change(function(){
        var ext = $(this).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['jpg','jpeg','png']) == -1) {
            swal("Error", "Invalid Extension! Please note that JPG/JPEG/PNG files are only accepted.Please select any one of the file types and retry.", "error")
            $(this).val('');
        }
    });

    $('.only_img_pdf').change(function(){
        var ext = $(this).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['jpg','jpeg','png','pdf']) == -1) {
            swal("Error", "Invalid Extension! Please note that PDF/JPG/JPEG/PNG files are only accepted.Please select any one of the file types and retry.", "error")
            $(this).val('');
        }
    });
  });
</script> -->
</body>
</html>