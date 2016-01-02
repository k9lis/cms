<?php

define('SMARTY_DIR', 'SYSTEM/libs/');

require(SMARTY_DIR . 'Smarty.class.php');

class MySmarty extends Smarty {

   function MySmarty ()
   {
        // ����������� ������ (��� ������������ ��������� � ������ 
        // ������)
        // ����������� ������������� ���������� ��� �������� ������ 
        // ����������

        $this->Smarty();

        $this->template_dir = 'THEME/';
        $this->compile_dir  = 'THEME/templates_c/';
        $this->config_dir   = 'SYSTEM/configs/';
        $this->cache_dir    = 'SYSTEM/cache/';

        $this->caching = true;
   }

}
?>