<?php
<<<<<<< HEAD
$path = "http://" . $_SERVER['SERVER_NAME'].":8888".  $_SERVER['REQUEST_URI'];
$path_admin = "http://" . $_SERVER['SERVER_NAME'].":8888"."/training_website/";

=======
$request_URI = $_SERVER['REQUEST_URI']=="/training_website/index.php"?"/training_website/":$_SERVER['REQUEST_URI'];
$path = "http://" . $_SERVER['SERVER_NAME'].":8888".  $request_URI;
$path_admin = "http://" . $_SERVER['SERVER_NAME'].":8888/training_website/";
>>>>>>> e464e5f90e993bdd27e1e10d6e2ee8fe740a2a2f
$include = "include/config/";
?>
