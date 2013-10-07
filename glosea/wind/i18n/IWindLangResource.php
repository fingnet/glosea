<?php
/**
 * 翻译器接口
 *
 * @author Shi Long <long.shi@alibaba-inc.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id$
 * @package i18n
 */
interface IWindLangResource {

	/**
	 * 翻译接口
	 *
	 * @param string $message
	 * @param array $params
	 */
	public function getMessage($message, $params = array());
}
