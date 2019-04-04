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



if($this->item->params->get('tagItemCategory') || $this->item->params->get('tagItemDateCreated',1)): ?>
<div class="article-info clearfix">
	<ul class="article-info-list">
    <?php if($this->item->params->get('tagItemDateCreated',1)): ?>
	<li>
    	<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_ON'); ?></span>
		<?php echo JHTML::_('date', $this->item->created , JText::_('DATE_FORMAT_LC3')); ?>
	</li>
	<?php endif; ?>	
    
    
    
    <li><span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_IN'); ?></span>
	<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
    </li>
    </ul>
</div>
<?php endif; ?>