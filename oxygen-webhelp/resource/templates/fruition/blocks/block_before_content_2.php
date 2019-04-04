<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'before-content-2'));
$grid = Mb2TmplFramework::getTemplateParam('before_content_2_grid',$this->params,1);

if ($this->countModules('before-content-2-a') || $this->countModules('before-content-2-b') || $this->countModules('before-content-2-c') || $this->countModules('before-content-2-d')) : ?>
<div id="before-content-2" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'before-content-2')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'before-content-2','mpos'=>'before-content-21-a, before-content-2-b, before-content-2-c, before-content-2-d')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'before-content-2')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>
    </div>  
</div>
<?php endif; ?>