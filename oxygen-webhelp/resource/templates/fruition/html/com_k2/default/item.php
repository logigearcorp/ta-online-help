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


// Define item class
$itemCls = 'itemView';
$itemCls .= ($this->item->featured) ? ' itemIsFeatured' : '';
$itemCls .= ($this->item->params->get('pageclass_sfx')) ?  ' ' . $this->item->params->get('pageclass_sfx') : '';


if(JRequest::getInt('print')==1): // Print button at the top of the print page only ?>
<p>
<a class="itemPrintThisPage btn btn-primary rounded" rel="nofollow" href="#" onclick="window.print();return false;">
	<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
</p>
<?php endif; ?>

<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="k2Container" class="<?php echo $itemCls; ?>">
<?php 


// Show before plugins (Joomla and K2) i exists
echo $this->item->event->BeforeDisplay; 
echo $this->item->event->K2BeforeDisplay;	


// Load item header
echo $this->loadTemplate('header'); 
echo $this->loadTemplate('tinfo');
echo $this->loadTemplate('image'); 



// Show after title plugins (Joomla and K2) i exists
echo $this->item->event->AfterDisplayTitle; 
echo $this->item->event->K2AfterDisplayTitle;


// Load item info bar and rating

echo $this->loadTemplate('rating');


?>
<div class="itemBody">
<?php


// Show before content plugins (Joomla and K2) i exists
echo $this->item->event->BeforeDisplayContent;
echo $this->item->event->K2BeforeDisplayContent;


// Load item body parts
echo $this->loadTemplate('text'); 
echo $this->loadTemplate('additional'); // Load extra fileds and attachments 
echo $this->loadTemplate('btinfo');
echo $this->loadTemplate('tags');


// Show after content plugins (Joomla and K2) i exists
echo $this->item->event->AfterDisplayContent;
echo $this->item->event->K2AfterDisplayContent;


?>
</div>
<?php

// Load addition item parts
echo $this->loadTemplate('shares');
echo $this->loadTemplate('author');
echo $this->loadTemplate('author_items');
echo $this->loadTemplate('navigation');
echo $this->loadTemplate('video');
echo $this->loadTemplate('gallery');


// Show after content plugins (Joomla and K2) i exists
echo $this->item->event->AfterDisplay;
echo $this->item->event->K2AfterDisplay;


// Load comments part
echo $this->loadTemplate('comment_block');
?>
<?php /*?>if(!JRequest::getCmd('print')): ?>
	<div class="itemBackToTop clearfix">
		<a class="k2Anchor" href="<?php echo $this->item->link; ?>#startOfPageId<?php echo JRequest::getInt('id'); ?>">
			<?php echo JText::_('K2_BACK_TO_TOP'); ?> <i class="fa fa-angle-double-up"></i>
		</a>
	</div>
	<?php endif; ?>
<?php */?>
</div>