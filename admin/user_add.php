<?php
  include_once("templates/header.php");
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="fa fa-user"></i> Add User</h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">User Info</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">User ID</label>
                <input class="form-control" type="text" name="txtuserid" value="" placeholder="enter user id here...">
              </div>

            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">User Name</label>
                <input class="form-control" type="text" name="txtusername" value="" placeholder="enter user id here...">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">User Type</label>
                <select class="form-control" name="">
                    <option value="none">Choose One</option>
                    <option value="admin">Administrator</option>
                    <option value="general">General user</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="password" name="txtpassword" value="" placeholder="enter user id here...">
              </div>

            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">Confirm</label>
                <input class="form-control" type="password" name="txtconfirm" value="" placeholder="enter user id here...">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="">status</label>
                <select class="form-control" name="">
                    <option value="-1">Choose One</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="txtdesc" class="form-control" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="row pull-right">
            <div class="col-lg-12">
              <div class="form-group">
                <input type="button" class="btn btn-default" id="btncancel" name="" value="Cancel">
                <input type="button" class="btn btn-primary" name="" value="Submit">
              </div>
            </div>
          </div>
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
