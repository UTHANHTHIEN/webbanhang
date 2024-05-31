<?php
function logoutAction()
{
  setcookie('is_login', true, time() - 3600);
  setcookie('user_login', $_COOKIE['user_login'], time() - 3600);
  unset($_SESSION['is_login']);
  unset($_SESSION['user_login']);
  header("Location: index.php?mod=login&controller=index&action=index");
  exit();
}
