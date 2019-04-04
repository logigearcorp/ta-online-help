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


if(!empty($this->item->fulltext)): ?>
	<?php if($this->item->params->get('itemIntroText')): ?>
	<div class="itemIntroText clearfix">
		<?php echo $this->item->introtext; ?>
	</div>
	<?php endif; ?>
	<?php if($this->item->params->get('itemFullText')): ?>
	<div class="itemFullText clearfix">
		<?php echo $this->item->fulltext; ?>
	</div>
	<?php endif; ?>
	<?php else: ?>
	<div class="itemFullText clearfix">
		<?php echo $this->item->introtext; ?>
	</div>
<?php endif; ?>