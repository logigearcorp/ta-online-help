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


if ($this->item->params->get('catItemReadMore')): ?>
<p class="readmore"><a class="btn btn-primary rounded" href="<?php echo $this->item->link; ?>"><?php echo JText::_('K2_READ_MORE'); ?></a></p>
<?php endif; ?>