<?php
/**
 * @package Mb2 Page Builder
 * @author Mariusz Boloz http://www.marbol2.com
 * @copyright Copyright (c) 2016 Mariusz Boloz
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

//no direct accees
defined ('_JEXEC') or die ('restricted aceess');


if (!defined('DS')) {define('DS',DIRECTORY_SEPARATOR);}


require (JPATH_COMPONENT . DS . 'builder' . DS . 'parser.php');


echo JHtml::_('content.prepare',Mb2pagebuilderParser::getShortcodeText($this->data->text));

//print_r(Mb2pagebuilderParser::getShortcodeText($this->data->text));