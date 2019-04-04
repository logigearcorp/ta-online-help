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

// Get user stuff (do not change)
$user = JFactory::getUser();

?>


<div id="k2Container" class="userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>
	<!-- Page title -->
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('userFeedIcon',1)): ?>
	<!-- RSS feed icon -->
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('user_block'); ?>
    
	<?php if(count($this->items)): ?>
	<div class="userItemList blog">
		
		<?php foreach ($this->items as $item): ?>
			<article class="userItemView<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)) echo ' userItemViewUnpublished'; ?><?php echo ($item->featured) ? ' userItemIsFeatured' : ''; ?>">
				<div class="article-inner">	          
            	<?php 
								
				$this->item = &$item; 
				
								
				// Load before plugins (Joomla and K2) if exists
				echo $item->event->BeforeDisplay;
				echo $item->event->K2BeforeDisplay;
				
				// Load item image
				echo $this->loadTemplate('image');
				
				// Load item parts
				echo $this->loadTemplate('header');
				echo $this->loadTemplate('ttools');
				
				
				// Load after title plugins (Joomla and K2) if exists
				echo $item->event->AfterDisplayTitle;
		  		echo $item->event->K2AfterDisplayTitle;
				
				
				
				?>
                <div class="userItemBody">
					<?php
                    
                    
                    // Load before content plugins (Joomla and K2) if exists
                    echo $item->event->BeforeDisplayContent;
                    echo $item->event->K2BeforeDisplayContent;
                    
                    
                    
                    // Load item body parts                    
                    echo $this->loadTemplate('text');
                    
                    
                    
                    // Load after content plugins (Joomla and K2) if exists
                    echo $item->event->AfterDisplayContent;
                    echo $item->event->K2AfterDisplayContent; 
                                    
                    
                    ?>
		  		</div>
                <?php
				 
				// Load other parts of item
				echo $this->loadTemplate('tags');
				echo $this->loadTemplate('read_more');
				
				
				// Load after plugins (Joomla and K2) if exists
				echo $item->event->AfterDisplay;
				echo $item->event->K2AfterDisplay; 
				
				
				?>               
                </div>
			</article>		
		<?php endforeach; ?>
	</div>

	<?php if(count($this->pagination->getPagesLinks())): ?>
	<div class="pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>	
	<?php endif; ?>
</div>