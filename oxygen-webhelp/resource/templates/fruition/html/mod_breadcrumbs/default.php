<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$sep = '<i class="fa fa-angle-right"></i>';

?>

<div class="breadcrumbs<?php echo $moduleclass_sfx; ?>">
<ul>
<?php /* if ($params->get('showHere', 1))
	{
		echo '<span class="showHere">' .JText::_('MOD_BREADCRUMBS_HERE').'</span>';
	}*/
?>
<?php for ($i = 0; $i < $count; $i ++) :
	// Workaround for duplicate Home when using multilanguage
	if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link) {
		continue;
	}
	// If not the last item in the breadcrumbs add the separator
	if ($i < $count - 1)
	{
		if (!empty($list[$i]->link)) {
			echo '<li class="pathway"><a href="'.$list[$i]->link.'">'.$list[$i]->name.'</a><span class="path-sep">'. $sep .'</span></li>';
		} else {
			echo '<li>';
			echo $list[$i]->name;
			echo '</li>';
		}
		if ($i < $count - 2)
		{
		//	echo ' '.$separator.' ';
		}
	}  elseif ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
		if ($i > 0)
		{
		//	echo ' '.$separator.' ';
		}
		echo '<li>';
		echo $list[$i]->name;
		echo '</li>';
	}
endfor; ?>
</ul>
</div>