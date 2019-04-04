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


if($this->item->params->get('itemExtraFields') || $this->item->params->get('itemAttachments')): ?>
<div class="additional-info clearfix">
<?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
<div class="itemExtraFields">
	<h3><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
	<ul>
	<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
		<?php if($extraField->value != ''): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
				<?php if($extraField->type == 'header'): ?>
				<h4 class="itemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
				<?php else: ?>
				<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
				<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
				<?php endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>

<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
<div class="itemAttachmentsBlock">
	<h3><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></h3>
	<ul class="itemAttachments">    
		<?php foreach ($this->item->attachments as $attachment): ?>
			<li>
			    <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><i class="fa fa-download"></i> <?php echo $attachment->filename; ?></a>
			  	<?php if($this->item->params->get('itemAttachmentsCounter')): ?>
			    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
			    <?php endif; ?>
		    </li>
		 <?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
</div>
<?php endif; ?>