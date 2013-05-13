<?php
  unset($_SESSION['id']);	
  unset($_SESSION['username']);	
  unset($_SESSION['name']);	
  session_destroy();
  setcookie("remember_me", "", 1, "/", DOMAIN);
  relocate("/");
?>