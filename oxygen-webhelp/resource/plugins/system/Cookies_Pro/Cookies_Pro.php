<?php
/*
Plugin Name:    CookiesPro
Edition:        Lite Edition
Plugin URI:     http://www.pixelpro.es
Description:    Para respetar la nueva política de cookies Pixelpro ha creado un plugin que evita la inclusión de cookies en la web sin el consentimiento del usuario 
Version:        1.0.0
Author:         Daniel Ariza
Author URI:     http://www.pixelpro.es.es

Copyright (C) 2011-2012, Pixelpro.es
All rights reserved.

Este plugin utiliza GNU General Public License, para más información visite la página http://es.wikipedia.org/wiki/GNU_General_Public_License .
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * @package        Joomla
 * @subpackage    System
 */
class  plgSystemCookies_Pro extends JPlugin
{
    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @access    protected
     * @param    object $subject The object to observe
     * @param     array  $config  An array that holds the plugin configuration
     * @since    1.0
     */
    function plgSystemCookies_Pro(& $subject, $config)
    {
        parent::__construct($subject, $config);
    
    }

    /**
    * Start the output
    *
    */
    function onAfterRender()
    {
        
        global $mainframe, $database;
        
        //get Params
        $message = $this->params->get('mensaje', '');
        $buttomText = $this->params->get('buttomText', '');
        $URLLegal = $this->params->get('urlLegal', '');
        $urlLegalText = $this->params->get('urlLegalText', '');
        $width = $this->params->get('ancho', '0');
        $background = $this->params->get('background', '');
        $colorText = $this->params->get('color', '');
        $pading_top = $this->params->get('pading_top', '');
        $pading_bottom = $this->params->get('pading_bottom', '');
        $posicion = $this->params->get('posicion', '');
        $button_style = $this->params->get('button_style', '');
	$jquery_charge = $this->params->get('jquery_charge', '');
	$agreeCookies = $this->params->get('agreeCookies', '');
        $agreeAnalitycs = $this->params->get('agreeAnalitycs', '');
        
        if ($width == "0") {
            $width = "100%";
        } else {
            $width = $width . "px";
        }

        $document =JFactory::getDocument();
        $doctype = $document->getType();
        $app = JFactory::getApplication();
		
		$ICON_FOLDER = JURI::root() . 'plugins/system/Cookie/Cookies_Pro/images/';     
        
        if ( $app->getClientId() === 0 ) {			
		
            $SCRIPTS_FOLDER = JURI::root() . 'plugins/system/Cookies_Pro/Cookies_Pro/';
            $CSS_FOLDER = JURI::root() . 'plugins/system/Cookies_Pro/Cookies_Pro/';

            $cookiecss = '<link type="text/css" rel="stylesheet" href="' . $CSS_FOLDER . 'Cookies_Pro.css" />'."\n";

            $cookiescript = '';

            if($jquery_charge == "si") {

                $cookiescript .= '<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>'."\n";
                
            }
            $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'jquery.cookie.js"></script>'."\n";
            $cookiescript .= '<script type="text/javascript" src="' . $SCRIPTS_FOLDER . 'Cookies_Pro.js"></script>'."\n";	
						
            $strOutputHTML = "";
            //Define paths for portability
            $strOutputHTML .= '<div class="coockie_banner" style="left: 0px; text-align: center; position: fixed;' . $posicion . ': 0px; background:' . $background .'; color:' . $colorText . '; width:' . $width.' !important; padding-top:' . $pading_top . 'px; padding-bottom:' . $pading_bottom . 'px;">';
            $strOutputHTML .= '<p style="padding:4px;">'. JText::_($message) .'<button class="' . $button_style . '">' . JText::_($buttomText) . '</button> <a href="' . $URLLegal . '" target="_blank">' . JText::_($urlLegalText) . '</a></p>';
            if($agreeCookies == 'Yes' ) {
                    $strOutputHTML .= '<input type="hidden" class="agreeCookies" value="true" />';
            } else {
                    $strOutputHTML .= '<input type="hidden" class="agreeCookies" value="false" />';
            }
            if($agreeAnalitycs == 'Yes' ) {
                    $strOutputHTML .= '<input type="hidden" class="agreeAnalitycs" value="true" />';
            } else {
                    $strOutputHTML .= '<input type="hidden" class="agreeAnalitycs" value="false" />';
            }
            
            $cookie = isset($_COOKIE['accept_cookie']) ? $_COOKIE['accept_cookie'] : 'No';
            
            if($cookie != 'Si') {
                $strOutputHTML .= '</div>';
                            $body = JResponse::getBody();
                            $body = str_replace('</body>', $cookiecss.$strOutputHTML.$cookiescript.'</body>', $body);
                JResponse::setBody($body);
            }
        }
    }
}