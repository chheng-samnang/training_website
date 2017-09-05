<?php
include_once("templates/header.php");
include_once("upload.php");

$id = $_GET["id"];
$img = "";
if($id!="")
{
    $sql = "SELECT * FROM tbluser WHERE user_id='$id'";
    $query = query($sql,$conn);
    $row = fetch_assoc($query);
    $img = $row["img"];
}

if(isset($_POST["btnUpdate"])){
  echo "hi";
  $username = validate_input($_POST["txtUsername"]);
  $type = validate_input($_POST["ddlType"]);
  $status = validate_input($_POST["ddlStatus"]);
  $desc = validate_input($_POST["txtDesc"]);
  $username = "admin";
  $date = date("Y-m-d");
  if($img!=""){
    $sql = "UPDATE tbluser SET user_name='$username',type='$type',status='$status',img='$img',desc='$desc',user_updt='$username',date_updt='$date' WHERE user_id='$id'";
  }else{
    $sql = "UPDATE tbluser SET user_name='$username',`type`='$type',`status`='$status',`desc`='$desc',user_updt='$username',date_updt='$date' WHERE user_id='$id'";
  }

  $result = query($sql,$conn);

  if($result){
    header("location:user.php");
  }
}
 ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> Edit User</h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">User Info</h3>
        </div>
        <form class="" action="http://localhost:8888/training_website/admin/user_edit.php?id=<?php echo $row['user_id']?>" method="post" enctype="multipart/form-data">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" name="txtUsername" class="form-control" placeholder="Enter username here..." value="<?php echo $row['user_name']?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Type</label>
                  <select class="form-control" name="ddlType">
                    <option value="none">Choose One</option>
                    <option value="admin" <?php echo $row["type"]=="admin"?"selected":"" ?>>Administrator</option>
                    <option value="general" <?php echo $row["type"]=="general"?"selected":"" ?>>General</option>
                    <option value="super user" <?php echo $row["type"]=="super user"?"selected":""?>>Super User</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="ddlStatus">
                    <option value="-1">Choose One</option>
                    <option value="1" <?php echo $row["status"]=="1"?"selected":"" ?>>Enable</option>
                    <option value="0" <?php echo $row["status"]=="0"?"selected":"" ?>>Disable</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                      <img class="img img-thumbnail" src="http://localhost:8888/training_website/admin/uploads/<?php echo $row['img']?>" alt="">
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Upload Image</label>
                      <input type="file" name="txtUpload" value="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="txtDesc" rows="8" cols="80">
                      <?php echo $row["desc"] ?>
                    </textarea>
                  </div>
              </div>
            </div>
            <hr>
            <div class="row pull-right">
              <div class="col-lg-12">
                <button type="button" name="btnCancel" class="btn btn-default" id="btnCancel">Cancel</button>
                <button type="submit" name="btnUpdate" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#btnCancel").click(function(){
    window.location.assign("http://localhost:8888/training_website/admin/user.php");
  });
</script>
 <?php
include_once("templates/footer.php");
  ?>
