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


if($this->item->params->get('latestItemDateCreated') || $this->item->params->get('latestItemCategory') || ($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) )): ?>
<div class="article-info clearfix">
	<ul class="article-info-list">
    	
		<?php if($this->item->params->get('latestItemDateCreated')): ?>
      
        <span>
       	 	<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_ON'); ?></span>
            <?php echo JHTML::_('date', $this->item->created , JText::_('DATE_FORMAT_LC3')); ?>
        </span>
        <?php endif; ?>
		
		
		<?php if($this->item->params->get('latestItemCategory')): ?>
		<li>
			<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_IN'); ?></span>
			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>
        
        <?php if($this->item->params->get('latestItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
        <li>
            <?php if(!empty($this->item->event->K2CommentsCounter)): ?>
                <?php echo $this->item->event->K2CommentsCounter; ?>
            <?php else: ?>
                <?php if($this->item->numOfComments > 0): ?>
                <a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                    <?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
                </a>
                <?php else: ?>
                <a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                    <?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
                </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
        <?php endif; ?>
        
    </ul>
</div>
<?php endif; ?>