<?php
include 'function/common.php';
include 'config/global.php';
GS_DEBUG ? error_reporting(E_ALL) : error_reporting(0);
include GS_ROOT . 'core/Glosea.php';
Glosea::init();
