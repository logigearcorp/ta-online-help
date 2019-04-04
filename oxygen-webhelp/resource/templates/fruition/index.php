<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


// Define core Joomla variables
$app = JFactory::getApplication();


// Load template defines
!defined('DS') ? define ('DS', DIRECTORY_SEPARATOR) : '';
require(JPATH_THEMES . DS . $app->getTemplate(). DS . 'framework' . DS . 'defines.php');
require(MB2_THEME_BLOCKS . DS . 'block_head.php');


$app->triggerEvent('onAfterRenderModule', array('ssasa', array('position'=>'header-a')));

?>
<body class="<?php echo Mb2TmplFramework::getBodyClass($this->params); ?>">
 	<?php echo Mb2TmplFramework::getLoadingScreen($this->params); ?> 
    <?php require(MB2_THEME_BLOCKS . DS . 'block_off_canvas.php'); ?>  
	<div id="page">         
        <div id="page-a" class="page-a">
        <?php
			require(MB2_THEME_BLOCKS . DS . 'block_top.php');
			require(MB2_THEME_BLOCKS . DS . 'block_header.php');			
			require(MB2_THEME_BLOCKS . DS . 'block_main_nav.php');								
		?>         
        </div>     
        <div id="page-b" class="page-b">     	
        <?php
			require(MB2_THEME_BLOCKS . DS . 'block_showcase.php');
			require(MB2_THEME_BLOCKS . DS . 'block_page_title.php');
			require(MB2_THEME_BLOCKS . DS . 'block_system_message.php');
			
			
			if(Mb2TmplFramework::getTemplateParam('sections_order', $this->params, 0) == 1)
			{
				$sections = Mb2TmplFramework::getTemplateParam('sections', $this->params);
				
				foreach ($sections as $section)
				{
					require(MB2_THEME_BLOCKS . DS . 'block_' . $section . '.php');
				}
			}
			else
			{
				require(MB2_THEME_BLOCKS . DS . 'block_before_content_1.php');
				require(MB2_THEME_BLOCKS . DS . 'block_before_content_2.php');
				require(MB2_THEME_BLOCKS . DS . 'block_before_content_3.php');
				require(MB2_THEME_BLOCKS . DS . 'block_main_content.php');
				require(MB2_THEME_BLOCKS . DS . 'block_after_content_1.php');
				require(MB2_THEME_BLOCKS . DS . 'block_after_content_2.php');
				require(MB2_THEME_BLOCKS . DS . 'block_after_content_3.php');		  
				require(MB2_THEME_BLOCKS . DS . 'block_bottom_1.php');
				require(MB2_THEME_BLOCKS . DS . 'block_bottom_2.php');
				require(MB2_THEME_BLOCKS . DS . 'block_bottom_3.php');
			}
									
			
			require(MB2_THEME_BLOCKS . DS . 'block_footer.php');
		?>
        </div>     
    </div>
    <?php if ($this->params->get('page_videoid','')!='') : ?>
    	<div class="body-video-bg"></div>
    <?php endif; ?>
    <?php echo Mb2TmplFramework::getScrollToTop($this->params, array('top-offset'=>500,'scroll-speed'=>400,'tt'=>false)); ?>   
    <jdoc:include type="modules" name="debug" /> 
</body>
</html>