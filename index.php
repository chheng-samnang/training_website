<?php
include_once("templates/header.php");
 ?>
    <button type="button" class="btn btn-default" name="button" id="btn">alert</button>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#btn").click(function(){
          alert();
        });
      });
    </script>
<?php
include_once("templates/footer.php");
 ?>
