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
<div class="genericItemHeader">
	
	<?php if($this->params->get('genericItemTitle')): ?>
	<h2 class="genericItemTitle">
		<?php if ($this->params->get('genericItemTitleLinked')): ?>
            <a href="<?php echo $this->item->link; ?>">
                <?php echo $this->item->title; ?>
            </a>
        <?php else: ?>
        	<?php echo $this->item->title; ?>
        <?php endif; ?>
	</h2>
	<?php endif; ?>
</div>