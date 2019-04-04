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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
  	<ul>
    	<?php foreach ($items as $key=>$item):	?>
    		<li class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">
				<div class="item-inner clearfix">               
					<?php
                    
                    
                    // Show before display plugins (Joomla and k2)
                    echo $item->event->BeforeDisplay; 
                    echo $item->event->K2BeforeDisplay;
                    
                    // Load moduel item parts
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_header'));
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_tinfo'));
                    
                    // Show after title plugins (Joomla and k2)
                    echo $item->event->AfterDisplayTitle;
                    echo $item->event->K2AfterDisplayTitle; 
                    
                    // Show before content plugins (Joomla and k2)
                    echo $item->event->BeforeDisplayContent; 
                    echo $item->event->K2BeforeDisplayContent;
                    
                    // Load main item parts
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_intro'));
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_additional'));
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_video'));
                    
                    // Show after content plugins (Joomla and k2)
                    echo $item->event->AfterDisplayContent; 
                    echo $item->event->K2AfterDisplayContent;
                                    
                    // Load bottom item parts
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_btinfo'));
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_tags'));
                    require (JModuleHelper::getLayoutPath('mod_k2_content', $getTemplate.DS.'default_readmore'));
                    
                    // Show after plugins (Joomla and k2)
                    echo $item->event->AfterDisplay;
                    echo $item->event->K2AfterDisplay;
                    
                    
                    ?>
            	</div>
            </li>
    	<?php endforeach; ?>
  	</ul>
  	<?php endif; ?>

	<?php if($params->get('itemCustomLink')): ?>
	<a class="moduleCustomLink" href="<?php echo $params->get('itemCustomLinkURL'); ?>" title="<?php echo K2HelperUtilities::cleanHtml($itemCustomLinkTitle); ?>">
		<?php echo $itemCustomLinkTitle; ?>
    </a>
	<?php endif; ?>

	<?php if($params->get('feed')): ?>
	<div class="k2FeedIcon clearfix">
		<a href="<?php echo JRoute::_('index.php?option=com_k2&view=itemlist&format=feed&moduleID='.$module->id); ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>
</div>