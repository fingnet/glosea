<?php
//应用程序主机路径
define('GS_DOMAIN_PATH', '/');
define('GS_TIME', time());
define('GS_DEBUG', true);
GS_DEBUG && define('GS_START_TIME',microtime());
define('GS_CLIENT_IP', getIp());