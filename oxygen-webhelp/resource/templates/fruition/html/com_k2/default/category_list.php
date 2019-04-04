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

if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
<div class="itemListCategoriesBlock">
	<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
	<div class="itemListCategory">
		<?php if(isset($this->addLink)): ?>
		<span class="catItemAddLink">
			<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->addLink; ?>">
				<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
			</a>
		</span>
		<?php endif; ?>

		<?php if($this->params->get('catImage') && $this->category->image): ?>
		<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
		<?php endif; ?>
		<?php if($this->params->get('catTitle')): ?>
			<h2><?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?></h2>
		<?php endif; ?>
		<?php if($this->params->get('catDescription')): ?>
			<p><?php echo $this->category->description; ?></p>
		<?php endif; ?>
		<?php echo $this->category->event->K2CategoryDisplay; // K2 Plugins: K2CategoryDisplay ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
	<div class="itemListSubCategories clearfix<?php echo ($this->params->get('subCatColumns')>1) ? ' multicol-container' : ''; ?>">
		<h3><?php echo JText::_('K2_CHILDREN_CATEGORIES'); ?></h3>

		<?php $k=0; foreach($this->subCategories as $key=>$subCategory): $k++; ?>
			<div class="subCategoryContainer<?php echo ($this->params->get('subCatColumns')>1) ? ' multicol-item col-numb' . $this->params->get('subCatColumns') : ''; ?>">
				<div class="subCategory">
					<?php if($this->params->get('subCatImage') && $subCategory->image): ?>
					<a class="subCategoryImage" href="<?php echo $subCategory->link; ?>">
						<img alt="<?php echo K2HelperUtilities::cleanHtml($subCategory->name); ?>" src="<?php echo $subCategory->image; ?>" />
					</a>
					<?php endif; ?>
					<?php if($this->params->get('subCatTitle')): ?>
					<h2>
						<a href="<?php echo $subCategory->link; ?>">
							<?php echo $subCategory->name; ?><?php if($this->params->get('subCatTitleItemCounter')) echo ' ('.$subCategory->numOfItems.')'; ?>
						</a>
					</h2>
					<?php endif; ?>
					<?php if($this->params->get('subCatDescription')): ?>
					<p><?php echo $subCategory->description; ?></p>
					<?php endif; ?>
					<a class="btn btn-primary rounded" href="<?php echo $subCategory->link; ?>">
						<?php echo JText::_('K2_VIEW_ITEMS'); ?>
					</a>
				</div>
			</div>
            <?php if($this->params->get('subCatColumns')>1 && $this->params->get('subCatColumns') == $k) : $k=0; ?>
				<div class="clearfix"></div>
            <?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
<?php endif; ?>