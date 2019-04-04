<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$params =& $this->item->params;
$images = json_decode($this->item->images);
$app = JFactory::getApplication();
$tparams = $app->getTemplate(true)->params;
$canEdit = $this->item->params->get('access-edit');
$useHeader = ($params->get('show_title') || $params->get('show_publish_date'));
$useIcons = ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit);
$useDefList = ($useIcons || ($params->get('show_parent_category') && $this->item->parent_id != 1) || $params->get('show_category') || ($params->get('show_author') && !empty($this->item->author )));
$useBtList = ($params->get('show_hits') || $params->get('show_modify_date') || $params->get('show_create_date'));

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>


<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
<div class="system-unpublished">
<?php endif; ?>
<?php  if ($tparams->get('blog_images_pos', 1) == 1 and isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<div class="article-image">
	<img src="<?php echo htmlspecialchars($images->image_intro); ?>" title="<?php echo htmlspecialchars($images->image_intro_caption); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
    <?php if ($images->image_intro_caption) : ?>
    <p class="img-caption"><?php echo htmlspecialchars($images->image_intro_caption); ?></p>
    <?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($useHeader) : ?>
	<div class="article-header"> 
    	<?php if ($params->get('show_publish_date')): ?>
        	<span class="published">
				<time datetime="<?php echo JHtml::_('date', $this->item->publish_up, 'c'); ?>" itemprop="datePublished">
					<?php echo JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
				</time>
			</span>
        <?php endif; ?>
        <h2 class="article-title">
            <?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
                <?php echo $this->escape($this->item->title); ?></a>
            <?php else : ?>
                <?php echo $this->escape($this->item->title); ?>
            <?php endif; ?>
        </h2>    
    </div>
<?php endif; ?>



<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php // to do not that elegant would be nice to group the params ?>

<?php if ($useDefList) : ?>
<div class="article-info clearfix">
 <ul class="article-info-list">
 
 <?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<li class="createdby">
		<?php $author = $this->item->author; ?>
		<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>
		<?php if (!empty($this->item->contact_link ) &&  $params->get('link_author') == true) : ?>
			<?php echo JText::sprintf('TMPL_MB2_WRITTEN_BY', JHtml::_('link', $this->item->contact_link, $author)); ?>
		<?php else :?>
			<?php echo JText::sprintf('TMPL_MB2_WRITTEN_BY', $author); ?>
		<?php endif; ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
	</li>
<?php endif; ?>
 	
<?php if ($params->get('show_parent_category') && $this->item->parent_id != 1) : ?>
		<li class="parent-category-name">
			<?php $title = $this->escape($this->item->parent_title);
				$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_id)) . '">' . $title . '</a>'; ?>
			<?php if ($params->get('link_parent_category')) : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
		<li class="category-name">
			<?php $title = $this->escape($this->item->category_title);
					$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)) . '">' . $title . '</a>'; ?>
			<?php if ($params->get('link_category')) : ?>
				<?php echo JText::sprintf('TMPL_MB2_WRITTEN_IN', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('TMPL_MB2_WRITTEN_IN', $title); ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
</ul>

<?php if ($useIcons) : ?>

       <ul class="article-icons">
           <?php if ($params->get('show_print_icon')) : ?>
           <li class="print-icon">
               <?php echo preg_replace('@<img.*?alt="(.*?)".*?\/>@mis','<i class="fa fa-print"></i>',JHtml::_('icon.print_popup', $this->item, $params, array(), true)); ?>
           </li>
           <?php endif; ?>
            
           <?php if ($params->get('show_email_icon')) : ?>
           <li class="email-icon">
               <?php echo preg_replace('@<img.*?alt="(.*?)".*?\/>@mis','<i class="fa fa-envelope-o"></i>',JHtml::_('icon.email', $this->item, $params, array(), true)); ?>
           </li>
           <?php endif; ?>
                            
                            
           <?php if ($this->user->authorise('core.edit', 'com_content.article.' . $this->item->id)) : ?>
           <li class="edit-icon">
               <?php echo preg_replace('@<img.*?alt="(.*?)".*?\/>@mis','<i class="fa fa-edit"></i>',JHtml::_('icon.edit', $this->item, $params, array(), true)); ?>
           </li>
           <?php endif; ?>
       </ul>
<?php endif; ?>


</div>
<?php endif; ?>
<div class="article-content clearfix">

<?php  if ($tparams->get('blog_images_pos', 1) == 0 and isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="article-image align-<?php echo htmlspecialchars($imgfloat); ?>">
	<img src="<?php echo htmlspecialchars($images->image_intro); ?>" title="<?php echo htmlspecialchars($images->image_intro_caption); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
    <?php if ($images->image_intro_caption) : ?>
    <p class="img-caption"><?php echo htmlspecialchars($images->image_intro_caption); ?></p>
    <?php endif; ?>
	</div>
<?php endif; ?>



<?php echo $this->item->introtext; ?>
</div>
<?php if ($useBtList) : ?>
<div class="article-info-bt clearfix">
<ul class="article-info-bt-list">
<?php if ($params->get('show_modify_date')) : ?>
		<li class="modified">
		<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
		<li class="create">
		<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
		<li class="hits">
		<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
		</li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>



<?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
	<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
	<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
<?php endif; ?>


<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug));
		$link = new JUri($link1);
		$link->setVar('return', base64_encode($returnURL));
	endif;
?>
		<p class="readmore">
				<a class="btn btn-default rounded" href="<?php echo $link; ?>">
					<?php if (!$params->get('access-view')) :
						echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
					elseif ($readmore = $this->item->alternative_readmore) :
						echo $readmore;
						if ($params->get('show_readmore_title', 0) != 0) :
							echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
						endif;
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
					else :
						echo JText::_('COM_CONTENT_READ_MORE');
						echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
					endif; ?></a>
		</p>
<?php endif; ?>

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
	|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
</div>
<?php endif; ?>

<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent; ?>