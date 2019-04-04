<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.beez5
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$params = &$this->params;


?>
<div id="archive-items">
<?php foreach ($this->items as $i => $item) : ?>
	<article class="row<?php echo $i % 2; ?>">
    <div class="article-inner">

		<h2 class="article-title">
		<?php if ($params->get('link_titles')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug)); ?>">
				<?php echo $this->escape($item->title); ?></a>
		<?php else: ?>
				<?php echo $this->escape($item->title); ?>
		<?php endif; ?>
		</h2>


<?php if (($params->get('show_author')) or ($params->get('show_parent_category')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) : ?>
 <div class="article-info clearfix">
 <ul class="article-info-list">
<?php endif; ?>
<?php if ($params->get('show_parent_category')) : ?>
		<li class="parent-category-name">
			<?php	$title = $this->escape($item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>

<?php if ($params->get('show_category')) : ?>
		<li class="category-name">
			<?php	$title = $this->escape($item->category_title);
					$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '">' . $title . '</a>'; ?>
			<?php if ($params->get('link_category') && $item->catslug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
		<li class="create">
		<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'))); ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_modify_date')) : ?>
		<li class="modified">
		<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_publish_date')) : ?>
		<li class="archive-published">
		<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
        <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($item->author )) : ?>
	<li class="createdby">
		<?php $author = $item->author; ?>
		<?php $author = ($item->created_by_alias ? $item->created_by_alias : $author);?>
			<?php if (!empty($item->contact_link ) &&  $params->get('link_author') == true):?>
				<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $item->contact_link, $author)); ?>
			<?php else :?>
				<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
	</li>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
		<li class="hits">
		<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
		</li>
<?php endif; ?>
<?php if (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))) :?>
	 </ul>
     </div>
<?php endif; ?>

<?php  if ($params->get('show_intro')) :?>
		<div class="intro">
			<?php echo JHtml::_('string.truncate', $item->introtext, $params->get('introtext_limit')); ?>
		</div>

		<?php endif; ?>
        </div>
	</article>
<?php endforeach; ?>
</div>
<div id="pagination">
	<span><?php echo $this->pagination->getPagesLinks(); ?></span>
	<span><?php echo $this->pagination->getPagesCounter(); ?></span>
</div>