<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


// Core variables
$app = JFactory::getApplication('site');
$doc = JFactory::getDocument();
$tmpl = $app->getTemplate(true);
$article403 = $tmpl->params->get('error_article_403');
$article404 = $tmpl->params->get('error_article_404'); 


if (!isset($this->error)) {
		
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;	
	
}



// Get custom error article 
if (($this->error->getCode()) == '403' && ($article403 > 0 || $article403 == 'login')){
	
	
	if ($article403 == 'login')
	{
		
			$login_link = JRoute::_('index.php?option=com_users&view=login');
			header('Location: ' . $login_link);	
			exit;
	}
	else
	{
		if (!class_exists(ContentHelperRoute))
		{
			require_once ( JPATH_SITE . '/components/com_content/helpers/route.php');
		}
		
		$catid = get_category($article403);
		$error_link = JRoute::_(ContentHelperRoute::getArticleRoute($article403, $catid));
		
		header('Location: ' . $error_link);	
		exit;
			
	}
	
		
}
elseif (($this->error->getCode()) == '404' && $article404 > 0){
	
	if (!class_exists(ContentHelperRoute))
	{
		require_once ( JPATH_SITE . '/components/com_content/helpers/route.php');
	}
	
	$catid = get_category($article404);
	$error_link = JRoute::_(ContentHelperRoute::getArticleRoute($article404, $catid));
	
	header('Location: ' . $error_link);	
	exit;	
}


?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />	
</head>
<body>
	<div id="error-container">
		<div id="error-content">
			<h1 id="error-type"><?php echo $this->error->getCode(); ?></h1>
			<h2 id="error-message"><?php echo $this->error->getMessage(); ?></h2>          
            <div id="content-left">
				<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
				<ol>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
				</ol>
             </div>
             
             <div id="content-right">
				<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>

				<ul>
					<li><a href="/" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
				</ul>
			</div>
            <div id="error-info">
				<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>.</p>
				<div id="techinfo">
					<p><?php echo $this->error->getMessage(); ?></p>
					<p>
						<?php 
						if ($this->debug) 
						{
							echo $this->renderBacktrace();
						} 
						?>
					</p>
            	</div>
			</div>          
		</div>
	</div> 
</body>
</html>
<?php


// Get category id by article id
function get_category($id)
	{	
	
	if($id>0){
				
		$db = JFactory::getDbo();	
		$db->setQuery(		
		$db->getQuery(true)
			->select('catid')
			->from('#__content')
			->where('id=' . $id . ' AND state=1')
		);					
			
		$catid = $db->loadResult();
		
		return $catid;
	}
			
}