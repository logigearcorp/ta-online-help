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


if($this->item->params->get('itemHits') || ($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0)): ?>
<div class="article-info-bt clearfix">
	<ul class="article-info-bt-list">    
		<?php if($this->item->params->get('itemHits')): ?>
        <li>
            <?php echo JText::_('K2_READ'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('K2_TIMES'); ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
        <?php endif; ?>
        <?php if($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0): ?>
        <li>
            <?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>