<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


if ($this->countModules('sliding-panel-a') || $this->countModules('sliding-panel-b') || $this->countModules('sliding-panel-c') || $this->countModules('sliding-panel-d'))
{
	
// Define class for container and row
$scls = $this->params->get('sliding_panel_cls', '') ? ' ' . $this->params->get('sliding_panel_cls', '') : '';
$ccls = Mb2TmplFramework::getTemplateParam('sliding_panel_grid',$this->params,1) ? 'container' . $this->params->get('grid', '-fluid') : 'container-no-grid';	
$rcls = Mb2TmplFramework::getTemplateParam('sliding_panel_grid',$this->params,1) ? 'row' : 'row-no-grid';
	
?>
<div id="sliding-panel" class="sliding-panel<?php echo $scls; ?>">
	<div class="<?php echo $ccls; ?>">
    	<div class="<?php echo $rcls; ?>">
        	<?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'sliding-panel')); ?>            
        </div>	        
	</div>      
</div>
<?php
}