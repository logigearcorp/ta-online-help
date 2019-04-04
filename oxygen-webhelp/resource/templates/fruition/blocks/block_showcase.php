<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


if ($this->countModules('showcase-a') || $this->countModules('showcase-b') || $this->countModules('showcase-c') || $this->countModules('showcase-d'))
{
	
// Define class for container and row
$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'showcase'));
$ccls = Mb2TmplFramework::getTemplateParam('showcase_grid',$this->params,1) ? 'container' . $this->params->get('grid', '-fluid') : 'container-no-grid';	
$rcls = Mb2TmplFramework::getTemplateParam('showcase_grid',$this->params,1) ? 'row' : 'row-no-grid';
	
?>
<div id="showcase" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'showcase')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'showcase','mpos'=>'showcase-a, showcase-b, showcase-c, showcase-d')); ?>
        <div class="<?php echo $ccls; ?>">
            <div class="<?php echo $rcls; ?>">
                <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'showcase')); ?>
            </div>	        
        </div>	
    </div>  
</div>
<?php
}