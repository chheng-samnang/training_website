<?php include_once("templates/header.php");
$j = 0;
#query database
$sql = "SELECT * FROM tbluser";
$query = query($sql,$conn);

#setup header
$header = "User Management";
?>
<style media="screen">
  .margin-top{
    margin-top:18px;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $header ?></h1>
      <button type="button" name="button" class="btn btn-success" id="btnCreate"><i class="fa fa-plus"></i> Create New</button>
    </div>
  </div>
  <div class="row margin-top">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Username</th>
            <th>User ID</th>
            <th>Type</th>
            <th>Status</th>
            <th>User Create</th>
            <th>Date Create</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($query as $key => $value) {?>
          <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value["user_name"] ?></td>
            <td><?php echo $value["user_id"] ?></td>
            <td><?php echo $value["type"] ?></td>
            <td><?php echo $value["status"] ?></td>
            <td><?php echo $value["user_crea"] ?></td>
            <td><?php echo $value["date_crea"] ?></td>
            <td>
              <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include_once("templates/footer.php"); ?>

<script type="text/javascript">
  $("#btnCreate").click(function(){
    window.location.assign("user_add.php");
  });
</script>
