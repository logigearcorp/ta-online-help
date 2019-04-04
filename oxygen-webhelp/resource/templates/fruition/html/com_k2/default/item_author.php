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


if($this->item->params->get('itemAuthorBlock') && empty($this->item->created_by_alias)): ?>
<div class="itemAuthorBlock">
  	<?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)): ?>
  	<span class="author-image">
    	<img class="itemAuthorAvatar" src="<?php echo $this->item->author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->item->author->name); ?>" />
    </span>
  	<?php endif; ?>
    <div class="itemAuthorDetails">
   		<h3 class="itemAuthorName">
      		<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
      	</h3>
      	<?php if($this->item->params->get('itemAuthorDescription') && !empty($this->item->author->profile->description)): ?>
      		<p><?php echo $this->item->author->profile->description; ?></p>
      	<?php endif; ?>
      	<?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url)): ?>
      		<span class="itemAuthorUrl"><?php echo JText::_('K2_WEBSITE'); ?> <a rel="me" href="<?php echo $this->item->author->profile->url; ?>" target="_blank"><?php echo str_replace('http://','',$this->item->author->profile->url); ?></a></span>
      	<?php endif; ?>
      	<?php if($this->item->params->get('itemAuthorEmail')): ?>
      		<span class="itemAuthorEmail"><?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this->item->author->email); ?></span>
      	<?php endif; ?>
		<?php echo $this->item->event->K2UserDisplay; //K2 Plugins: K2UserDisplay ?>
    </div>
</div>
<?php endif; ?>