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



if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
<div class="itemVideoBlock">
  	<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
	<?php if($this->item->videoType=='embedded'): ?>
	<div class="itemVideoEmbedded">
		<?php echo $this->item->video; ?>
	</div>
	<?php else: ?>
		<span class="itemVideo"><?php echo $this->item->video; ?></span>
	<?php endif; ?>
</div>
<?php endif; ?>