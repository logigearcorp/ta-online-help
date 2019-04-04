<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;

// Define core Joomla varibles
$app = JFactory::getApplication();


// ============================= TEMPLATE FRAMEWORK INIT ============================= //		
		
		
// Load template framework
if (!class_exists('Mb2TemplateFramework'))
{	
	require( MB2_THEME_FRAMEWORK . '/framework.php');
}
		
// Get core framework method
Mb2TmplFramework::getTmplHead($this->params);		
		
		
// =================================================================================== //

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
    <head>   
    	<?php				
		
		// Get template params
		$custom_favicon = $this->params->get('custom_favicon', ''); 
		$retina_favicon = $this->params->get('retina_favicon', ''); 
		$ipad_favicon = $this->params->get('ipad_favicon', ''); 
		$iphone_favicon = $this->params->get('iphone_favicon', '');				
		$google_analytics_id = $this->params->get('google_analytics_id', '');	
		
		?>
     
    	<jdoc:include type="head" />
        
    	<meta name="viewport" content="width=device-width; initial-scale=1.0"> 
    	<link rel="stylesheet" type="text/css" media="all" href="/templates/fruition/css/ta_custom.css">
    	<?php if ($custom_favicon !='') { ?>
    		<link rel="icon" type="image" href="<?php echo JURI::base(true); ?>/<?php echo $custom_favicon; ?>" />
    	<?php } 
		
		if($retina_favicon !=''){?>			
			<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo JURI::base(true); ?>/<?php echo $retina_favicon; ?>">
		<?php 
		}
		
		if($ipad_favicon !=''){ ?>			
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo JURI::base(true); ?>/<?php echo $ipad_favicon; ?>">
        <?php	
		}
		
		if($iphone_favicon !=''){ ?>
			<link rel="apple-touch-icon-precomposed" href="<?php echo JURI::base(true); ?>/<?php echo $iphone_favicon; ?>">
            
           <?php
		}
		
		if($google_analytics_id !=''){ ?>        
		<script type="text/javascript">    
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $google_analytics_id; ?>']);
		  _gaq.push(['_trackPageview']);		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();    
    	</script>        
        <?php } ?>        
    </head>