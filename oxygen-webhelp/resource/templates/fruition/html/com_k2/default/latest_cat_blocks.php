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

?>

<?php if($this->params->get('categoryFeed') || $this->params->get('categoryImage') || $this->params->get('categoryTitle') || $this->params->get('categoryDescription')): ?>
<div class="itemListCategory">	
	<?php if($this->params->get('categoryFeed')): ?>
	<div class="k2FeedIcon">
		<a href="<?php echo $this->category->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>
	
	<?php if ($this->params->get('categoryImage') && !empty($this->category->image)): ?>
		<img src="<?php echo $this->category->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px;height:auto;" />	
	<?php endif; ?>
	
	<?php if ($this->params->get('categoryTitle')): ?>
	<h2><a href="<?php echo $this->category->link; ?>"><?php echo $this->category->name; ?></a></h2>
	<?php endif; ?>
	
	<?php if ($this->params->get('categoryDescription') && isset($this->category->description)): ?>
		<?php echo $this->category->description; ?>
	<?php endif; ?>
    
	<?php echo $this->category->event->K2CategoryDisplay; // K2 Plugins: K2CategoryDisplay ?>
</div>
<?php endif; ?>