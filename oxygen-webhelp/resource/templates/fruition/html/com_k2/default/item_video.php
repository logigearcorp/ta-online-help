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


if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
<a name="itemVideoAnchor" id="itemVideoAnchor"></a>

<div class="itemVideoBlock">
  	<h3 class="itemBlocHeading"><?php echo JText::_('K2_MEDIA'); ?></h3>
	<?php if($this->item->videoType=='embedded'): ?>
        <div class="itemVideoEmbedded">
            <?php echo $this->item->video; ?>
        </div>
	<?php else: ?>
		<span class="itemVideo"><?php echo $this->item->video; ?></span>
	<?php endif; ?>
    <?php if (($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)) || ($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits))) : ?>
    	<div class="video-details clearfix">       
			<?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
                <span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
            <?php endif; ?>
            <?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
                <span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>