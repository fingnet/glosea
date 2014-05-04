<?php
namespace glosea;
include 'function/common.php';
include 'config/const.php';
GS_DEBUG ? error_reporting(E_ALL) : error_reporting(0);
use glosea\core\Glosea;
Glosea::init();
use glosea\core\Table;
Glosea::route('/test', function(){
    $t = Table::table('gs_user')->getJson('user_name','email');
	echo $t;
});
Glosea::start();
