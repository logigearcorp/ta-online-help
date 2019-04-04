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

?>
<div class="itemHeader">
	
	<?php if($this->item->params->get('catItemTitle')): ?>
	<h2 class="itemTitle">
		<?php if(isset($this->item->editLink)): ?>
            <span class="itemEditLink">
                <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"><i class="fa fa-edit"></i></a>
            </span>
		<?php endif; ?>

	  	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  		<?php echo $this->item->title; ?>
	  	</a>
	  	<?php else: ?>
	  	<?php echo $this->item->title; ?>
	  	<?php endif; ?>

	  	<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
	  	<span class="featured-flag"><sup><?php echo JText::_('K2_FEATURED'); ?></sup></span>
	  	<?php endif; ?>
	</h2>
	<?php endif; ?> 
</div>