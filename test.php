<?php
$suka = 11;

    class reg{
    var $user;
	var $email;
	
	function realist($param){
  if ($param =='') { unset($param); exit('параметр не существует'); }  
}
	
	function clear($param2){
    return stripslashes(strip_tags(trim($this->realist($param2))));
}
	
  function is_email($mail) {
        if (!preg_match( '/^[A-Za-z0-9!#$%&\'*+-\/=?^_`{|}~]+@[A-Za-z0-9-]+(\.[AZa-z0-9-]+)+[A-Za-z]$/', $mail)) {
        return $this->email = 'false';
         } else {
            return $this->email = 'true';
       }
    }
}

$user['name'] = '<br>loh';
$user['suka'] = 'loh2';
$obj = new reg;
echo $obj->realist($user);
echo $obj->clear($user['name']);
echo $obj->is_email($mail);
stripslashes(strip_tags(trim($user['name'])));
echo $user['name'];
?>