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


if($this->item->params->get('catItemDateModified') || $this->item->params->get('catItemHits')): ?>
<div class="article-info-bt clearfix">
	<ul class="article-info-bt-list">
    	<?php if($this->item->params->get('catItemDateModified')): ?>
        <?php if($this->item->modified != $this->nullDate && $this->item->modified != $this->item->created ): ?>
        <li>
            <?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3')); ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
        <?php endif; ?>
        <?php endif; ?>            
        <?php if($this->item->params->get('catItemHits')): ?>
        <li>
			<?php echo JText::_('K2_READ'); ?> <?php echo $this->item->hits; ?> <?php echo JText::_('K2_TIMES'); ?>
        </li>
        <?php endif; ?>    
    </ul>
</div>
<?php endif; ?>