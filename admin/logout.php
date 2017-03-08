<?php
include_once('/includes/apps_top.php');
unset($_SESSION['LoggedIn']);
session_destroy ();
$url="login.php";
$dobj->redirect_to($url);

?>