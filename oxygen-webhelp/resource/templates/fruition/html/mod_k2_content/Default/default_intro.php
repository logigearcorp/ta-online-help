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

if($params->get('itemImage') || $params->get('itemIntroText')): ?>
<div class="moduleItemIntrotext clearfix">
	<?php if($params->get('itemImage') && isset($item->image)): ?>
		<a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
	      	<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
		</a>
	<?php endif; ?>

	<?php if($params->get('itemIntroText')): ?>
		<?php echo $item->introtext; ?>
	<?php endif; ?>
</div>
<?php endif; ?>