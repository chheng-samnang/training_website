<?php
  include_once("templates/header.php");
  include_once("upload.php");
  $msg="";
  if(isset($_POST["btnSubmit"]))
  {
    $img = $_FILES["txtUpload"]["name"];
    if($img!="")
    {
        $msg = upload();
        $user_id = validate_input($_POST["txtuserid"]);
        $user_name = validate_input($_POST["txtusername"]);
        $type = validate_input($_POST["ddlType"]);
        $pass = md5(validate_input($_POST["txtpassword"]));
        $status = validate_input($_POST["ddlStatus"]);
        $desc = validate_input($_POST["txtdesc"]);
        $user = "Admin";
        $date = date("Y-m-d");
        $sql = "INSERT INTO tbluser(user_id,user_name,type,user_pass,status,img,`desc`,user_crea,date_crea)
                            values('$user_id','$user_name','$type','$pass','$status','$img','$desc','$user','$date')
        ";
        query($sql,$conn);
    }else {
      $user_id = validate_input($_POST["txtuserid"]);
      $user_name = validate_input($_POST["txtusername"]);
      $type = validate_input($_POST["ddlType"]);
      $pass = validate_input($_POST["txtpassword"]);
      $status = validate_input($_POST["ddlStatus"]);
      $desc = validate_input($_POST["txtdesc"]);
      $user = isset($_SESSION["userLogin"])?$_SESSION["userLogin"]:"N/A";
      $date = date("Y-m-d");
      $sql = "INSERT INTO tbluser(user_id,user_name,type,user_pass,status,`desc`,user_crea,date_crea)
                          values('$user_id','$user_name','$type','$pass','$status','$desc','$user','$date')
      ";
      query($sql,$conn);
    }

  }
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> Add User</h1>
      <?php
        if($msg!="")
        {
       ?>
       <div class="row">
         <div class="col-lg-12">
           <div class="alert alert-warning" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             <?php echo $msg ?>
           </div>
         </div>
       </div>
     <?php } ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">User Info</h3>
        </div>
        <div class="panel-body">
          <form class="" action="user_add.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <input class="form-control" type="text" name="txtuserid" value="" placeholder="User ID">
                      </div>

                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <input class="form-control" type="text" name="txtusername" value="" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <select class="form-control" name="ddlType">
                            <option value="none">Choose User Type</option>
                            <option value="admin">Administrator</option>
                            <option value="general">General user</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <input class="form-control" type="password" name="txtpassword" value="" placeholder="Password">
                      </div>

                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <input class="form-control" type="password" name="txtconfirm" value="" placeholder="Confirm Password">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <select class="form-control" name="ddlStatus">
                            <option value="-1">Choose Status</option>
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Upload Image</label>
                        <input type="file" name="txtUpload" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="txtdesc" placeholder="Description" class="form-control" rows="8" cols="80"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row pull-right">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="button" class="btn btn-default" id="btncancel" name="" value="Cancel">
                        <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">
                      </div>
                    </div>
                  </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#btncancel").click(function(){
    window.location.assign("user.php");
  });
</script>
<?php
  include_once("templates/footer.php");
 ?>
