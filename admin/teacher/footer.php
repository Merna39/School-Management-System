<div>
<footer class="main-footer">
    <strong>SMS &copy; 2024 .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <div> Version 1.0</div> 
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!--  -->
<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
   (function(){
    var path = window.location.href;
    // console.log(path);
    $(".nav-link").each(function () {
      var href = $(this).attr('href');
      // console.log(href);
      if (path === decodeURIComponent(href)) 
      {
        $(this).addClass('active');
        var parent = $(this).closest('.has-treeview');
        parent.addClass('menu-open');
        $(parent).find('.nav-link').first().addClass('active');
        // console.log(parent);
      };
    });
  }());
</script>

<!-- Subject -->
<script>
jQuery(document).ready(function(){

  jQuery('#class').change(function(){
    // alert(jQuery(this).val());

    jQuery.ajax({
      url:'ajax.php',
      type : 'POST',
      data  : {'class_id':jQuery(this).val()},
      dataType : 'json',
      success: function(response){
        if(response.count > 0)
        {
          jQuery('#section-container').show();        
        }
        else
        {
          jQuery('#section-container').hide();
        }
        jQuery('#section').html(response.options); 
      }
    });
  });

})
</script>
</body>
</html>
