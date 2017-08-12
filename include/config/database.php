<?php
function connect_db()
{
  include_once("config.php");
  // Create connection
  $conn = new mysqli($servername, $username, $password,$db);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function query($sql="",$conn)
{
  if($conn)
  {
      if($sql!="")
      {
        $query = mysqli_query($conn,$sql);
        return $query;
      }else {
        echo "No SQL Statement Found!";
      }
  }
}

function fetch_assoc($query){
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function num_rows($query)
{
  $result = mysqli_num_rows($query);
  return $result;
}

function close_conn($con)
{
  mysqli_close($con);
}
?>
