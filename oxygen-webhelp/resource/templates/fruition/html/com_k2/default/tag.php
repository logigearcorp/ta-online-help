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



$itemCls = 'tagView';
$itemCls .= ($this->params->get('pageclass_sfx')) ?  ' ' . $this->params->get('pageclass_sfx') : '';




?>
<div id="k2Container" class="<?php echo $itemCls; ?>">
	<?php if($this->params->get('show_page_title')): ?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>
	<?php if($this->params->get('tagFeedIcon',1)): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>	
	<?php if(count($this->items)): ?>
	<div class="tagItemList blog">
	<?php foreach($this->items as $item): ?>
		<article>
        	<div class="article-inner">
			<?php 
            
            // Define item
            $this->item = &$item;
    
    		
			// Load item image
			echo $this->loadTemplate('image');
				
            // Load item header
            echo $this->loadTemplate('header');
            echo $this->loadTemplate('tinfo');
            
            
            ?>
            <div class="tagItemBody">
            <?php
            
            
            // Load item parts            
            echo $this->loadTemplate('text');
            echo $this->loadTemplate('additional');
			// Y.Ta disable readmore button
            //echo $this->loadTemplate('read_more');
            
            ?>            
            </div>
            </div>
        </article>		
		<?php endforeach; ?>
	</div>
	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<!-- <div><?php echo $this->pagination->getPagesCounter(); ?></div> -->
	</div>
	<?php endif; ?>
	<?php endif; ?>	
</div>