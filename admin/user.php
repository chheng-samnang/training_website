<?php include_once("templates/header.php");
#query database
$msg = "";
if(isset($_POST["btnDelete"])){
  $id = $_POST["txtID"];
  if($id=="admin"){
    $msg .= '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>';
    $msg .= "<h5><i class='glyphicon glyphicon-warning-sign'></i> Sorry this is the default system user which cannot be deleted.</h5>";
    $msg .= '</div>';
  }else{
    $sql = "DELETE FROM tbluser WHERE user_id='$id'";
    $result = query($sql,$conn);
  }
}
$sql = "SELECT * FROM tbluser";
$query = query($sql,$conn);

#setup header
$header = "User Management";
?>
<style media="screen">
  .margin-top{
    margin-top:18px;
  }
  a:link{
    text-decoration: none;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $header ?></h1>

      <?php echo $msg ?>
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
            <td><?php echo $value["status"]=="1"?"Enable":"Disable" ?></td>
            <td><?php echo $value["user_crea"] ?></td>
            <td><?php echo $value["date_crea"] ?></td>
            <td>
              <a href="http://localhost:8888/training_website/admin/user_edit.php?id=<?php echo $value['user_id']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <button type="button" class="btn btn-danger" id="btnDelete" onclick="deleteUser('<?php echo $value['user_id']?>')" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<form class="" action="user.php" method="post">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-trash"></i> Delete Confirmation</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this user?
          <input type="hidden" name="txtID" id="txtID" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include_once("templates/footer.php"); ?>

<script type="text/javascript">

  function deleteUser(id){
    if(id!="")
    {
      $("#txtID").val(id);
    }
  }
  $("#btnCreate").click(function(){
    window.location.assign("user_add.php");
  });
</script>
