<?php
namespace glosea;
include 'function/common.php';
include 'config/const.php';
GS_DEBUG ? error_reporting(E_ALL) : error_reporting(0);
use glosea\core\Glosea;
Glosea::init();
use glosea\core\Table;
Glosea::route('/test', function($router){
	parse_str(file_get_contents('php://input'), $data);
	print_r(Glosea::request()->data);
});
Glosea::start();
