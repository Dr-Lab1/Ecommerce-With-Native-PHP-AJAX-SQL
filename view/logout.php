<?php
session_start();
include_once "../includes.php";

$main = new MainController();
$products = $main->logout();

?>