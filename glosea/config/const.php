<?php
//应用程序主机路径
defined('GS_DOMAIN_PATH', '/');
defined('GS_TIME', time());
defined('GS_DEBUG', true);
GS_DEBUG && defined('GS_START_TIME',microtime());
defined('GS_CLIENT_IP', getIp());