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

<!-- Start K2 Item Layout -->
<article class="latestItemView">
<div class="article-inner">

	<?php 
	
	// Load before plugins (Joomla and K2) if exists
	echo $this->item->event->BeforeDisplay;
	echo $this->item->event->K2BeforeDisplay;
    
	echo $this->loadTemplate('item_image');
	echo $this->loadtemplate('item_header');
	echo $this->loadtemplate('item_ttools');
	
	
	// Load after title plugins (Joomla and K2) if exists
	echo $this->item->event->AfterDisplayTitle; 
	echo $this->item->event->K2AfterDisplayTitle; 
	
	
	
    ?>
    <div class="latestItemBody">
	  	<?php 
	  
	  
	  	// Load before content plugins (Joomla and K2) if exists
	  	echo $this->item->event->BeforeDisplayContent; 
		echo $this->item->event->K2BeforeDisplayContent; 
		
		
		// Load item body parts		
		echo $this->loadTemplate('item_text');
		
		
		// Load after content plugins (Joomla and K2) if exists
	  	echo $this->item->event->AfterDisplayContent; 
		echo $this->item->event->K2AfterDisplayContent;	
		
		
		?>
  	</div>    
    <?php
	
	// Load ather item parts
	echo $this->loadTemplate('item_tags');
	echo $this->loadTemplate('item_video');
	echo $this->loadTemplate('item_read_more');
	
	
	// Load after plugins (Joomla and K2) if exists
	echo $this->item->event->AfterDisplay; 
	echo $this->item->event->K2AfterDisplay;	
	
	?>
</div>
</article>