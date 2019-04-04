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

if($params->get('itemTags') && count($item->tags)>0): ?>
<div class="tags clearfix">
	<?php foreach ($item->tags as $tag): ?>
  		<a class="label label-info" href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
 	<?php endforeach; ?>
</div>
<?php endif; ?>