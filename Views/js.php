
    <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/mdb.min.js"></script>

    <script src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/popper.min.js?v=1.0.0"></script>
    <script src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/main.js?v=1.0.0"></script>

    <script>
      var ruta = window.location.origin + "";
      $(document).ready(function() {
        // $("form").keypress(function(e) { if (e.which == 13) { return false; } });
      });

      $(document).ready(function(){
          $('[data-toggle="popover"]').popover({html:true});
          $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
