<?php
  session_start();
  session_regenerate_id(true);

  function login($username, $mod) {
    $_SESSION['username'] = $username;
    $_SESSION['mod'] = $mod;
  }

  function isLoggedIn() {
    return isset($_SESSION['username']);
  }

  function isMod() {
    return isset($_SESSION['mod'])&&$_SESSION['mod']?true:false;
  }

  function logOut() {
    session_destroy();
  }
?>