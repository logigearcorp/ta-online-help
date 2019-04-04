<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'top'));
$grid = Mb2TmplFramework::getTemplateParam('top_grid',$this->params,1);

if ($this->countModules('top-a') || $this->countModules('top-b') || $this->countModules('top-c') || $this->countModules('top-d')) : ?>
<div id="top" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'top')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'top','mpos'=>'top-a, top-b, top-c, top-d')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'top')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>
    </div>  
</div>
<?php endif; ?>