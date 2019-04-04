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


if(
	$this->item->params->get('itemDateCreated') ||
	$this->item->params->get('itemAuthor') ||
	$this->item->params->get('itemCategory') ||
	$this->item->params->get('itemFontResizer') ||
	$this->item->params->get('itemPrintButton') ||
	$this->item->params->get('itemEmailButton') ||
	$this->item->params->get('itemVideoAnchor') ||
	$this->item->params->get('itemImageGalleryAnchor') ||
	$this->item->params->get('itemCommentsAnchor')
): ?>
<div class="article-info clearfix">
	<ul class="article-info-list">
		
		<?php if($this->item->params->get('itemDateCreated')): ?>
        <li>
       		<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_ON'); ?></span>
            <?php echo JHTML::_('date', $this->item->created , JText::_('DATE_FORMAT_LC3')); ?>
        </li>
        <?php endif; ?>
		
		<?php if($this->item->params->get('itemAuthor')) : ?>
		<li>
   			<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_BY'); ?></span>
 			<?php if(empty($this->item->created_by_alias)): ?>
       			<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
    		<?php else: ?>
        		<?php echo $this->item->author->name; ?>
    		<?php endif; ?>
     		<?php /* ?><span class="separator">/</span><?php */ ?>           
		</li>
  		<?php endif; ?>	
    	<?php if($this->item->params->get('itemCategory')): ?>
  		<li> 
			<span><?php echo JText::_('TMPL_MB2_K2_WRITTEN_IN'); ?></span>
         	<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
        	<?php /* ?><span class="separator">/</span><?php */ ?>                
		</li>
 		<?php endif; ?>	
		<?php if($this->item->params->get('itemFontResizer')): ?>
		<li>
			<span class="itemTextResizerTitle"><?php echo JText::_('K2_FONT_SIZE'); ?></span>
			<a href="#" id="fontDecrease"><i class="fa fa-minus-circle"></i></a>
			<a href="#" id="fontIncrease"><i class="fa fa-plus-circle"></i></a>
          	<?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>
		<?php if(($this->item->params->get('itemPrintButton') || $this->item->params->get('itemEmailButton')) && !JRequest::getInt('print')): ?>
		<li>
			<?php if ($this->item->params->get('itemPrintButton') && !JRequest::getInt('print')) : ?>
                <a class="itemPrintLink" rel="nofollow" href="<?php echo $this->item->printLink; ?>" onclick="window.open(this.href,'printWindow','width=900,height=600,location=no,menubar=no,resizable=yes,scrollbars=yes'); return false;">
                    <i class="fa fa-print"></i>
                </a>
            <?php endif; ?>
            <?php if($this->item->params->get('itemEmailButton') && !JRequest::getInt('print')) : ?>
                <a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
                    <i class="fa fa-envelope"></i>
                </a>
            <?php endif; ?>
			<?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>		
		<?php if($this->item->params->get('itemVideoAnchor') && !empty($this->item->video)): ?>
		<li>
			<a class="itemVideoLink k2Anchor" href="<?php echo $this->item->link; ?>#itemVideoAnchor"><?php echo JText::_('K2_MEDIA'); ?></a>
    		<?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>
		<?php if($this->item->params->get('itemImageGalleryAnchor') && !empty($this->item->gallery)): ?>
		<li>
			<a class="itemImageGalleryLink k2Anchor" href="<?php echo $this->item->link; ?>#itemImageGalleryAnchor"><?php echo JText::_('K2_IMAGE_GALLERY'); ?></a>
   			<?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>
		<?php if($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
		<li>
			<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
				<?php echo $this->item->event->K2CommentsCounter; ?>
			<?php else: ?>
				<?php if($this->item->numOfComments > 0): ?>
				<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
					<span><?php echo $this->item->numOfComments; ?></span> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
				</a>
				<?php else: ?>
				<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
					<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
				</a>
				<?php endif; ?>
			<?php endif; ?>
            <?php /* ?><span class="separator">/</span><?php */ ?>
		</li>
		<?php endif; ?>
	</ul>
</div>
<?php endif; ?>