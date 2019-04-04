<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/

defined('_JEXEC') or die;


if(!defined('DS')) {define('DS', DIRECTORY_SEPARATOR);}


// Load language files
JFactory::getLanguage()->load('plg_system_mb2shortcodes', JPATH_ADMINISTRATOR);


// Get helper file
require_once (JPATH_ROOT . DS . 'plugins' . DS . 'system' . DS . 'mb2shortcodes' . DS . 'helper.php');


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mb2 Shortcodes</title>
<?php	
	
	$feTmlName = PlgSystemMb2shortcodesHelper::getFeTemplateName();		
		
	$customStylePath = JPATH_SITE . DS . 'templates' . DS . $feTmlName . DS . 'shortcodes' . DS . 'generator' . DS . 'head.php';
		
	if (file_exists($customStylePath))
	{
		require ($customStylePath);
			
		foreach ($styleArr as $style)
		{
			echo '<link rel="stylesheet" href="' . JURI::root(true) . '/templates/' . $feTmlName . $style . '" />';
		}	
	}	
	
?>
<link rel="stylesheet" href="<?php echo JURI::root(true); ?>/media/jui/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo JURI::root(true); ?>/media/mb2shortcodes/css/admin.css" />
<link rel="stylesheet" href="<?php echo JURI::root(true); ?>/media/mb2shortcodes/js/spectrum/spectrum.css" />    
<script src="<?php echo JURI::root(true); ?>/media/jui/js/jquery.min.js"></script>
<script src="<?php echo JURI::root(true); ?>/media/jui/js/bootstrap.min.js"></script>
<script src="<?php echo JURI::root(true); ?>/media/mb2shortcodes/js/spectrum/spectrum.js"></script>
<script src="<?php echo JURI::root(true); ?>/media/mb2shortcodes/js/admin.js"></script>
<?php

// Get editor name
$app = JFactory::getApplication('admin');
$jinput = $app->input;
$editorname = $jinput->get('editorname');


// Get elements xml lis and elements php files
$xmlFile = JPATH_ROOT . DS . 'templates' . DS . $feTmlName . DS . 'shortcodes' . DS . 'generator' . DS . 'elements.xml';
$elFilesPath = JPATH_ROOT . DS . 'templates' . DS . $feTmlName  . DS . 'shortcodes' . DS . 'generator' . DS . 'elements';

?>
<script type="text/javascript">
	
	var br = '<?php echo ($app->getCfg('editor') == 'none' || $app->getCfg('editor') == 'codemirror') ? '\r\n' : '<br>'; ?>';
	
	jQuery(document).ready(function($){			
		
		$('body').on('click','#mb2shortcodes-btn-insert', function(e){
			e.preventDefault();
			var content = $(this).parent().find('#mb2shortcodes-result');	
			window.parent.jInsertEditorText(content.html(), <?php echo json_encode($editorname); ?>);
			window.parent.jModalClose();
			return false;	
		});
	
		$('body').on('click', '#mb2shortcodes-btn-clear', function(e){		
			var content = $(this).parent().find('#mb2shortcodes-result');
			content.empty();
			e.preventDefault();			
		});
				
	});
</script>
</head>
<body>
<?php if ($app->getCfg('editor') != 'none' && $app->getCfg('editor') != 'codemirror') : ?>
    <div class="alert alert-info alert-dismissible" role="alert" style="margin-top:20px;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo JText::_('PLG_MB2SHORTCODESBTN_NO_EDITOR_INFO'); ?>
    </div>
<?php endif; ?>
<div class="mb2shortcodes">
	<div class="mb2shortcodes-items clearfix">
    	<div class="mb2shortcodes-header clearfix">
        	<span class="mb2shortcodes-info">Mb2 Shortcodes</span>
            <a class="mb2shortcodes-list-btn btn btn-success" href="#"><?php echo JText::_('PLG_MB2SHORTCODESBTN_SELECT_SHORCODES'); ?></a>       	
        	<?php echo is_file($xmlFile) ? PlgSystemMb2shortcodesHelper::generatorList($xmlFile) : ''; ?>
        </div>
        <div class="mb2shortcodes-content">
			<?php			
								
				if (is_dir($elFilesPath))
				{
					$elFiles = PlgSystemMb2shortcodesHelper::getFilesArray($elFilesPath, 'php');
			
					foreach ($elFiles as $file)
					{
						require($elFilesPath . DS . $file);
					}
				}				
								
            ?>            
        </div>
        <div class="mb2shortcodes-result">
        	<em><?php echo JText::_('PLG_MB2SHORTCODESBTN_INSERT_INFO'); ?></em>
        	<span id="mb2shortcodes-result"></span>
            <a href="#" id="mb2shortcodes-btn-insert" class="btn btn-primary"><?php echo JText::_('PLG_MB2SHORTCODESBTN_INSERT'); ?></a> 
            <a href="#" id="mb2shortcodes-btn-clear" class="btn btn-danger"><?php echo JText::_('PLG_MB2SHORTCODESBTN_SCLEAR'); ?></a>
        </div>
    </div>   
</div>
</body>
</html>