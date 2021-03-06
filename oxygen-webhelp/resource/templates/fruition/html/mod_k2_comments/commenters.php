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
<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2TopCommentersBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<?php if(count($commenters)): ?>
	<ul>
		<?php foreach ($commenters as $key=>$commenter): ?>
		<li class="<?php echo ($key%2) ? "odd" : "even"; if(count($commenters)==$key+1) echo ' lastItem'; ?>">
        	<div class="item-inner clearfix"> 
            
            	<div class="comment-author clearfix">
					<?php if($commenter->userImage): ?>
                    <a class="k2Avatar tcAvatar" rel="author" href="<?php echo $commenter->link; ?>">
                        <img src="<?php echo $commenter->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($commenter->userName); ?>" style="width:<?php echo $tcAvatarWidth; ?>px;height:auto;" />
                    </a>
                    <?php endif; ?>
        
                    <?php if($params->get('commenterLink')): ?>
                    <a class="tcLink" rel="author" href="<?php echo $commenter->link; ?>">
                    <?php endif; ?>           
    			
                    <span class="tcUsername"><?php echo $commenter->userName; ?></span>
        
                    <?php if($params->get('commenterCommentsCounter')): ?>
                    <span class="tcCommentsCounter">(<?php echo $commenter->counter; ?>)</span>
                    <?php endif; ?>
        
                    <?php if($params->get('commenterLink')): ?>
                    </a>
                    <?php endif; ?>            
                </div>
    
                <?php if($params->get('commenterLatestComment')): ?>
                <div class="comment-text clearfix">             
                    <a class="tcLatestComment" href="<?php echo $commenter->latestCommentLink; ?>">
                        <?php echo $commenter->latestCommentText; ?>
                    </a>
                    <span class="tcLatestCommentDate"><?php echo JText::_('K2_POSTED_ON'); ?> <?php echo JHTML::_('date', $commenter->latestCommentDate, JText::_('DATE_FORMAT_LC3')); ?></span>
                </div>
                <?php endif; ?>            
            </div>
        </li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>
