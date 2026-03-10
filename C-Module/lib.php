<?php 
function ss() {
  return $_SESSION['ss'] ?? false;
}

function view($page) {
  require_once '../views/template/header.php';
  require_once "../views/$page.php";
  require_once '../views/template/footer.php';
}

function move($uri, $msg = null) {
  return "<script>alert('$msg')</script>";
  return "<script>location.href('$uri')</script>";
}