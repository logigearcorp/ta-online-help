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


if($this->params->get('genericItemCategory') || $this->params->get('genericItemDateCreated')): ?>
<div class="article-onfo clearfix">    
    <?php if($this->params->get('genericItemDateCreated')): ?>
	<span class="genericItemDateCreated published">
    	<?php echo JText::_('TMPL_MB2_K2_WRITTEN_ON'); ?>
		<?php echo JHTML::_('date', $this->item->created , JText::_('DATE_FORMAT_LC3')); ?>
	</span>
	<?php endif; ?>
    <span class="genericItemCategory">
        <?php echo JText::_('TMPL_MB2_K2_WRITTEN_IN'); ?>
        <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
    </span>
</div>
<?php endif; ?>