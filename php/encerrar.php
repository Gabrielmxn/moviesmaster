<?php
session_start();
if($_GET["logout"]){
session_destroy();
header("location:../Paginas/login.php");
exit;
}
?>