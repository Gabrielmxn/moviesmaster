<?php
session_start();
if($_GET["logout"]){
session_destroy();
exit;
header("location:../Paginas/login.php");
}
?>