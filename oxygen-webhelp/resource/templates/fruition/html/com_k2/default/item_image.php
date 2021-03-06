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


if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
<div class="article-image">
	<a class="lightbox-link" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo $this->item->image_caption; ?>">
		<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
	</a>
	<?php if($this->item->params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
		<p class="img-caption"><?php echo $this->item->image_caption; ?></p>
	<?php endif; ?>
	<?php if($this->item->params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
		<p class="img-credits"><?php echo $this->item->image_credits; ?></p>
	<?php endif; ?>          
</div>
<div class="clearfix"></div>
<?php endif; ?>