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


if($this->params->get('genericItemExtraFields') && count($this->item->extra_fields)): ?>
<div class="additional-info">
	<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
	<ul>
		<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
		<?php if($extraField->value != ''): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
				<?php if($extraField->type == 'header'): ?>
				<h4 class="genericItemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
				<?php else: ?>
				<span class="genericItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
				<span class="genericItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
				<?php endif; ?>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>