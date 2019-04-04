<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'bottom-1'));
$grid = Mb2TmplFramework::getTemplateParam('bottom_1_grid',$this->params,1);

if ($this->countModules('bottom-1-a') || $this->countModules('bottom-1-b') || $this->countModules('bottom-1-c') || $this->countModules('bottom-1-d')) : ?>
<div id="bottom-1" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'bottom-1')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'bottom-1','mpos'=>'bottom-1-a, bottom-1-b, bottom-1-c, bottom-1-d')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'bottom-1')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>
    </div>  
</div>
<?php endif; ?>