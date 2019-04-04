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

if($params->get('itemVideo') && $item->video): ?>
<div class="itemVideoBlock">
<div class="moduleItemVideo">
	<?php echo $item->video; ?>    
</div>
<?php if ($item->video_caption || $item->video_credits) : ?>
<div class="video-details clearfix">
	<span class="itemVideoCaption"><?php echo $item->video_caption; ?></span>
	<span class="itemVideoCredits"><?php echo $item->video_credits; ?></span>
</div>
<?php endif; ?>
</div>
<?php endif; ?>