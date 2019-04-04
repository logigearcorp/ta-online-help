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
<?php if(($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)) || ($this->item->params->get('itemRelated') && isset($this->relatedItems))) : ?>
<div class="user-items clearfix">
<?php if($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)): ?>
<div class="itemAuthorLatest">
	<h3><?php echo JText::_('K2_LATEST_FROM'); ?> <?php echo $this->item->author->name; ?></h3>
	<ul>
		<?php foreach($this->authorLatestItems as $key=>$item): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">
				<a href="<?php echo $item->link ?>"><i class="fa fa-file-text-o"></i> <?php echo $item->title; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>

<?php


/*
Note regarding 'Related Items'!
If you add:
	- the CSS rule 'overflow-x:scroll;' in the element div.itemRelated {…} in the k2.css
	- the class 'k2Scroller' to the ul element below
	- the classes 'k2ScrollerElement' and 'k2EqualHeights' to the li element inside the foreach loop below
	- the style attribute 'style="width:<?php echo $item->imageWidth; ?>px;"' to the li element inside the foreach loop below
	...then your Related Items will be transformed into a vertical-scrolling block, inside which, all items have the same height (equal column heights). This can be very useful if you want to show your related articles or products with title/author/category/image etc., which would take a significant amount of space in the classic list-style display.
*/

?>

<?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
<div class="itemRelated">
	<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
	<?php  
			$arrfirst = array_slice($this->relatedItems, 0, count($this->relatedItems)/2);
			$arrSecond = array_slice($this->relatedItems, count($this->relatedItems)/2,count($this->relatedItems));
		?>

	<div class="row">
			<div class="col-md-6">
			<ul style="margin-left:-23px">
			<?php foreach($arrfirst as $key=>$item): ?>
				
			<li><div class="ta-relate-item"><a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a></div></li>
				
			<?php endforeach; ?>
			</ul>
			</div>

			<div class="col-md-6">
			<ul style="margin-left:-23px">
			<?php foreach($arrSecond as $key=>$item): ?>
				<li><div class="ta-relate-item"><a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a></div></li>
			<?php endforeach; ?>
			</ul>
			</div>
	
	</div> 

	<!-- <ul>
		<?php foreach($this->relatedItems as $key=>$item): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?>">

				<?php if($this->item->params->get('itemRelatedTitle', 1)): ?>
				<a class="itemRelTitle" href="<?php echo $item->link ?>"><i class="fa fa-file-text-o"></i> <?php echo $item->title; ?></a>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedCategory')): ?>
				<div class="itemRelCat"><?php echo JText::_("K2_IN"); ?> <a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedAuthor')): ?>
				<div class="itemRelAuthor"><?php echo JText::_("K2_BY"); ?> <a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageSize')): ?>
				<img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" />
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedIntrotext')): ?>
				<div class="itemRelIntrotext"><?php echo $item->introtext; ?></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedFulltext')): ?>
				<div class="itemRelFulltext"><?php echo $item->fulltext; ?></div>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedMedia')): ?>
				<?php if($item->videoType=='embedded'): ?>
				<div class="itemRelMediaEmbedded itemVideoEmbedded"><?php echo $item->video; ?></div>
				<?php else: ?>
				<div class="itemRelMedia"><?php echo $item->video; ?></div>
				<?php endif; ?>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageGallery')): ?>
				<div class="itemRelImageGallery"><?php echo $item->gallery; ?></div>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul> -->
</div>
</div>
<?php endif; ?>
<?php endif; ?>