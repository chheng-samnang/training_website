<?php include_once("templates/header.php");
$j = 0;
#query database
$sql = "SELECT * FROM tbluser";
$query = query($sql,$conn);

$tbl_bd = array();
#setup header
$header = "User Management";
#url ADD
$url_add = "user_add.php";

#setup table header
$tbl_hdr = array(
                  "user_name"=>"Username",
                  "user_id"=>"User ID",
                  "type"=>"Type",
                  "status"=>"Status",
                  "user_crea"=>"User Create",
                  "date_crea"=>"Date Create"

);

#setup table body
  foreach ($query as $key => $value) {
    $tbl_bd[$j] = array(
                        $value["user_name"],
                        $value["user_id"],
                        $value["type"],
                        $value["status"],
                        $value["user_crea"],
                        $value["date_crea"]
    );
    $j++;
  }

?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $header ?></h1>
      <button type="button" name="button" class="btn btn-success" id="btnCreate"><i class="fa fa-plus"></i> Create New</button>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <?php foreach($tbl_hdr as $hdr){ ?>
              <th><?php  echo $hdr?></th>
            <?php } ?>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            foreach($tbl_bd as $value){
           ?>
          <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value[0] ?></td>
            <td><?php echo $value[1] ?></td>
            <td><?php echo $value[2] ?></td>
            <td><?php echo $value[3] ?></td>
            <td><?php echo $value[4] ?></td>
            <td><?php echo $value[5] ?></td>
            <td>
              <a href="user_edit.php?id=<?php echo $value[1]?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php $i++;} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include_once("templates/footer.php"); ?>

<script type="text/javascript">
  $("#btnCreate").click(function(){
    window.location.assign("<?php echo $url_add?>");
  });
</script>
