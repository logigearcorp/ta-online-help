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


if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
<a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
<div class="itemImageGallery">
	<h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
	  	<?php echo $this->item->gallery; ?>
</div>
<?php endif; ?>