<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 



defined('_JEXEC') or die;

$app = JFactory::getApplication();
	
// Define class for container and row
$ccls = $this->params->get('system_message_grid', 1) ? 'container' . $this->params->get('grid', '-fluid') : 'container-no-grid';	
$rcls = $this->params->get('system_message_grid', 1) ? 'row' : 'row-no-grid';

//if (count($app->getMessageQueue()))
//{	
?>
<div id="system-message">
	<div class="<?php echo $ccls; ?>">
    	<div class="<?php echo $rcls; ?>">
        	<div class="tcol col-<?php echo $this->params->get('cls_prefix', 'md'); ?>-12">
            	<jdoc:include type="message" />
            </div>        	
        </div>	        
	</div>	  
</div>
<?php 
//} 