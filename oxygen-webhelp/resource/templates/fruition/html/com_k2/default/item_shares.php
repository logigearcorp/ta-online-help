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


if($this->item->params->get('itemTwitterButton',1) || $this->item->params->get('itemFacebookButton',1) || $this->item->params->get('itemGooglePlusOneButton',1) || $this->item->params->get('itemSocialButton')): ?>
<div class="article-shares clearfix">

	<?php if($this->item->params->get('itemTwitterButton',1)): ?>
	<div class="itemTwitterButton">
		<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>>
			<?php echo JText::_('K2_TWEET'); ?>
		</a>
		<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemFacebookButton',1)): ?>
	<div class="itemFacebookButton">
		<div id="fb-root"></div>
		<script type="text/javascript">
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-like" data-send="false" data-width="200" data-show-faces="true"></div>
	</div>
	<?php endif; ?>

	<?php if($this->item->params->get('itemGooglePlusOneButton',1)): ?>
	<div class="itemGooglePlusOneButton" style="margin-left: 10px;margin-top: -2px;">
		<g:plusone annotation="inline" width="120"></g:plusone>
		<script type="text/javascript">
			(function() {
			  	window.___gcfg = {lang: 'en'}; // Define button default language here
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			 })();
		</script>
	</div>
	<?php endif; ?>


	<!-- facebook share -->
	<?php  
	$encodedUri = rawurlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		
	if($this->item->params->get('itemTwitterButton',1))
	echo "
	<div class='fastsocialshare-share-fbsh' style='margin-left: -70px;margin-top: -2px;'>
    		<a style='text-decoration:none; border-radius: 2px; padding:4px 5px; font-size:11px; font-weight: 600; background-color:#3B5998; color:#FFFFFF !important;' onclick='window.open(\"http://www.facebook.com/sharer/sharer.php?u=$encodedUri\",\"fbshare\",\"width=480,height=100\")' href='javascript:void(0)'><span style='text-decoration:none; font-weight:bold; font-size:14px;margin-right:4px;'>f</span>Share</a>
	</div>";
	?>


   <!-- social network share -->
   <?php if(! $this->item->params->get('itemTwitterButton',1)): ?>
			   	  <?php if($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))): ?>
				<div>
					<?php 			
						echo $this->item->params->get('socialButtonCode'); 
					?>
				</div>
				<?php endif; ?>
			</div>

	<!-- Turn off linked-in -->
   		<?php return ;?>;
   <?php endif; ?>
  
   
   	<div class="fastsocialshare-share-lin" style="margin-left: -10px;margin-top: 0px;">
   			<script type="text/javascript">
				var loadAsyncDeferredLinkedin =  function() {
					var po = document.createElement('script');
					po.type = 'text/javascript';
					po.async = true;
					po.src = 'https://platform.linkedin.com/in.js';
					po.innerHTML = '$language';
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(po, s);
				};

				 if (window.addEventListener)
				  window.addEventListener("load", loadAsyncDeferredLinkedin, false);
				else if (window.attachEvent)
				  window.attachEvent("onload", loadAsyncDeferredLinkedin);
				else
				  window.onload = loadAsyncDeferredLinkedin;
			</script>
			<script type="in/share"></script>
	</div>

    <?php if($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))): ?>
	<div>
		<?php 			
			echo $this->item->params->get('socialButtonCode'); 
		?>
	</div>
	<?php endif; ?>
</div>

<?php endif; ?>
