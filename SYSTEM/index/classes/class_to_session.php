<?php
class Sessions{
	public $login;
	public $pass;
	
	function Out(){
		$_SESSION['name'] = 'Гость';
		$_SESSION['group'] = 'guest';
     	echo "Успех! <html><head><meta http-equiv='refresh' content='0; url=../../index.php'></head></html>";
	}
	function Create(){
		$result2 = mysql_query("SELECT * FROM users WHERE user='$this->login'"); 
		$myrow = mysql_fetch_array($result2);
			if ($this->login == $myrow['user'] && $this->pass == $myrow['pass']) {
				echo "Успех!".$_SESSION['name']."  <html><head><meta http-equiv='refresh' content='0; url=../../index.php'></head></html>";
				echo $_SESSION['name'] = $this->login;
				echo $_SESSION['group'] = $myrow['group'];
		} else { exit("Что-то пошло не так, попробуйте снова! :( <html><head><meta http-equiv='refresh' content='3; url=../../index.php'></head></html>"); }
	}
}

?>