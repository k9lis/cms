<?php
class Reg{
	public $user;
	public $name;
	public $s_name;
	public $maill;
	public $pass;
	public $pass2;
	public $dates;
	public $times;
	public $group;
	
		    function is_email($param) {
				if (!preg_match( '/^[A-Za-z0-9!#$%&\'*+-\/=?^_`{|}~]+@[A-Za-z0-9-]+(\.[AZa-z0-9-]+)+[A-Za-z]$/', $param)) {
				unset($this->maill); exit ("E-mail - некорректен");  
			} else {
				return true;
				}				 
			}	

			function clear($param){
				return stripslashes(strip_tags(trim($this->realist($param))));
			}
			
			function realist($param){
				 if ($param =='') { unset($param); exit('Введены не все данные'); }  
			}
			
			function pass($param, $param2){
				if(md5(md5($param)) !== md5(md5($param2))) {
					exit('Пароли не совпадают');
				} else { $this->pass = md5(md5($param)); }
			}
			function proverka($param)	{
					$result2 = mysql_query("SELECT id FROM users WHERE user='$param'"); 
					$myrow = mysql_fetch_array($result2);
					if (!empty($myrow['id'])) {
						exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
						}
						if (!empty($myrow['mail'])) {
						exit ("Извините, введённый вами E-mail уже зарегистрирован. Введите другой логин.");
						}
				}
				
			function add(){
			$q = " INSERT INTO users (`user`, `name`, `s_name`, `mail`, `Date`, `Time`, `group`, `pass`) VALUES ('$this->user', '$this->name', '$this->s_name', '$this->maill', '$this->dates', '$this->times', '$this->group', '$this->pass') ";
			$r = mysql_query($q);
			if ($r=='TRUE'){
				echo $name.", вы успешно зарегестрировались!";
				} else { echo "Ошибка! Вы не зарегистрированы."; }
			}	
				
			function starting($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9){
				$param1 = $this->user;
				$param2 = $this->name;
				$param3 = $this->s_name;
				$param4 = $this->maill;
				$param5 = $this->dates;
				$param6 = $this->times;
				$param7 = $this->group;
				$param8 = $this->pass;
				$param9 = $this->pass2;
				
				$this->is_email($param4);
				
				for ($x=0; $x++<9;) {
				$this->clear($param.$x);
				}
				
				$this->pass($param8, $param9);
				$this->proverka($param1);
				$this->add();
			}	
				
	}
	?>