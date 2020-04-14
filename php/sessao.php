<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['id']);
  	unset($_SESSION['login']);
  	unset($_SESSION['senha']);
  	header('location:../Paginas/login.php');
 
  }
 
$logado = $_SESSION['login'];
$id = $_SESSION['id'];



?>