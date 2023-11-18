<?php 
session_start();

if (isset($_SESSION['login'])) {
	echo"<script>alert('Sesi anda masih ada');window.location='html/';</script>";
	exit();
} else{
  echo "<script>alert('harap login terlebih dahulu');window.location='../login/';</script>";
}


?>