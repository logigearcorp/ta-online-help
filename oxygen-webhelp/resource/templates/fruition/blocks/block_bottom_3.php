<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'bottom-3'));
$grid = Mb2TmplFramework::getTemplateParam('bottom_3_grid',$this->params,1);

if ($this->countModules('bottom-3-a') || $this->countModules('bottom-3-b') || $this->countModules('bottom-3-c') || $this->countModules('bottom-3-d')) : ?>
<div id="bottom-3" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'bottom-3')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'bottom-3','mpos'=>'bottom-3-a, bottom-3-b, bottom-3-c, bottom-3-d')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'bottom-3')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>
    </div>  
</div>
<?php endif; ?>