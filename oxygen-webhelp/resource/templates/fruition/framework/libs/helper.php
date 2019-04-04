<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplHelper
{
	
	
	
		
	
	
	
	/**
	 *
	 * Methot to get block style class
	 *
	 *
	 */
	public static function blockStyleClass(&$params, $attribs)
	{
		
		$output = '';
		
		// Basic variables
		$section = str_replace('-','_',$attribs['name']);
		$color_sheme = Mb2TmplHelper::getTmplParam($section . '_color_sheme',$params,0) === 'dark' ? ' dark-gray ' . Mb2TmplHelper::getTmplParam($section . '_color_sheme',$params,0) : '';
		$section_cls = Mb2TmplHelper::getTmplParam($section . '_cls',$params,0) ? ' ' . Mb2TmplHelper::getTmplParam($section . '_cls',$params,0) : '';
		
		
		// Section class
		$output .= 'tsection';
		
				
		// Set block class for predefined styles
		if (Mb2TmplHelper::getTmplParam($section . '_cls',$params,0) === 'dark-section')
		{
			$output .= ' dark-gray';
		}
		else {
			$output .= $color_sheme . $section_cls;
		}
		
		
		// Dark greay class fro header and top bar
		$headerStyle = Mb2TmplHelper::getTmplParam('main_header_style',$params,1);
		
		if ($headerStyle == 7){			
			if ($section === 'top' || $section === 'main_header')
			{
				$output .= ' dark-gray';
			}			
		}
		
		if ($headerStyle == 2 && $section === 'top')
		{			
			$output .= ' dark-gray';				
		}
		
		if ($headerStyle == 3 || $headerStyle == 9)
		{					
			
			if ($section === 'top' || $section === 'main_header')
			{
				$output .= ' dark';
			}			
		}	
				
		
		// Get paralax class
		$output .= Mb2TmplHelper::parallaxClass($params,$attribs);			
									
		
		return $output; 
	
	
	}
	
	
	
	
	
	
	
	/**
	 *
	 * Methot to get block style class
	 *
	 *
	 */
	public static function blockInfo(&$params, $attribs)
	{
		
		$app = JFactory::getApplication();
		$input = $app->input;
		$output = '';
	
		
		if ($params->get('sectioninfo',0) == 1 && $input->get('sections') == 1)
		{ 		
			$style = ' style="position:absolute;top:5px;left:5px;right:5px;bottom:5px;display:block;border:dashed 2px #cc0000;z-index:9999999999;"';
			$style2 = ' style="display:inline-block;background-color:rgba(204, 0, 0, .6);color:#fff;padding: 3px 10px;"';	
			$output .= '<span' . $style . '><span' . $style2 . '><strong>' . $attribs['name'] . '</strong></span></span>';
			$output .= '<span' . $style . '><span' . $style2 . '><strong>' . $attribs['name'] . '</strong></span></span>';
		}
		
		
		
		return $output; 
	
	
	}
	
	
	
	
	
	
	/**
	 *
	 * Methot to get list of module id published in section
	 *
	 *
	 */
	public static function blockModules($blockname)
	{
		
		
		$app = JFactory::getApplication();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		
		$query .= 'SELECT `id`, `title` FROM #__modules WHERE ';
		
		
		if ($blockname === 'main-content')
		{
			$query .= '(position=' . $db->quote('sidebar-a') . ' OR position=' . $db->quote('sidebar-b') . ' OR position=' . $db->quote('sidebar-c') . ')';
		}
		elseif ($blockname === 'main-header')
		{
			$query .= '(position=' . $db->quote('header-a') . ' OR position=' . $db->quote('header-b') . ' OR position=' . $db->quote('header-c') . ' OR position=' . $db->quote('header-nav') . ')';
		}
		else
		{
			$query .= '(position=' . $db->quote($blockname . '-a') . ' OR position=' . $db->quote($blockname . '-b') . ' OR position=' . $db->quote($blockname . '-c') . ' OR position=' . $db->quote($blockname . '-d')  . ')';
		}
			
		
		$db->setQuery($query);
		
		
		$row = $db->loadObjectList();
		
		
		return $row;	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Methot to get body class
	 *
	 *
	 */
	public static function bodyClass(&$params)
	{
		
		
		// Basic variables
		$output = '';
		$gmenupos = '';		
		$app = JFactory::getApplication('site');
		$activemenu = $app->getMenu()->getActive();
		$mparams = $activemenu ? $activemenu->params : '';
		$tmpl = $app->getTemplate(true);		
				
		
		// Detecting active variables
		// Remove 'com_' prefix for safety
		$option   = str_replace('com_','',$app->input->getCmd('option'));
		$view     = $app->input->getCmd('view', '');
		$itemid   = $app->input->getCmd('Itemid', '');
		$tmpl_layout = $tmpl->params->get('layout', 'full');
				
		
		// Check what is the fixed element
		// If in 'main-nav' is some module fixed element is 'main-navigation' container
		// In other way fixed element is header		
		$navpos = count(JModuleHelper::getModules('main-nav')) ? ' mpos_main-nav' : ' mpos_header';
		
		
		// Check if header use bootstrap grid
		// If in module position 'header-nav' is some module header not use bootstrap grid
		$header_grid = (count(JModuleHelper::getModules('header-nav')) || (count(JModuleHelper::getModules('off-canvas')) && $params->get('off_canvas_link_pos','a') == 'header-nav')) ? 
		' header-no-grid' : ' header-is-grid';
		
		
		// Get header style param
		$header_style = Mb2TmplHelper::getTmplParam('main_header_style',$params,1);
		
		
		$output .= 'page';		
		$output .= ' ctype_' . $option;		
		$output .= ' vtype_' . $view;		
		$output .= $itemid ? ' item_' . $itemid : '';
		$output .= $tmpl_layout ? ' ltype_' . $tmpl_layout : '';
		$output .= $params->get('mb2_sticky_navigation', 1) ? ' fixed-nav' : '';
		$output .= $params->get('mb2_sticky_navigation_close',1) ? ' fixed-nav-hide' : '';
		$output .= $navpos;
		
		
		// Define header class
		if ($header_style == 5)
		{
			$output .= ' header-dark';	
		}
		elseif ($header_style == 3 || $header_style == 4 || $header_style == 6 || $header_style == 7 || $header_style == 8 || $header_style == 9)
		{
			$output .= ' header-transparent';	
		}
		else
		{
			$output .= ' header-white';	
		}
		
		$output .= ' header-style' . $header_style;
		
		 
		$output .= Mb2TmplHelper::getTmplParam('main_header_fixw',$params,0) == 1 ? ' header-fixw' : '';
		$output .= ' width-desktop';
		$output .= !$params->get('mb2_logo_on_mobile', 1) ? ' hide-logo' : '';
		$output .= $header_grid;
		$output .= ' logo-' . $params->get('logo_align','left');
		$output .= $params->get('off_canvas_norma_menu',1) == 0 ? ' hide-menu' : '';		
		$output .= ($mparams && $mparams->get('pageclass_sfx')) ? ' ' . htmlspecialchars($mparams->get('pageclass_sfx')) : '';
						
		
		return $output; 
	
	
	}
	
	
	
	
	
	
	/**
	 *
	 * Methot to set slider background for section
	 *
	 *
	 */
	public static function getFilesArray($folder, $filter = 'jpg|jpeg|bmp|png|gif', $full = false, $attribs = array())
	{
		
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		
		
		// Define folder path and filter
		$basepath = JPATH_SITE . DS . 'images';
		$folderparam = str_replace('/', DS, $folder);
		$path = $full ? $folder : $basepath . DS . $folderparam;
		
		
		// Get images array
		$files = JFolder::files($path,$filter);
		
		
		if ($folder!='' && is_dir($path))
		{
			if (is_array($files))
			{
				
				if (count($files)>1)
				{					
					return $files;					
				}
				else
				{
					return false;	
				}				
			}
			else
			{
				return false;	
			}			
		}
		else
		{			
			return false;		
		}	
				
		
	}
	
	
	
	
	
	
	
	/**
	 *
	 * Method to check loading script and styles
	 *
	 */	
	public static function isDeclaration($name)
	{
				
		
		$doc = JFactory::getDocument();				
		$declarationarr = preg_match('@.css@',$name) ? $doc->_styleSheets : $doc->_scripts;
			
		foreach ($declarationarr as $k=>$v)
		{					
			if (preg_match('@' . $name . '@', $k))
			{				
				return true;		
			}			
		}
		
		return false;				
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to check if is mobile device
	 *
	 */	
	public static function isMobile()
	{
				
		
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			return true;
		}
		else
		{
			return false;	
		}
						
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Methot to get parallax class for custom sections
	 *
	 *
	 */
	public static function parallaxClass(&$params, $attribs = array())
	{
		
		$output = '';
		
		// Define custom sections style array
		$sstyles = Mb2TmplHelper::templateSections(true);
		
		
		foreach ($sstyles as $key=>$sstyle)
		{
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $attribs['name']) . '_cls', $params,0) == $sstyle && Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_parallax', $params,0) && Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_image', $params))	
			{				
				$output = ' section-parallax';					
			}			
		}		
		
		return $output;	
		
		
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Methot to get parallax class for custom sections
	 *
	 *
	 */
	public static function parallaxData(&$params, $attribs = array())
	{
		
		
		// Define custom sections style array
		$sstyles = Mb2TmplHelper::templateSections(true);
						
		
		foreach ($sstyles as $key=>$sstyle)
		{
			
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $attribs['name']) . '_cls', $params,0) == $sstyle && Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_parallax', $params,0) && Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_image', $params))	
			{	
			
				// Get left background position
				$bgpos = explode(' ', Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_position', $params,'left top'));
							
				return ' data-aspeed="' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_parallax_speed', $params,'0.25') . '" data-lpos="' . $bgpos[0] . '"';					
			}			
		}		
		
		return '';	
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get loading screen before page is loaded
	 *
	 *
	 */
	 public static function loadingScreen(&$params)
	 {
	
	
		$output = '';
		$user = JFactory::getUser();
		$loading_screen = ($params->get('mb2_loading_screen', 1)>0 && !$user->get('isRoot'));		
		
		if($loading_screen){			
		
			$output .= '<div id="fakeloader"></div>';	
		
		}
		
		
		return $output;
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get default template style id
	 *
	 */	
	public static function tmplStyleId($attribs = array())
	{
		
		
		// Core Joomla variables
		$app = JFactory::getApplication();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$array = isset($attribs['array']) && $attribs['array'];
		
		$query .= 'SELECT id, params FROM #__template_styles WHERE template=' . $db->quote($app->getTemplate());
		$query .= !$array ? ' AND home=1' : '';
		
		$db->setQuery($query);
		
		$row = $array ? $db->loadObjectList() : $db->loadObject();
		
		return $row;		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get params value only from default template style
	 *
	 */	
	public static function defaultTmplStyleParam($pname = null, $default)
	{		
		
		// Joomla variables
		$app = JFactory::getApplication();
		
		// Get default template style object
		$tmplstyle = Mb2TmplHelper::tmplStyleId();
		
		if ($tmplstyle)
		{
		
		// Decode params
		$tparams = json_decode($tmplstyle->params);	
		
		
		// Check if param is set
		if (isset($tparams->$pname))
		{				
			// Return params from default template style
			return $tparams->$pname;
		}
		else
		{
			return $default;	
		}
		}
				
		
	}
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	/**
	 * 
	 *
	 * Method to crop image
	 *
	 *
	 */
	public static function cropImage($url, $crop = 0, $attribs = array('w'=>100, 'h'=>100)){	
		
		
		$output = '';
		
		if (!defined('DS'))
		{
			define('DS', DIRECTORY_SEPARATOR);	
		}
				
		
		// Check crop mode
		// Chec if user constrain proporions
		if ($crop == 2 || $crop == 3)
		{
						
			list($proportion_w, $proportion_h) = getimagesize($url);
			
			
			if ($crop == 3)
			{
				// Calculate % of crop image
				// based on height
				$crop_percentage = round($attribs['w']/$proportion_h, 10);
				$is_proportion_w = round($crop_percentage*$proportion_w, 0);						
				
				$attribs['w'] = $is_proportion_w;
			}
			else
			{
				// Calculate % of crop image
				// based on width
				$crop_percentage = round($attribs['w']/$proportion_w, 10);
				$is_proportion_h = round($crop_percentage*$proportion_h, 0);						
				
				$attribs['h'] = $is_proportion_h;	
			}
						
		}	
		
		
		
		if($url !='' && $crop !=0){			
		
						
			//check uploaded image format		
			$format_checker = substr($url,-4); 
						
			if ($format_checker == '.jpg'){
				$format = '.jpg';	
			}
			elseif ($format_checker == '.gif'){
				$format = '.gif';	
			}
			elseif ($format_checker == '.png'){
				$format = '.png';	
			}					
									
			// *** 1) Initialise / load image
			
			// Get class to resize image
			$tmpl_name = JFactory::getApplication()->getTemplate();
			
			if(!class_exists('mb2tmplresize'))
			{
				require_once JPATH_THEMES . DS . $tmpl_name . DS . 'framework' . DS . 'resize' . DS . 'resize.php';
			} 			
			
			$resizeObj = new mb2tmplresize($url);
				
			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage($attribs['w'], $attribs['h'], 'crop'); 
			
			
			//check if thumbnail folder exist. If not creat it			
			if(!is_dir(JPATH_CACHE . DS . $tmpl_name)){
				jimport('joomla.filesystem.folder');
				JFolder::create( JPATH_CACHE . DS . $tmpl_name);
			}	
			
			
			// Get image name
			$thumbname = Mb2TmplHelper::imgName($url);	
				
			
				
			// *** 3) Save image
			$resizeObj -> saveImage(JPATH_CACHE . DS . $tmpl_name . DS . $thumbname . '_' . $attribs['w'] . 'x' . $attribs['h'] . $format, 100);							
			
			
			//define thumbnail url
			$output .= JURI::root(true) . '/cache/' . $tmpl_name . '/' . $thumbname . '_' . $attribs['w'] .'x' . $attribs['h'] . $format;	
		
		
		}
		else{
			
			$output .= JURI::root(true) . '/' . $url;		
			
		}
	
	
		return $output;	
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * 
	 *
	 * Method to get name from image
	 *
	 *
	 */	
	public static function imgName($url, $format = 0){	
	
		
		
		// Get file name
		$img_parts = pathinfo($url);
						
		if(!isset($img_parts['filename']))
		{
			$img_parts['filename'] = substr($img_parts['basename'], 0, strrpos($img_parts['basename'], '.'));
		} 		
		
		
		// Check uploaded image format		
		$format_checker = substr($url,-4); 
		
					
		if ($format_checker == '.jpg')
		{
			$imgformat = '.jpg';	
		}
		elseif ($format_checker == '.gif')
		{
			$imgformat = '.gif';	
		}
		elseif ($format_checker == '.png')
		{
			$imgformat = '.png';	
		}					
		
		
		if($format == 1)
		{
			return $img_parts['filename'] . $imgformat;
		}
		else
		{
			return $img_parts['filename'];
		}					
		
			
		
	}
	
	
	
	
	/**
	 * 
	 *
	 * Method to get array from font icon css file
	 *
	 *
	 */	
	public static function getIconFontArray($path, $class_prefix = 'fa-',$output_pref = ''){

		if( ! file_exists($path) )
			return false;//if path is incorect or file does not exist, stop.

		$css = file_get_contents($path);
		$pattern = '/\.('. $class_prefix .'(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

		preg_match_all($pattern, $css, $matches, PREG_SET_ORDER);
			
		$icons = array();
		foreach ($matches as $match) {
			
			if ($output_pref!='')
			{				
				$match1 = str_replace($class_prefix, $output_pref, $match[1]);				
				$icons[$match1] = $match[2];
			}
			else
			{
				$icons[$match[1]] = $match[2];
			}
			
			
		}
		return $icons;

	}
	
	
	
	
	
	
	/**
	 * 
	 *
	 * Method to get prams from active menu item
	 *
	 *
	 */	
	public static function getTmplParam($name, &$params, $default = '', $attribs = array()){
	
	
		$app = JFactory::getApplication();
		
		
		// Get view option
		$option = $app->input->getCmd('option');
		$view = $app->input->getCmd('view', '');		
		
		
		// Get menu params
		$menu = $app->getMenu();
		$actmenu = $menu->getActive();
		
					
		// Get article attribs
		//$articleId = $app->input->getCmd('id');
		//$article = JTable::getInstance('content');
		//$article->load($articleId);			
		//$articleAttr = json_decode($article->get('attribs'));
		
		
		// Check single article attribs
		//if ($option == 'com_content' && $view == 'article' && isset($articleAttr->$name) && $articleAttr->$name != '')
		//{
		//	$output = $articleAttr->$name;	
		//}
		// Check menu item params
		if (isset($actmenu->params[$name]) && $actmenu->params[$name] != '')
		{			
			$output = $actmenu->params[$name];				
		}
		// Get patams from template style
		else
		{
			$output = $params->get($name,$default);	
		}
		
		return $output;
	
	}



		
	
	
	
	
	/**
	 *
	 * Methot to get block style class
	 *
	 *
	 */
	public static function templateSections($custom = false)
	{
		
		
		if ($custom)
		{
			$output = array(
				'page',
				'custom-section1', 
				'custom-section2', 
				'custom-section3',
				'custom-section4',
				'custom-section5',
				'custom-section6',
				'custom-section7'
			);
		}
		else
		{
			$output = array(
				'top', 
				'page-title', 
				'main-header', 
				'showcase', 
				'before-content-1', 
				'before-content-2', 
				'before-content-3',
				'main-content', 
				'after-content-1', 
				'after-content-2', 
				'after-content-3', 
				'bottom-1', 
				'bottom-2', 
				'bottom-3', 
				'footer'
			);	
		}
		
		
		return $output;
		
		
	}
	
	
	
	
	/**
	 *
	 * Methot to get frontEnd template name
	 *
	 *
	 */
	public static function feTemplateName ()
	{
		$db = JFactory::getDBO();
		$query = "SELECT template FROM #__template_styles WHERE client_id=0 AND home=1";
		$db->setQuery($query);
		return $db->loadResult();
	}
	
	
	
	
	
	/**
	 *
	 * Methot to get off-canvas panel link
	 *
	 *
	 */
	public static function offCanvasLink(&$params, $attribs = array())
	{
		
		$output = '';
		
		$output .= '<div class="off-canvas-link-wrap">';
		//$output .= '<div class="off-canvas-link-wrap2">';
		$output .= '<a href="#" class="off-canvas-open" style="height:' . $params->get('off_canvas_link_height',72) . 'px;line-height:' . $params->get('off_canvas_link_height',72) . 'px;font-size:' . $params->get('off_canvas_link_icon_size',22) . 'px;">';
		$output .= $params->get('off_canvas_link_showicon',1) ? '<i class="' . $params->get('off_canvas_link_icon','glyphicon glyphicon-menu-hamburager') . '"></i>' : '';
		$output .= $params->get('off_canvas_link_text', '') ? '<span>' . $params->get('off_canvas_link_text', '') . '</span>' : '';
		$output .= '</a>';
		//$output .= '</div>';
		$output .= '</div>';	
		
		return $output; 
	
	
	}
	
	
	
	
	
	
	/**
	 *
	 * Methot to convert hex color to rgba
	 *
	 *
	 */
	public static function hex2rgba($color, $opacity = false) {
 
		$default = 'rgb(0,0,0)';
	 
		//Return default if no color provided
		if(empty($color))
			  return $default; 
	 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
	 
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
	 
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			//if($opacity){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			//} else {
			//	$output = 'rgb('.implode(",",$rgb).')';
			//}
	 
			//Return rgb(a) color string
			return $output;
	}
	
	
	/**
	 *
	 * Methot to convert hex color to rgba
	 *
	 *
	 */
	public static function rgba2rgb($inColor, $attribs = array()){ 
	
		
		$output = '';
	 	
		
		if (preg_match('@rgb@',$inColor) || preg_match('@rgba@', $inColor))
	   	{
			if( preg_match( '!\(([^\)]+)\)!', $inColor, $match ) )
			{
				
				$colorArr = explode(',',$match[1]);
				$color = $colorArr[0] . ',' . $colorArr[1] . ',' . $colorArr[2];
				
			}
			
			if (isset($attribs['rgb']) && $attribs['rgb'] == 1)
			{
				
				if (isset($attribs['opacity']))
				{
					$output = 'rgba(' . $color . ',' . $attribs['opacity'] . ')';
				}
				else
				{
					$output = 'rgb(' . $color . ')';	
				}
					
			}
			else
			{
				$output = $color;	
			}
						
		}
		else
		{			
			$output = $inColor;	
		}	
		
		
		
		return $output;
	
	}
	
	
	
	
	
	
	
}