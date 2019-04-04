<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplSiteTools
{
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get custom content
	 *
	 *
	 */
	public static function customHeaderContent(&$params, $attribs)
	{	
			
		return $params->get('mb2_header_content', '') ? 
		'<div class="custom-content">' . $params->get('mb2_header_content', '') . '</div>' : 
		'';		
		
	}
	
	
	
	
	
	
	
	
		
	
	/**
	 *
	 * Method to get site phone
	 *
	 *
	 */
	public static function sitePhone(&$params, $attribs = array())
	{
		
		
		$output = '';
		
		if ($params->get('mb2_site_phone', ''))
		{
			
			//$i=0;
			$phone_arr = explode('|',$params->get('mb2_site_phone', ''));
			
			
			foreach ($phone_arr as $phone)
			{
				
				//$i++;
				
				$output .= '<div class="site-phone">';
						
				// Show icon by default			
				$output .= (isset($attribs['icon']) && !$attribs['icon']) ? '' : '<i class="' . $params->get('icon_phone','fa fa-phone') . '"></i> ';
				$output .= $phone;	
				
				$output .= '</div>';
				
			}
			
						
		}	
		
		return $output;
		
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get site email
	 *
	 *
	 */
	public static function siteEmail(&$params, $attribs)
	{
		
		
		$output = '';
		
		if ($params->get('mb2_site_email', ''))
		{
			
			$output .= '<div class="site-email">';
			
			
			// Show icon by default			
			$output .= (isset($attribs['icon']) && !$attribs['icon']) ? '' : '<i class="' . $params->get('icon_email','fa fa-envelope-o') . '"></i> ';
			
			
			// Get email phrase
			$diff_phrase = $params->get('mb2_site_email_diff_phrase', '') ? 
			$params->get('mb2_site_email_diff_phrase', '') : 
			$params->get('mb2_site_email', '');	
			
			
			// If user set different phrase make sure that email is set as lik
			$email_link = $params->get('mb2_site_email_diff_phrase', '') ? true : $params->get('mb2_site_email_link', 0);	
			
			
			$output .= JHtml::_('email.cloak', $params->get('mb2_site_email', ''), $email_link, $diff_phrase, 0);
			
			$output .= '</div>';			
						
		}	
		
		return $output;
		
		
	}
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get social icons
	 *
	 *
	 */
	public static function siteSocialIcons(&$params, $attribs)
	{
	
		return Mb2TmplFramework::getSocialIcons($params, $attribs);
	
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get language module
	 *
	 *
	 */
	public static function siteLanguage(&$params, $attribs =  array())
	{
		
		$output = '';		
		
		// Get title of language module and add module position 'language'
		if(count(JModuleHelper::getModules('language')))
		{
			
			// Add icon by default
			$icon= (isset($attribs['icon']) && !$attribs['icon']) ? '' : '<i class="' . $params->get('icon_lang','fa fa-globe') . '"></i> '; 
			
			
			//$output .='<div class="site-language">';					
			//$output .='<a class="mod-dd-link" href="#">' . $icon . JModuleHelper::getModule('mod_languages')->title . '</a>';
			//$output .='<div class="mod-dd-container"><div>';		
			$output .= $attribs['mode'] == 2 ? '{loadmodule languages}' : '<jdoc:include type="modules" name="language" style="" />';
			//$output .='</div></div>';				
			//$output .='</div>';	
		}		
		
		return $output;		
		
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get login module
	 *
	 *
	 */
	public static function siteLogin(&$params, $attribs = array())
	{
		
		$output = '';		
		
		// Get title of login module and add module position 'login'
		if(count(JModuleHelper::getModules('login')))
		{
			
			// Add icon by default
			$icon= (isset($attribs['icon']) && !$attribs['icon']) ? '' : '<i class="' . $params->get('icon_login','fa fa-lock') . '"></i> '; 
			
			
			$output .='<div class="site-login">';					
			$output .='<a class="mod-dd-link" href="#">' . $icon . JModuleHelper::getModule('mod_login')->title . '</a>';					
			$output .='<div class="mod-dd-container"><div>';
			$output .= $attribs['mode'] == 2 ? JHtml::_('content.prepare','{loadmodule login}') : '<jdoc:include type="modules" name="login" style="" />';
			$output .='</div></div>';				
			$output .='</div>';
		}		
		
		return $output;		
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get scroll to top link
	 *
	 *
	 */
	public static function scrollToTop(&$params, $attribs = array())
	{	
		
		
		$output = '';
		
		
		if ($params->get('mb2_scroll_top', 1))
		{
			
			$cls = $attribs['tt'] ? ' tmpl-tooltip' : '';
			
			$output .= '<a href="#" class="scroll-to-top' . $cls . '" title="' . JText::_('TMPL_MB2_SCROLL_TOP') . '"><i class="pe-7s-angle-up"></i></a>';	
			$output .= '<script type="text/javascript">';
			$output .= 'jQuery(document).ready(function($){';
			
			$output .= '$(window).scroll(function(){';
			
			$output .= 'if ($(this).scrollTop() > ' . $attribs['top-offset'] . ') {';
			$output .= '$(\'.scroll-to-top\').fadeIn(200);';
			$output .= '} else {';
			$output .= '$(\'.scroll-to-top\').fadeOut(200);';
			$output .= '}';
			$output .= '});';	
			
			$output .= '$(\'.scroll-to-top\').click(function(e){';
			$output .= '$(\'html, body\').stop().animate({scrollTop : 0},' . $attribs['scroll-speed'] . ');';
			$output .= 'e.preventDefault();';
			$output .= '});';
						
			$output .= '});';
			
			$output .= '</script>';
		}
		
		
		
		
		return $output;
			
		
	}
	
	
	
	
	
	
	
	
	
		
	
	
	
}