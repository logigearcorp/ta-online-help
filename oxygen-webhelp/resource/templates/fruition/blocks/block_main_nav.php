<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


// Define class for container
$ccls = $this->params->get('main_nav_grid', 1) ? 'container' . $this->params->get('grid', '-fluid') : 'container-no-grid';	

if ($this->countModules('main-nav')) : ?>
<?php if ($this->params->get('mb2_sticky_navigation', 1)) : ?>
	<div class="fixed-nav-element-offset"></div>
<?php endif; ?>
<div id="main-navigation" class="dark">
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'main-nav', 'mpos'=>'main-nav')); ?>
        <div class="<?php echo $ccls; ?>">	
            <div class="row">												
                <div class="tcol col-<?php echo $this->params->get('cls_prefix', 'md'); ?>-12">
                    <jdoc:include type="modules" name="main-nav" style="" />
                </div>	
            </div>	        
        </div>
    </div>	  
</div>
<?php endif; ?>