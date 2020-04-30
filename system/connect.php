<?php

$serverName = "127.0.0.1:3307";
$userName = "root";
$userPassword = "";
$dbName = "webshop2";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
include_once('massage.php');
include('pay_record.php');
$strSQLweb = "SELECT * FROM web_setting WHERE id =  1 ";
$web_query = mysqli_query($conn,$strSQLweb);
$web_record = mysqli_fetch_array($web_query);
?>