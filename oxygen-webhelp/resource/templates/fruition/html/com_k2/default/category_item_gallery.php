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


if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
<div class="catItemImageGallery">
	<h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
	<?php echo $this->item->gallery; ?>
</div>
<?php endif; ?>