<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
  echo "<script>window.location.href='/Login.php';</script>";
  
  exit();
} else {
  $navval = true;
}

?>