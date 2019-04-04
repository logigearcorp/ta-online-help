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

if(($params->get('itemExtraFields') && count($item->extra_fields)) || ($params->get('itemAttachments') && count($item->attachments))): ?>
<div class="additional-info clearfix">
<?php if ($params->get('itemExtraFields') && count($item->extra_fields)) : ?>
      <div class="itemExtraFields">
	      <h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
	      <ul>
	        <?php foreach ($item->extra_fields as $extraField): ?>
					<?php if($extraField->value != ''): ?>
					<li class="type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
						<?php if($extraField->type == 'header'): ?>
						<h5 class="itemExtraFieldsHeader"><?php echo $extraField->name; ?></h5>
						<?php else: ?>
						<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
						<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
						<?php endif; ?>
						<div class="clr"></div>
					</li>
					<?php endif; ?>
	        <?php endforeach; ?>
	      </ul>
      </div>
      <?php endif; ?>
      
      
      <?php if($params->get('itemAttachments') && count($item->attachments)): ?>
			<div class="itemAttachmentsBlock">
            	<h4><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></h4>
            	<ul class="itemAttachments">
					<?php foreach ($item->attachments as $attachment): ?>
                        <li>
                            <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
                            <i class="fa fa-download"></i> <?php echo $attachment->filename; ?>
                            </a>
                        </li>
					<?php endforeach; ?>
                </ul>
			</div>
      <?php endif; ?>
</div> 
<?php endif; ?>
      

			