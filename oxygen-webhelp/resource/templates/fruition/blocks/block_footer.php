<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'footer'));
$grid = Mb2TmplFramework::getTemplateParam('footer_grid',$this->params,1);

if (Mb2TmplFramework::getTemplateParam('footer',$this->params,1) == 1) : ?>
<footer id="footer" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'footer')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'footer','mpos'=>'footer-a, footer-b, footer-c')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'footer')); ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?>  
    </div>
</footer>
<?php endif; ?>