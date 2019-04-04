<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplHead
{
	
	
	
	
	/**
	 *
	 * Method to get head section elements 
	 *
	 */
	public static function tmplHead(&$params, $attribs = array())
	{
			
			
		// Load helper class
		if (!class_exists('Mb2TmplInlineStyles'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_inline_style.php');
		}
		
		if (!class_exists('Mb2TmplInlineScripts'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_inline_scripts.php');
		}
		
		if (!class_exists('Mb2TmplFonts'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_fonts.php');
		}
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
			
		// Get Joomla core vairables
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		$user = JFactory::getUser();
		$sections = Mb2TmplHelper::templateSections();
		$custom_sections = Mb2TmplHelper::templateSections(true);
		
		
		// Remove Joomla <generator> tag 
		if($params->get('generator_tag', 1) == 0)
		{
			JFactory::getDocument()->setGenerator(null);
		}		
		
		
		// Load goole fonts
		Mb2TmplFonts::load_gfonts($params);
		
		
		// Load icon fonts
		Mb2TmplFonts::load_iconfonts($params);
		
				
		// Get template style file
		$tmpl_styles = Mb2TmplHelper::tmplStyleId(array('array'=>true));
		
		foreach ($tmpl_styles as $style)
		{			
			$tmpl_style_id = $app->getTemplate(true)->id;
			
			if ($style->id == $tmpl_style_id)
			{				
				$doc->addStyleSheet(JURI::base(true) . '/templates/' . $app->getTemplate() . '/css/template_' . $tmpl_style_id . '.css');	
			}	
		}		
				
		
		// Get javaScript frameworks		
		JHtml::_('jquery.framework', false);	
		JHtml::_('bootstrap.framework');
		
		
		// Check if MooTools is enabled
		Mb2TmplHead::unsetScripts($params);
			
		
		if ($params->get('mb2_loading_screen', 1) > 0 && !$user->get('isRoot'))
		{
			$doc->addStyleSheet(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/fakeLoader/css/fakeLoader.css');
			$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/fakeLoader/js/fakeLoader.min.js');
						
			$prl_js = 'jQuery(document).ready(function($){';
			$prl_js .= '$(\'#fakeloader\').fakeLoader({';
			$prl_js .= 'timeToHide:60000,';
			$prl_js .= 'zIndex:999999,';
			$prl_js .= $params->get('mb2_loading_screen', 1) < 8 ? 'spinner:"spinner' . $params->get('mb2_loading_screen', 1) . '",' : '';
			$prl_js .= 'bgColor:"' . $params->get('mb2_loading_screen_bgcolor', '#ffffff') . '"';
			$prl_js .= ($params->get('mb2_loading_screen', 1) == 8 && $params->get('mb2_loading_screen_img', '') !='') ? 
			',imagePath:"' . JURI::base(true) . '/' . $params->get('mb2_loading_screen_img', '') . '"' : '';
			$prl_js .= '});';
			$prl_js .= '});';
			
			$prl_js .= '(function($){$(window).load(function(){';
			$prl_js .= 'setTimeout(function(){';
			$prl_js .= '$(\'#fakeloader\').fadeOut();';
			$prl_js .= '},' . $params->get('mb2_loading_screen_timehide',600) . ');';
			$prl_js .= '})})(jQuery);';
			
			$doc->addScriptdeclaration($prl_js);
			
		}
		
		
		
		// One page navigation
		if ($params->get('one_page_nav',0))
		{			
			$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/one-page-nv/jquery.scrollTo.min.js');
			$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/one-page-nv/jquery.nav.min.js');			
			
			$opn_js = 'jQuery(document).ready(function($){';
			$opn_js .= '$(\'.mb2ctm-list\').onePageNav({';
			$opn_js .= 'scrollSpeed:' . $params->get('one_page_nav_scroll_speed',750) . ',';
			$opn_js .= 'scrollOffset:' . $params->get('one_page_nav_offset',100) . '';
			$opn_js .= '});';
			$opn_js .= '});';			
			$doc->addScriptdeclaration($opn_js);
			
		}
		
		
		
		// Get smooth scrolling
		//if ($params->get('smooth_scrolling',0) == 1)
//		{
//			$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/jquery.nicescroll.min.js');			
//						
//			$scr_js = 'jQuery(document).ready(function($){';
//			$scr_js .= '$("html").niceScroll({';
//			$scr_js .= 'cursorwidth:\'10px\',';
//			$scr_js .= 'cursorcolor: "#363738",';
//			$scr_js .= 'cursorborder: \'0\',';
//			$scr_js .= 'background: \'#676869\',';
//			$scr_js .= 'autohidemode: false,';
//			$scr_js .= 'zindex:9999999999999';
//			
//			
//			$scr_js .= '});';
//			$scr_js .= '});';			
//			$doc->addScriptdeclaration($scr_js);	
//		}	
						
		
		// Get nivo lightbox script and style
		if ($params->get('mb2_lightbox', 0) == 1)
		{			
			!Mb2TmplHelper::isDeclaration('nivo-lightbox.min.js') ? $doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/nivo-lightbox/js/nivo-lightbox.min.js') : '';
			!Mb2TmplHelper::isDeclaration('nivo-lightbox.css') ? $doc->addStyleSheet(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/nivo-lightbox/css/nivo-lightbox.css') : '';
			
			$lbx_js = 'jQuery(document).ready(function($){';
			$lbx_js .= '$(\'.lightbox-link\').nivoLightbox();';
			$lbx_js .= '});';			
			$doc->addScriptDeclaration($lbx_js);
		}		
		
		
		// Get tooltip script
		if (!Mb2TmplHelper::isDeclaration('tooltipsy.min.js'))
		{
			$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/tooltipsy.min.js');	
		}
		
				
		
		
		// Get navAccordion script
		// Check if in 'off-canvas' module position is published module
		// Check if this module is Joomla menu module
		$offcanvasModules = JModuleHelper::getModules('off-canvas');
		
		if (count($offcanvasModules) && !Mb2TmplHelper::isDeclaration('navAccordion.min.js'))
		{
			foreach ($offcanvasModules as $m)
			{
				
				if ($m->module == 'mod_menu')
				{
					$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/navAccordion/navAccordion.min.js');
					
					$acc_js = 'jQuery(document).ready(function($){';
					$acc_js .= 'var offCanvasMenu = $(\'.off-canvas-panel\').find(\'ul.menu\');';
					$acc_js .= 'offCanvasMenu.each(function(){';
					$acc_js .= '$(this).navAccordion({';
					$acc_js .= 'expandButtonText:\'<i class="fa fa-angle-down"></i>\',';
					$acc_js .= 'collapseButtonText:\'<i class="fa fa-angle-up"></i>\',';
					$acc_js .= 'selectedClass: \'nav-selected\'';
					$acc_js .= '});';
					$acc_js .= '});';
					$acc_js .= '});';
					$doc->addScriptDeclaration($acc_js);
						
				}	
			}
		}
		
		
				
		foreach ($custom_sections as $section)
		{			
			
			// Get animated background carousel script			
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_cerousel_dir',$params) !='' && !Mb2TmplHelper::isDeclaration('jquery.backstretch.min.js'))
			{
				$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/jquery.backstretch.min.js');
			}			
			
			// Get video background scripts and style
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoid', $params) !='')
			{	
				if (!Mb2TmplHelper::isDeclaration('jquery.mb.YTPlayer.css'))
				{
					$doc->addStyleSheet(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/mbYTPlayer/css/jquery.mb.YTPlayer.css');	
				}
				
				if (!Mb2TmplHelper::isDeclaration('jquery.mb.YTPlayer.min.js'))
				{
					$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/mbYTPlayer/js/jquery.mb.YTPlayer.min.js');	
				}
			}			
				
		}
				
		
		// Get template script
		$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/js/template.js');
						
			
		// Add inline style		
		$inl_css = Mb2TmplFonts::load_font_face($params);
		$inl_css .= Mb2TmplInlineStyles::inline_style_fonts($params);
		$inl_css .= Mb2TmplInlineStyles::section_style($params, $sections);
		$inl_css .= Mb2TmplInlineStyles::custom_section_style($params, $custom_sections);
		$inl_css .= Mb2TmplInlineStyles::custom_inl_style($params);
			
		
		// Output style	
		$doc->addStyleDeclaration($inl_css);
				
		
		// Output inline scripts
		$js = Mb2TmplInlineScripts::sectionBgSlider($params,$custom_sections);
		$js .= Mb2TmplInlineScripts::sectionVideoBg($params,$custom_sections);		
		$doc->addScriptDeclaration($js);			
				
		
		// Compile less to css files
		if (!class_exists('Mb2TmplLess'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_less.php');	
		}		
		Mb2TmplLess::lessAutoCompile($params);
		
		

	
	}	
	
	
	
	
	
	/**
	 *
	 * Methot to unset MooTools scrept
	 *
	 *
	 */
	public static function unsetScripts(&$params)
	{		
		
		// Core Joomla variables
		$doc = JFactory::getDocument();
		$userGuest = JFactory::getUser()->guest;
		
		// Unset MooTools scripts
		// Check is user is an guest if not don't unset these scripts
		if ($params->get('mb2_mootools', 1) == 0 && $userGuest == 1)
		{		
			// Unset mooTools scripts		
			unset($doc->_scripts[JURI::root(true) . '/media/system/js/core.js']);
			unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-core.js']);
			unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-more.js']);					
		}	
		
		if ($params->get('mb2_jcaption', 1) == 0 && $userGuest == 1)
		{				
			// Unset caption script
			unset($doc->_scripts[JURI::root(true). '/media/system/js/caption.js']);
			if (isset($doc->_script['text/javascript'])) {
				$doc->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $doc->_script['text/javascript']);
				if (empty($doc->_script['text/javascript']))
					unset($doc->_script['text/javascript']);
			}
		}	
		
	}	
	
	
	
		
}