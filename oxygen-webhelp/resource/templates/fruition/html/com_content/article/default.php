<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = 0;
$datepos = 2;
JHtml::_('behavior.caption');
$useDefaultBt = ($params->get('show_modify_date') || $params->get('show_create_date') || $params->get('show_hits'));
$useIcons = ($params->get('access-edit') ||  $params->get('show_print_icon') || $params->get('show_email_icon'));
$useDefList = ($params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $useIcons);

?>
<div class="item-page<?php echo $this->pageclass_sfx; ?> clearfix" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	
	
	
	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
		echo $this->item->pagination;
	?>
	<?php endif; ?>
	
	<?php 
	
	
if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
	echo $this->item->pagination;
}
?>
	<?php if (!$useDefList && $this->print) : ?>
		<div id="pop-print" class="btn hidden-print">
			<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
		</div>
		<div class="clearfix"> </div>
	<?php endif; ?>
	<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
	<div class="page-header">
		<?php if ($params->get('show_publish_date') && $datepos == 1) : ?>
			<span class="published">
				<time datetime="<?php echo JHtml::_('date', $this->item->publish_up, 'c'); ?>" itemprop="datePublished">
					<?php echo JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
				</time>
			</span>
		<?php endif; ?>
		<h2 class="article-title">
			<?php if ($params->get('show_title')) : ?>
				<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
					<a href="<?php echo $this->item->readmore_link; ?>" itemprop="url"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			<?php endif; ?>
		</h2>
		<?php if ($this->item->state == 0) : ?>
			<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
		<?php endif; ?>
		<?php if (strtotime($this->item->publish_up) > strtotime(JFactory::getDate())) : ?>
			<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
		<?php endif; ?>
		<?php if ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00') : ?>
			<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
	
    
    

	<?php if (($params->get('show_publish_date') && $datepos == 2) || $useDefList && ($info == 0 || $info == 2)) : ?>
		<div class="article-info clearfix">
			<ul class="article-info-list">
			
			<?php if ($params->get('show_publish_date') && $datepos == 2) : ?>
				<li class="published">
					<?php echo JText::sprintf('TMPL_MB2_WRITTEN_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
				<li class="createdby" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
					<?php $author = '<span itemprop="name">' . $author . '</span>'; ?>
					<?php if (!empty($this->item->contact_link) && $params->get('link_author') == true) : ?>
						<?php echo JText::sprintf(/*'COM_CONTENT_WRITTEN_BY', */'TMPL_MB2_WRITTEN_BY', JHtml::_('link', $this->item->contact_link, $author, array('itemprop' => 'url'))); ?>
					<?php else: ?>
						<?php echo JText::sprintf(/*'COM_CONTENT_WRITTEN_BY',*/'TMPL_MB2_WRITTEN_BY', $author); ?>
					<?php endif; ?>
                    <?php /* ?><span class="separator">/</span><?php */ ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
				<li class="parent-category-name">
                	
                    <?php /* ?><span class="separator">/</span><?php */ ?>
					<?php $title = $this->escape($this->item->parent_title); ?>
					<?php if ($params->get('link_parent_category') && !empty($this->item->parent_slug)) : ?>
						<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
					<?php else : ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', '<span itemprop="genre">' . $title . '</span>'); ?>
					<?php endif; ?>
                    <?php /* ?><span class="separator">/</span><?php */ ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_category')) : ?>
				<li class="category-name">
					<?php $title = $this->escape($this->item->category_title); ?>
					<?php if ($params->get('link_category') && $this->item->catslug) : ?>
						<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
						<?php echo JText::sprintf(/*'COM_CONTENT_CATEGORY',*/'TMPL_MB2_WRITTEN_IN', $url); ?>
					<?php else : ?>
						<?php echo JText::sprintf(/*'COM_CONTENT_CATEGORY',*/'TMPL_MB2_WRITTEN_IN',  '<span itemprop="genre">' . $title . '</span>'); ?>
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

	

	<?php if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
		|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php if ($params->get('access-view')):?>
	<?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
	
	<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
    
	<div class="article-image align-<?php echo htmlspecialchars($imgfloat); ?>"> 
    <img title="<?php echo htmlspecialchars($images->image_fulltext_caption); ?>" src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" />    
    <?php if ($images->image_fulltext_caption) : ?>
    	<p class="img-caption"><?php echo htmlspecialchars($images->image_fulltext_caption); ?></p>
    <?php endif; ?>
    </div>
	<?php endif; ?>
	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative):
		echo $this->item->pagination;
	endif;
	?>
	<?php if (isset ($this->item->toc)) :
		echo $this->item->toc;
	endif; ?>
	<div itemprop="articleBody">
		<?php echo $this->item->text; ?>
	</div>

	
    
    
    <?php if ($useDefaultBt) : ?>
    	<div class="article-info-bt clearfix">
        	<ul class="article-info-bt-list">
			<?php if ($params->get('show_modify_date')) : ?>
                <li class="modified">
                    <time datetime="<?php echo JHtml::_('date', $this->item->modified, 'c'); ?>" itemprop="dateModified">
                        <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
                    </time>
                    <?php /* ?><span class="separator">/</span><?php */ ?>
                </li>
            <?php endif; ?>
            <?php if ($params->get('show_create_date')) : ?>
                <li class="create">
                    <time datetime="<?php echo JHtml::_('date', $this->item->created, 'c'); ?>" itemprop="dateCreated">
                        <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
                    </time>
                    <?php /* ?><span class="separator">/</span><?php */ ?>
                </li>
            <?php endif; ?>
    
            <?php if ($params->get('show_hits')) : ?>
                <li class="hits">
                    <meta itemprop="interactionCount" content="UserPageVisits:<?php echo $this->item->hits; ?>" />
                    <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
                    <?php /* ?><span class="separator">/</span><?php */ ?>
                </li>
            <?php endif; ?>
            </ul>
        </div>
	<?php endif; ?>
    
    
    
    
    <?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>

		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>
    
    
    
    
    
	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php // Optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JUri($link1);?>
	<p class="readmore">
		<a class="btn btn-default rounded" href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs); ?>
		<?php
		if ($attribs->alternative_readmore == null) :
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
		endif; ?>
		</a>
	</p>
	<?php endif; ?>
	<?php endif; ?>
	<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
	echo $this->item->pagination;
?>
	<?php endif; ?>
	<?php echo $this->item->event->afterDisplayContent; ?> </div>
