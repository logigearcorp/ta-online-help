<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;


// define container class
$cCls = $this->params->get('pageclass_sfx') ? ' ' . $this->params->get('pageclass_sfx') : '';
$cCls .= ($this->params->get('latestItemsCols', 1)>1) ? ' multicol-container' : '';


?>
<div id="k2Container" class="latestView clearfix<?php echo $cCls; ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php $x=0; foreach($this->blocks as $key=>$block): $x++; ?>
        <div class="latestItemsContainer<?php echo ($this->params->get('latestItemsCols')>1) ?
         ' multicol-item col-numb' . $this->params->get('latestItemsCols') :
         '';?>">
	
		<?php if($this->source=='categories'): $this->category = &$block; ?>
			
            <div class="cat-blocks clearfix">          
				<?php echo $this->loadtemplate('cat_blocks'); ?>
            </div>
		
		<?php else: $this->user = &$block; ?>
			<div class="user-blocks clearfix">
            	<?php echo $this->loadtemplate('user_blocks'); ?>
            </div>
		<?php endif; ?>


		<div class="latestItemList blog">
		<?php if($this->params->get('latestItemsDisplayEffect') == "first"): ?>
	
			<?php foreach ($block->items as $itemCounter=>$item): K2HelperUtilities::setDefaultImage($item, 'latest', $this->params); ?>
			<?php if($itemCounter == 0): ?>
			<?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
			<?php else: ?>
		  	<h2 class="latestItemTitleList">
				<?php if ($item->params->get('latestItemTitleLinked')): ?>
                    <a href="<?php echo $item->link; ?>">
                        <?php echo $item->title; ?>
                    </a>
                <?php else: ?>
                    <?php echo $item->title; ?>
                <?php endif; ?>
		  	</h2>
			<?php endif; ?>
			<?php endforeach; ?>
	
		<?php else: ?>
	
			<?php foreach ($block->items as $item): K2HelperUtilities::setDefaultImage($item, 'latest', $this->params); ?>
			<?php $this->item = &$item; echo $this->loadTemplate('item'); ?>
			<?php endforeach; ?>
	
		<?php endif; ?>
		</div>
	</div>

	<?php if($this->params->get('latestItemsCols')>1 && $this->params->get('latestItemsCols') == $x): $x=0; ?>
	<div class="clearfix"></div>
	<?php endif; ?>
	<?php endforeach; ?>
</div>