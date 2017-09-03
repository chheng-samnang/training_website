<?php
function upload()
{
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["txtUpload"]["name"]);
  $uploadOk = 1;
  $result="";
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["txtUpload"]["tmp_name"]);
  if($check !== false) {
      $result = "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      $result = "File is not an image.";
      $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      $result = "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["txtUpload"]["size"] > 500000) {
      $result = "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $result = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["txtUpload"]["tmp_name"], $target_file)) {
          $result = "The file ". basename( $_FILES["txtUpload"]["name"]). " has been uploaded.";
      } else {
          $result = "Sorry, there was an error uploading your file.";
      }
  }
  return $result;
}

?>
