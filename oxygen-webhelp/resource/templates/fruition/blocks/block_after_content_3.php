<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'after-content-3'));
$grid = Mb2TmplFramework::getTemplateParam('after_content_3_grid',$this->params,1);

if ($this->countModules('after-content-3-a') || $this->countModules('after-content-3-b') || $this->countModules('after-content-3-c') || $this->countModules('after-content-3-d')) : ?>
<div id="after-content-3" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'after-content-3')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'after-content-3','mpos'=>'after-content-3-a, after-content-3-b, after-content-3-c, after-content-3-d')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'after-content-3')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>  
    </div>
</div>
<?php endif; ?>