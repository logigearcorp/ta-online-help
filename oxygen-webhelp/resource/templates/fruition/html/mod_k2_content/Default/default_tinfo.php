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


if($params->get('itemAuthor') || $params->get('itemDateCreated') || $params->get('itemCategory') || ($params->get('itemCommentsCounter') && $componentParams->get('comments'))): ?>
<div class="article-info clearfix">
	<ul class="article-info-list">
    	<?php if ($params->get('itemAuthor')) : ?>
		<li>
        	<?php echo JText::_('TMPL_MB2_K2_WRITTEN_BY'); ?>
			<?php if(isset($item->authorLink)): ?>
                <a rel="author" title="<?php echo K2HelperUtilities::cleanHtml($item->author); ?>" href="<?php echo $item->authorLink; ?>">
                    <?php echo $item->author; ?>	
                </a>
            <?php else: ?>
                <?php echo $item->author; ?>
            <?php endif; ?>	
            <?php /* ?><span class="separator">/</span><?php */ ?>		
		</li>
        <?php endif; ?>
        <?php if($params->get('itemCategory')): ?>
        <li>
        	<?php echo JText::_('TMPL_MB2_K2_WRITTEN_IN') ; ?>
            <a class="moduleItemCategory" href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?></a>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
        <?php endif; ?>  
        <?php if($params->get('itemDateCreated')): ?>
    	<li>
        	<?php echo JText::_('TMPL_MB2_K2_WRITTEN_ON') ; ?> <?php echo JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
 		</li>
      <?php endif; ?>
      <?php if($params->get('itemCommentsCounter') && $componentParams->get('comments')): ?>		
		<?php if(!empty($item->event->K2CommentsCounter)): ?>
			<!-- K2 Plugins: K2CommentsCounter -->
			<?php echo $item->event->K2CommentsCounter; ?>
		<?php else: ?>
        <li>
			<?php if($item->numOfComments>0): ?>
				<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
					<?php echo $item->numOfComments; ?> <?php if($item->numOfComments>1) echo JText::_('K2_COMMENTS'); else echo JText::_('K2_COMMENT'); ?>
				</a>
			<?php else: ?>
				<a class="moduleItemComments" href="<?php echo $item->link.'#itemCommentsAnchor'; ?>">
					<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
				</a>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
        </li>
		<?php endif; ?>
		<?php endif; ?>      
    </ul>
</div>
<?php endif; ?>