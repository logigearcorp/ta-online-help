<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplFramework
{
	
	
	/**
	 *
	 * Method to get head section elements 
	 *
	 */
	public static function getTmplHead(&$params, $attribs = array())
	{
			
			
	
		// Load helper class		
		if (!class_exists('Mb2TmplHead'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_head.php');
		}
		
		
		return Mb2TmplHead::tmplHead($params, $attribs);
		
		
	}
	
	
	
	
	
	/**
	 *
	 * Method to get block style class
	 *
	 */
	public static function getBlockStyleClass(&$params, $attribs = array())
	{
			
			
	
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		return Mb2TmplHelper::blockStyleClass($params,$attribs);
		
		

	
	}
	
	
	
	
	
	/**
	 *
	 * Method to get block info
	 *
	 */
	public static function getBlockInfo(&$params, $attribs = array())
	{
			
			
	
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		return Mb2TmplHelper::blockInfo($params,$attribs);
		
		

	
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get block style class
	 *
	 */
	public static function getTemplateParam($name,&$params,$default='',$attribs = array())
	{
			
			
	
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		return Mb2TmplHelper::getTmplParam($name,$params,$default,$attribs);
		
		

	
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get head section elements 
	 *
	 */
	public static function getBlock(&$params, $attribs)
	{
				
		
		// Load block class
		if (!class_exists('Mb2TmplBlock'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/tmpl_block.php');
		}		
		
		if ($attribs['name'] == 'main-content' || $attribs['name'] == 'main-header' || $attribs['name'] == 'footer')
		{			
			return Mb2TmplBlock::superBlock($params, $attribs);						
		}
		else
		{
			return Mb2TmplBlock::block($params, $attribs);	
		}
				
	}
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get site toolbar
	 *
	 */
	public static function getToolbar(&$params, $attribs)
	{
		
		
		$output = '';
		
		
		if (!class_exists('Mb2TmplSiteTools'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/tmpl_site_tools.php');
		}
		
		$output .= Mb2TmplSiteTools::customHeaderContent($params, $attribs);
		$output .= Mb2TmplSiteTools::sitePhone($params, $attribs);
		$output .= Mb2TmplSiteTools::siteEmail($params, $attribs);
		$output .= $params->get('mb2_icons_in_toolbar', 1) ? Mb2TmplFramework::getSocialIcons($params, $attribs) : '';
		$output .= Mb2TmplSiteTools::siteLanguage($params, $attribs);
		$output .= Mb2TmplSiteTools::siteLogin($params, $attribs);					
		
		return $output;
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get logo
	 *
	 *
	 */
	public static function getLogo(&$params)
	{
		
		
		if (!class_exists('Mb2TmplLogo'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_logo.php');	
		}
		
		return Mb2TmplLogo::renderLogo($params);
		
		
	} 
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get loading screen before page is loaded
	 *
	 *
	 */
	public static function getSocialIcons(&$params, $attribs)
	 {
		 
		 
		 // Load helper class
		if (!class_exists('Mb2TmplSocial'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_social.php');
		}
		
		
		return Mb2TmplSocial::socialIcons($params, $attribs);
		 
		 
	 }
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get body class
	 *
	 */
	public static function getBodyClass(&$params)
	{
		
		
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		return Mb2TmplHelper::bodyClass($params);
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get body class
	 *
	 */
	public static function getLoadingScreen(&$params)
	{
		
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		return Mb2TmplHelper::loadingScreen($params);
		
		
	}
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get page title
	 *
	 */	
	public static function getPageHeading($params, $attribs)
	{		
			
		
		
		if (!class_exists('Mb2TmplPageHeading'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_page_heading.php');	
		}	
		
		
		return Mb2TmplPageHeading::pageHeading($params, $attribs);
					
		
		
	}
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get site footer
	 *
	 */	
	public static function getFooter(&$params, $attribs)
	{
		
			
		if (!class_exists('Mb2TmplFooter'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_footer.php');	
		}
		
		return Mb2TmplFooter::renderFooter($params);
		
		
	}
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get scroll to top link
	 *
	 */	
	public static function getScrollToTop(&$params, $attribs)
	{
		
			
		if (!class_exists('Mb2TmplSiteTools'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/tmpl_site_tools.php');	
		}
		
		return Mb2TmplSiteTools::scrollToTop($params, $attribs);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get scroll to top link
	 *
	 */	
	public static function getParallaxClass(&$params, $attribs)
	{
		
			
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');	
		}
		
		return Mb2TmplHelper::parallaxClass($params, $attribs);
		
		
	}
	
	
	
	
	
	
	/**
	 *
	 * Method to get parallax data
	 *
	 */	
	public static function getParallaxData(&$params, $attribs)
	{
		
			
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');	
		}
		
		return Mb2TmplHelper::parallaxData($params, $attribs);
		
		
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}