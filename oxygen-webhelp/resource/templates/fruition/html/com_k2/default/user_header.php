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

<div class="userItemHeader">			
	
				
	<?php if($this->params->get('userItemTitle')): ?>
	<h3 class="itemTitle">
		<?php if(isset($this->item->editLink)): ?>
            <span class="userItemEditLink">
                <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"><i class="fa fa-edit"></i></a>
            </span>
        <?php endif; ?>
    
        <?php if ($this->params->get('userItemTitleLinked') && $this->item->published): ?>
            <a href="<?php echo $this->item->link; ?>">
            <?php echo $this->item->title; ?>
            </a>
        <?php else: ?>
        <?php echo $this->item->title; ?>
        <?php endif; ?>
        
        <?php if(!$this->item->published || ($this->item->publish_up != $this->nullDate && $this->item->publish_up > $this->now) || ($this->item->publish_down != $this->nullDate && $this->item->publish_down < $this->now)): ?>
            <span><sup><?php echo JText::_('K2_UNPUBLISHED'); ?></sup></span>
        <?php endif; ?>
	</h3>
	<?php endif; ?>
</div>