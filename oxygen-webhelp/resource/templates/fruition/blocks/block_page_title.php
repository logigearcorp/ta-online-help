<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;

// Get params form active menu item
$app = JFactory::getApplication();
$menu = $app->getMenu();
$actmenu = $menu->getActive();
$showtitle = (!isset($actmenu->params['show_page_heading']) || $actmenu->params['show_page_heading']=='') ? 
Mb2TmplFramework::getTemplateParam('mb2_page_title',$this->params,1) : $actmenu->params['show_page_heading'];

if($showtitle==1 || $this->countModules('breadcrumb') || $this->countModules('page-heading'))
{ 


$scls = Mb2TmplFramework::getBlockStyleClass($this->params, array('name'=>'page-title'));

?>
<div id="page-title" class="<?php echo $scls; ?>"<?php echo Mb2TmplFramework::getParallaxData($this->params, array('name'=>'page-title')); ?>>
	<div class="tsection-inner">
		<?php echo Mb2TmplFramework::getBlockInfo($this->params, array('name'=>'page-heading', 'mpos'=>'page-heading')); ?>
        <div class="page-title-items">
        <div class="container<?php echo $this->params->get('grid', '-fluid'); ?>">
            
            <?php 				
            if($this->countModules('page-heading'))
            { 
            ?>
                 <jdoc:include type="modules" name="page-heading" style="" />                
            <?php
            }
            elseif($showtitle=='1')
            {
            ?>             
                <h1><?php echo Mb2TmplFramework::getPageHeading($this->params, array('title'=>$this->getTitle())); ?></h1>              
            <?php		 
            }
            if($this->countModules('breadcrumb'))
            { 
            ?>
                <div class="page-breadcrumb clearfix">
                    <jdoc:include type="modules" name="breadcrumb" style="" />        
                </div>        
            <?php 
            }
            ?>                          
            </div> 
        </div>
    </div>      
</div>
<?php 
}