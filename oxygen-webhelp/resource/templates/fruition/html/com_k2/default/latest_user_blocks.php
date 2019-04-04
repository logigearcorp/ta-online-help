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


if ($this->params->get('userFeed') || $this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
	<div class="latestItemsUser">
	
		<?php if($this->params->get('userFeed')): ?>
		<div class="k2FeedIcon">
			<a href="<?php echo $this-user->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
				<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
			</a>
		</div>
		<?php endif; ?>
	
		<?php if ($this->params->get('userImage') && !empty($this-user->avatar)): ?>
		<img src="<?php echo $this-user->avatar; ?>" alt="<?php echo $this-user->name; ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px;height:auto;" />
		<?php endif; ?>
	
		<?php if ($this->params->get('userName')): ?>
		<h2><a rel="author" href="<?php echo $this-user->link; ?>"><?php echo $this-user->name; ?></a></h2>
		<?php endif; ?>
	
		<?php if ($this->params->get('userDescription') && isset($this-user->profile->description)): ?>
		<?php echo $this-user->profile->description; ?>
		<?php endif; ?>
	
		<?php if ($this->params->get('userURL') || $this->params->get('userEmail')): ?>
			<?php if ($this->params->get('userURL') && isset($this-user->profile->url)): ?>
			<span class="latestItemsUserURL">
				<?php echo JText::_('K2_WEBSITE_URL'); ?>: <a rel="me" href="<?php echo $this-user->profile->url; ?>" target="_blank"><?php echo $this-user->profile->url; ?></a>
			</span>
			<?php endif; ?>
	
			<?php if ($this->params->get('userEmail')): ?>
			<span class="latestItemsUserEmail">
				<?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this-user->email); ?>
			</span>
			<?php endif; ?>
		<?php endif; ?>	
	<?php echo $this-user->event->K2UserDisplay; ?>
</div>
<?php endif; ?>