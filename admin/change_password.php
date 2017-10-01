<?php include_once("templates/header.php");
$msg="";
if(isset($_POST["btnSubmit"])){
  $id = $_REQUEST["id"]!=""?$_REQUEST["id"]:"";
  if($id!=""){
    $pass = MD5($_POST["txtPass"]);
    $sql = "UPDATE tbluser SET user_pass='$pass' WHERE user_id='$id'";
    $result = query($sql,$conn);
    if($result){
      $msg .= "<div class='alert alert-success' role='alert'>";
      $msg .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>';
      $msg .="You have change your password successfully!";
      $msg .= "</div>";
    }
  }
}
?>
<style media="screen">
  #txtHint{
    color:red;
    font-weight: bold;
    padding-top:10px;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><i class="glyphicon glyphicon-lock"></i> Change Password</h1>
      <?php if($msg!=""){ echo $msg; }?>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Password Info</h3>
            </div>
            <form class="" action="change_password.php?id=<?php echo $_REQUEST['id']?>" method="post">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">New Password</label>
                      <input type="password" onkeyup="showHint(this.value)" name="txtPass" id="txtPass" placeholder="Enter your new password here..." class="form-control" value="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" onkeyup="showHint(this.value)" name="txtConfirm" id="txtConfirm" placeholder="Confirm your new password here..." class="form-control" value="">
                      <div id="txtHint">

                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="pull-right">
                  <button type="submit" id="btnSubmit" name="btnSubmit" disabled class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                  <button type="button" name="btnCancel" id="btnCancel" class="btn btn-default"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function showHint(str)
{
  var xhttp;
  var pass = $("#txtPass").val();
  var conf = $("#txtConfirm").val();
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  if(conf==pass){
    $("#btnSubmit").removeAttr("disabled");
  }else{
    $("#btnSubmit").attr("disabled","");
  }
  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "validate.php?q="+str+"&p="+pass, true);
  xhttp.send();
}
$("#btnCancel").click(function(){
  window.location.assign("user.php");
});

</script>
<?php include_once("templates/footer.php");?>
