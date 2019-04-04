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


if($this->params->get('latestItemVideo') && !empty($this->item->video)): ?>
<div class="itemVideoBlock">
	<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>	
    <div class="itemVideo<?php if($this->item->videoType=='embedded'): ?>Embedded<?php endif; ?>"><?php echo $this->item->video; ?></div>
</div>
<?php endif; ?>