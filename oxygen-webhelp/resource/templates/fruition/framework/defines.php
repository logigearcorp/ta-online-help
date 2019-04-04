<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


// Define core paths
//!defined('DS') ? define ('DS', DIRECTORY_SEPARATOR);
define ('MB2_THEME', JPATH_THEMES . DS . JFactory::getApplication()->getTemplate());
define ('MB2_THEME_FRAMEWORK', MB2_THEME . DS . 'framework');
define ('MB2_THEME_FRAMEWORK_LIBS', MB2_THEME_FRAMEWORK . DS . 'libs');
define ('MB2_THEME_BLOCKS', MB2_THEME . DS . 'blocks');
define ('MB2_THEME_CACHE', JPATH_SITE . DS . 'cache' . DS . JFactory::getApplication()->getTemplate());
define ('MB2_THEME_LESS', MB2_THEME . DS . 'less');
define ('MB2_THEME_CSS', MB2_THEME . DS . 'css');
define ('MB2_THEME_FEATURES', MB2_THEME . DS . 'features');
define ('MB2_THEME_FONTS', MB2_THEME . DS . 'fonts');

