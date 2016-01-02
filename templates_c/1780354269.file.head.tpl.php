<?php if(!defined('SMARTY_DIR')) exit('no direct access allowed'); ?>
<?php $_smarty_tpl->decodeProperties('a:1:{s:15:"file_dependency";a:1:{s:11:"F1780354269";a:2:{i:0;s:14:"THEME/head.tpl";i:1;i:1451772568;}}}'); ?>
<?php /* Smarty version Smarty3-b5, created on 2016-01-02 23:15:31
         compiled from "THEME/head.tpl" */ ?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="THEME/css/style.css" rel="stylesheet">
<title>k9lis © SkaZochnik - <?php echo $_smarty_tpl->getVariable('title2')->value;?>
</title>




<link rel="stylesheet" href="THEME/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="THEME/css/dark.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>

<!-- Авторизация -->
<link href="/THEME/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
 <script src="/THEME/js/jquery-1.8.3.js" type="text/javascript"></script>
 <script src="/THEME/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 $(function(){
 $("#dialog").dialog({
 autoOpen: false
 });
 $("#openD").click(function(){
 $("#dialog").dialog("open");
 });
 });
 </script>
 <!--/авторизация-->

<script type="text/javascript">
$(document).ready(function(){
    $(".btn-slide").click(function(){
        $("#panel").slideToggle("slow");
        $(this).toggleClass("active");
    });
});
</script>

</head>
<body>

<div id="dialog" title="Авторизация "> 
<div class="page2">
   <form name="fr" method="post" action="SYSTEM/index/session.php"> 
      <span class="style4"> Логин</span>: 
      &nbsp;&nbsp;<input name="login" type="text" size="10"><br> 
      <span class="style4"> Пароль</span>: 
      <input name="pass" type="password" size="10"> <br> 
      <input type="submit" name="session" value="Войти"> 
      <span class="style4"><a href="index.php?s=static&id=6">Регистрация</a></span> <br> 
      <a href="/remmem_pass.php">Напомнить пароль</a> 
   </form>
   </div>
 </div>

<ul id="nav-bar2">

    <li><a id="openD" href="<?php echo $_smarty_tpl->getVariable('out')->value;?>
" class="podval"><?php echo $_smarty_tpl->getVariable('out2')->value;?>
</a></li>


</ul>
<div class='head'></div>


<div class="darkmenu">
  <ul class="darkGreen" id="six">
    <li><a href="index.php">Главная</a></li>
    <li><a href="index.php?s=static&id=5&b=book&book_id=1">Турниры</a></li>
    <li class="current"><a href="index.php?s=static&id=3&pravila=yes">Правила</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">News</a></li>
  </ul>
  <div class="searchbox">
	<form method="get" action="">
		<input type="text" value="" onfocus="doClear(this)" name="s" class="darksearch" />
	</form>
  </div>
</div>
<!-- ---------------------------- -->





<div class="container"><br>
<div class="page2"><p><?php echo $_smarty_tpl->getVariable('user')->value;?>
 Добро пожаловать на турниры со ставками</p></div>
<br>
<div class="hello"></div>
