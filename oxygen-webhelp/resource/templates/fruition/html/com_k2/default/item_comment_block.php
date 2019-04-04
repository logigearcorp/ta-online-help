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

if($this->item->params->get('itemComments') && (($this->item->params->get('comments') == '2' && !$this->user->guest) ||	($this->item->params->get('comments') == '1'))): ?>
	<?php echo $this->item->event->K2CommentsBlock; //K2 Plugins: K2CommentsBlock ?>
<?php endif; ?>

<?php if($this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)): ?>

<a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>
<div class="itemComments">
	<?php if($this->item->params->get('commentsFormPosition')=='above'): ?>
	  	<?php echo $this->loadTemplate('comments_form'); ?>
	<?php endif; ?>

	<?php if($this->item->numOfComments>0 && $this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2'))): ?>
	<div class="itemCommentsBlocklList">
    <h3 class="itemCommentsCounter">
	  	<span><?php echo $this->item->numOfComments; ?></span> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
	</h3>
	<ul class="itemCommentsList">	
		<?php foreach ($this->item->comments as $key=>$comment): ?>
	    	<li class="<?php echo ($key%2) ? "odd" : "even"; echo (!$this->item->created_by_alias && $comment->userID==$this->item->created_by) ? " authorResponse" : ""; echo($comment->published) ? '':' unpublishedComment'; ?> clearfix">

	    		<?php if($comment->userImage): ?>
                    <div class="comment-user-img">
                        <img src="<?php echo $comment->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" width="<?php echo $this->item->params->get('commenterImgWidth'); ?>" />
                    </div>
				<?php endif; ?>				

		    	<div class="comment-details">          
               

                    <div class="comment-text"><?php echo $comment->commentText; ?></div>
                    
                    
                    <div class="comment-meta clearfix">
                        
                        <span class="commentAuthorName">
                            <?php echo JText::_('K2_POSTED_BY'); ?>
                            <?php if(!empty($comment->userLink)): ?>
                                <a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow">
                                    <?php echo $comment->userName; ?>
                                </a>
                            <?php else: ?>
                                <?php echo $comment->userName; ?>
                            <?php endif; ?>
                            <?php /* ?><span class="separator">/</span><?php */ ?>
                        </span>
                        
                        
                        
                        <span class="commentDate">
                            <?php echo JHTML::_('date', $comment->commentDate, JText::_('DATE_FORMAT_LC3')); ?>
                        </span>
                    
                        
                        
                        <span class="commentLink">
                            <a href="<?php echo $this->item->link; ?>#comment<?php echo $comment->id; ?>" name="comment<?php echo $comment->id; ?>" id="comment<?php echo $comment->id; ?>">
                                <?php echo JText::_('K2_COMMENT_LINK'); ?>
                            </a>
                        </span>
                        
                        
                        
                        <?php if($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest)))): ?>
                    <span class="commentToolbar">
                        <?php if($this->inlineCommentsModeration): ?>
                        <?php if(!$comment->published): ?>
                        <a class="commentApproveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
                        <?php endif; ?>
    
                        <a class="commentRemoveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
                        <?php endif; ?>
    
                        <?php if($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest))): ?>
                        <a class="modal" rel="{handler:'iframe',size:{x:560,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID='.$comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
                        <?php endif; ?>
    
                        <?php if($comment->reportUserLink): ?>
                        <a class="k2ReportUserButton" href="<?php echo $comment->reportUserLink; ?>"><?php echo JText::_('K2_FLAG_AS_SPAMMER'); ?></a>
                        <?php endif; ?>
    
                    </span>
                    <?php endif; ?>
                        
                        
                    
                    </div>            
                </div>
                

				
	    	</li>
	    <?php endforeach; ?>
	</ul>
    

	
    
    </div>
    
    <?php endif; ?>
    
    
    <div class="itemCommentsPagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
    
    
    

	<?php if($this->item->params->get('commentsFormPosition')=='below'): ?>	  
		<?php echo $this->loadTemplate('comments_form'); ?>
	<?php endif; ?>

	<?php $user = JFactory::getUser(); if ($this->item->params->get('comments') == '2' && $user->guest): ?>
	  	<div><?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS'); ?></div>
	<?php endif; ?>

</div>
<?php endif; ?>