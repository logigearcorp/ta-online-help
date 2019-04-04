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


// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);


// Define category class
$catCls = 'catItemView group' . ucfirst($this->item->itemGroup);
$catCls .= ($this->item->featured) ? ' catItemIsFeatured' : '';
$catCls .= ($this->item->params->get('pageclass_sfx')) ? ' '.$this->item->params->get('pageclass_sfx') : '';



?>
<article class="<?php echo $catCls; ?>">
<div class="article-inner">
<?php


	// Load before plugins (Joomla and K2) if exists
	echo $this->item->event->BeforeDisplay;
	echo $this->item->event->K2BeforeDisplay;
	
	
	// Load item image 
	echo $this->loadTemplate('item_image');
	
	// Load item header
	echo $this->loadTemplate('item_header');
	
	
	// Load after title plugins (Joomla and K2) if exists
	echo $this->item->event->AfterDisplayTitle;
	echo $this->item->event->K2AfterDisplayTitle;
	
	
	// Load item parts
	echo $this->loadTemplate('item_tinfo');
	echo $this->loadTemplate('item_rating');


	?> 
        <div class="catItemBody">
        <?php
        
        
            // Load before content plugins (Joomla and K2) if exists
            echo $this->item->event->BeforeDisplayContent; 
            echo $this->item->event->K2BeforeDisplayContent;
            
            
            // Load item body parts            
            echo $this->loadTemplate('item_text');
            echo $this->loadTemplate('item_additional');
            
            
            // Load after content plugins (Joomla and K2) if exists
            echo $this->item->event->AfterDisplayContent;
            echo $this->item->event->K2AfterDisplayContent; 
        
        
        ?>
        </div>
	<?php


	// Load other item parts
	echo $this->loadTemplate('item_btinfo');
	echo $this->loadTemplate('item_tags');
	echo $this->loadTemplate('item_video');
	echo $this->loadTemplate('item_gallery');
	echo $this->loadTemplate('item_read_more');
	
	
	// Load after plugins (Joomla and K2) if exists
	echo $this->item->event->AfterDisplay;
	echo $this->item->event->K2AfterDisplay;


?>
</div>
</article>