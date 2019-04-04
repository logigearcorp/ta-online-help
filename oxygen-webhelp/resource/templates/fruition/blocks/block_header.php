<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;

$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'main-header'));
$grid = Mb2TmplFramework::getTemplateParam('main_header_grid',$this->params,1);

if (Mb2TmplFramework::getTemplateParam('main_header',$this->params,1) == 1) : 
if ($this->params->get('mb2_sticky_navigation', 1) == 1 && !$this->countModules('main-nav')) : ?>
	<div class="fixed-nav-element-offset"></div>
<?php endif; ?>
<header id="main-header" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'main-header')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'main-header', 'mpos'=>'header-a, header-b, header-c')); ?>
        <?php if ($grid == 1) : ?>
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
        <div class="row">
        <?php endif; ?> 
        <?php if ($this->countModules('header-nav') || ($this->countModules('off-canvas') && $this->params->get('off_canvas_link_pos','a') == 'header-nav')) : ?>
            <div class="tcol col-<?php echo $this->params->get('cls_prefix', 'md'); ?>-12">
                <?php echo Mb2TmplFramework::getLogo($this->params); ?>            
                <?php if ($this->countModules('off-canvas')) : ?>
                    <?php echo Mb2TmplHelper::offCanvasLink($this->params); ?>
                <?php endif; ?><jdoc:include type="modules" name="header-nav" style="" />
            </div>
        <?php else: ?>    	
            <?php echo Mb2TmplFramework::getBlock($this->params, array('name'=>'main-header')); ?>
        <?php endif; ?>
        <?php if ($grid == 1) : ?>
        </div>	        
        </div>
        <?php endif; ?> 
    </div> 
</header>
<?php endif; ?>