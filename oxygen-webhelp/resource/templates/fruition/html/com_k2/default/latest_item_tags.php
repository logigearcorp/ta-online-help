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

if($this->item->params->get('latestItemTags') && count($this->item->tags)): ?>
<div class="tags">
	<?php foreach ($this->item->tags as $tag): ?>
		<span><a class="label label-info" href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></span>
	<?php endforeach; ?>
</div>
<?php endif; ?>