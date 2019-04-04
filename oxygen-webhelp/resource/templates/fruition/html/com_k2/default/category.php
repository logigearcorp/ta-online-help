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


$areItems = ((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)));
$isCountItems = (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links));
$isLeading = (isset($this->leading) && count($this->leading));
$isPrimary = (isset($this->primary) && count($this->primary));
$isSecondary = (isset($this->secondary) && count($this->secondary));
$isLinks = (isset($this->links) && count($this->links));


?>
<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('catFeedIcon')): ?>
	<div class="k2FeedIcon clearfix">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
	</div>
	<?php endif; ?>
	
    <?php echo $this->loadTemplate('list'); // Load categories and subcategories blocks ?>
    
	<?php if($areItems && $isCountItems) : // Now We start category items list echo ?>
	
    <div class="itemList blog">    
    
		<?php if($isLeading): // We start leading items ?>
		<div class="itemListLeading clearfix<?php echo ($this->params->get('num_leading_columns')>1) ? ' multicol-container' : ''; ?>">
			<?php $x = 0; foreach($this->leading as $key=>$item): $x++; ?>			
                <div class="itemContainer<?php echo ($this->params->get('num_leading_columns')>1) ? 
                ' multicol-item col-numb' . $this->params->get('num_leading_columns')  : 
                '';?>">
					<?php                        
                  	// Load category_item.php by default
               		$this->item = &$item;
             		echo $this->loadTemplate('item');                        
                    ?>
				</div>
				<?php if($this->params->get('num_leading_columns')>1 && $this->params->get('num_leading_columns')==$x): $x=0;?>
				<div class="clearfix"></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if($isPrimary): // We start primary items ?>
		<div class="itemListPrimary cleafix<?php echo ($this->params->get('num_primary_columns')>1) ? ' multicol-container' : ''; ?>">
			<?php $y=0; foreach($this->primary as $key=>$item): $y++; ?>		
				<div class="itemContainer<?php echo ($this->params->get('num_primary_columns')>1) ? 
                ' multicol-item col-numb' . $this->params->get('num_primary_columns')  : 
                '';?>">
					<?php
                    // Load category_item.php by default
                    $this->item = &$item;
                    echo $this->loadTemplate('item');
                    ?>
				</div>
				<?php if($this->params->get('num_primary_columns')>1 && $this->params->get('num_primary_columns')==$y): $y=0;?>
					<div class="clearfix"></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if($isSecondary): // We start secondary items ?>        
		<div class="itemListSecondary clearfix<?php echo ($this->params->get('num_secondary_columns')>1) ? ' multicol-container' : ''; ?>">
			<?php $z=0; foreach($this->secondary as $key=>$item): $z++; ?>		
                <div class="itemContainer<?php echo($this->params->get('num_secondary_columns')>1) ? 
                    ' multicol-item col-numb' . $this->params->get('num_secondary_columns')  : 
                    '';?>">
						<?php
                        // Load category_item.php by default
                        $this->item=$item;
                        echo $this->loadTemplate('item');
                        ?>
                </div>
                <?php if($this->params->get('num_secondary_columns')>1 && $this->params->get('num_secondary_columns')==$z): $z=0;?>
                <div class="clearfix"></div>
                <?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if($isLinks): ?>
		<div class="itemListLinks clearfix<?php echo ($this->params->get('num_links_columns')>1) ? ' multicol-container' : ''; ?>">
			<h4><?php echo JText::_('K2_MORE'); ?></h4>
			<?php $w=0; foreach($this->links as $key=>$item): $w++; ?>
				<div class="itemContainer<?php echo ($this->params->get('num_links_columns')>1) ? 
                    ' multicol-item col-numb' . $this->params->get('num_links_columns')  : 
                    '';?>">
					<?php
					// Load category_item_links.php by default
					$this->item=$item;
					echo $this->loadTemplate('item_links');
					?>
				</div>
			<?php if($this->params->get('num_secondary_columns')>1 && $this->params->get('num_secondary_columns')==$z): $z=0;?>
			<div class="clearfix"></div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
        
	</div>

	<?php if($this->pagination->getPagesLinks()): ?>
	<div class="pagination k2Pagination">
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		<?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>

	<?php endif; ?>
</div>