<?php

include "../config.php";
if(isset($_POST['send'])){
    
include "classes/class_to_reg.php";

	$reg = new Reg;
$reg->user = $_POST['reg_login'];
$reg->name = $_POST['reg_name'];
$reg->s_name = $_POST['reg_s_name'];
$reg->maill = $_POST['reg_mail'];
$reg->pass = $_POST['reg_pass'];
$reg->pass2 = $_POST['reg_pass2'];
$reg->dates = $_POST['date'];
$reg->times = $_POST['time'];
$reg->group = 'user';
$reg->starting();
}
echo "<html><head><meta http-equiv='refresh' content='3; url=../../index.php'></head></html>";
?>