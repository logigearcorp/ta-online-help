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

// Get user stuff (do not change)
$user = JFactory::getUser();


if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
<div class="user-block-wrap clearfix">


<div class="itemAuthorBlock">
	
	<?php if(isset($this->addLink) && JRequest::getInt('id')==$user->id): ?>
		<span class="userItemAddLink">
			<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->addLink; ?>">
				<?php echo JText::_('K2_POST_A_NEW_ITEM'); ?>
			</a>
		</span>
	<?php endif; ?>
	
	<?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
		<div class="author-image">       
        	<img src="<?php echo $this->user->avatar; ?>" alt="<?php echo htmlspecialchars($this->user->name, ENT_QUOTES, 'UTF-8'); ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px; height:auto;" />
        </div>
	<?php endif; ?>
	
    
    
    <div class="itemAuthorDetails">
    
    
   	
	<?php if ($this->params->get('userName')): ?>
		<h2 class="itemAuthorName"><?php echo $this->user->name; ?></h2>
	<?php endif; ?>
		
	<?php if ($this->params->get('userDescription') && trim($this->user->profile->description)): ?>
		<p><?php echo $this->user->profile->description; ?></p>
	<?php endif; ?>
		
	<?php if (($this->params->get('userURL') && isset($this->user->profile->url) && $this->user->profile->url) || $this->params->get('userEmail')): ?>
		<div class="userAdditionalInfo">
			<?php if ($this->params->get('userURL') && isset($this->user->profile->url) && $this->user->profile->url): ?>
                <span class="itemAuthorUrl">
                    <?php echo JText::_('K2_WEBSITE_URL'); ?>: <a href="<?php echo $this->user->profile->url; ?>" target="_blank" rel="me"><?php echo $this->user->profile->url; ?></a>
                </span>
			<?php endif; ?>

			<?php if ($this->params->get('userEmail')): ?>
                <span class="itemAuthorEmail">
                    <?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this->user->email); ?>
                </span>
			<?php endif; ?>	
		</div>
	<?php endif; ?>
     </div>
    
		
	<?php echo $this->user->event->K2UserDisplay; ?>
</div>
</div>
<?php endif; ?>