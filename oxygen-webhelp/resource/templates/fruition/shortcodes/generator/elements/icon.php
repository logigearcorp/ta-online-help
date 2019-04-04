<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;

// Get fe template name using shortcode helper class
if (!class_exists('PlgSystemMb2shortcodesHelper'))
{
	require_once (JPATH_ROOT . DS . 'plugins' . DS . 'system' . DS . 'mb2shortcodes' . DS . 'helper.php');	
}
$feTmlName = PlgSystemMb2shortcodesHelper::getFeTemplateName();	


// Get template helper class 
if (!class_exists('Mb2TmplHelper'))
{	
	require(JPATH_SITE . DS . 'templates' .DS . $feTmlName . DS . 'framework' . DS . 'libs' . DS . 'helper.php');		
}

// Get icons array
$assetsPath = JPATH_SITE . DS . 'templates' . DS . $feTmlName . DS . 'assets';
$faPath = $assetsPath . DS . 'font-awesome' . DS . 'css' . DS . 'font-awesome.css';
$linePath = $assetsPath . DS . 'lineicon' . DS . 'css' . DS . 'lineicon.css';
$glyphPath = $assetsPath . DS . 'bootstrap' . DS . 'css' . DS . 'bootstrap.css';
$stroke7Path = $assetsPath . DS . 'pe-icon-7-stroke' . DS . 'css' . DS . 'pe-icon-7-stroke.css';

$faArray = Mb2TmplHelper::getIconFontArray($faPath,'fa-');
$lineArray = Mb2TmplHelper::getIconFontArray($linePath,'lineicon-');
$glyphArray = Mb2TmplHelper::getIconFontArray($glyphPath,'glyphicon-');
$stroke7hArray = Mb2TmplHelper::getIconFontArray($stroke7Path,'pe-7s-');
 

?>
<div class="mb2shortcodes-item mb2shortcodes-item-icon">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
		
		// Set icon value
		$('.mb2shortcodes-ilist').click(function(e){			
			e.preventDefault();			
			var iname = $(this).data('name');			
			$('#icon_name').val(iname);			
		});		
		
		
        $("#mb2shortcodes-icon-submit").click(function(){
                    
            var iconName = ' name="'+$("#mb2shortcodes-icon-form").serializeArray()[0].value+'"';
			var iconSize = ' size="'+$("#mb2shortcodes-icon-form").serializeArray()[1].value+'"';
			var iconColor = $("#mb2shortcodes-icon-form").serializeArray()[2].value !='' ?
			' color="'+$("#mb2shortcodes-icon-form").serializeArray()[2].value+'"' : '';
			var iconSpin = $("#mb2shortcodes-icon-form").serializeArray()[3].value == 1 ?
			' spin="'+$("#mb2shortcodes-icon-form").serializeArray()[3].value+'"' : '';
			var iconRotate = $("#mb2shortcodes-icon-form").serializeArray()[4].value !=0 ?
			' rotate="'+$("#mb2shortcodes-icon-form").serializeArray()[4].value+'"' : '';		
				
				
						
            
			$("#mb2shortcodes-result").html('[icon'+iconName+iconSize+iconColor+iconSpin+iconRotate+']');		
                      
        });
		
		
		
		
		$('#icon_color').spectrum({
			showInput: true,
			preferredFormat: 'hex',
			allowEmpty: true,
			color: ''
		});
		
		
		$('#icon_bg_color').spectrum({
			showInput: true,
			preferredFormat: 'hex',
			allowEmpty: true,
			color: ''
		});
		
		$('#icon_border_color').spectrum({
			showInput: true,
			preferredFormat: 'hex',
			allowEmpty: true,
			color: ''
		});		
		
        
    });
    </script>   
    <ul class="nav nav-tabs">
    	<li class="active"><a data-toggle="tab" href="#glyphicon">Glyphicons</a></li> 
      	<li><a data-toggle="tab" href="#fa">Font Awesome</a></li>       
      	<li><a data-toggle="tab" href="#lineicons">Lineicons</a></li>
        <li><a data-toggle="tab" href="#stroke7icons">Stroke 7</a></li>        
    </ul>
 	<div class="tab-content mb2shortcodes-icon-tab">
      	<div id="glyphicon" class="tab-pane fade in active">
        <?php foreach ($glyphArray as $k3=>$v3) : ?>
        	<a class="mb2shortcodes-ilist mb2shortcodes-ilist-glyphicon" href="#" data-name="<?php echo $k3; ?>" title="<?php echo $k3; ?>"><i class="glyphicon <?php echo $k3; ?>"></i></a>
        <?php endforeach; ?>
      	</div> 
        <div id="fa" class="tab-pane fade">       
        <?php foreach ($faArray as $k=>$v) : ?>
        	<a class="mb2shortcodes-ilist mb2shortcodes-ilist-fa" href="#" data-name="<?php echo $k; ?>" title="<?php echo $k; ?>"><i class="fa <?php echo $k; ?>"></i></a>
        <?php endforeach; ?>
      	</div>
     	<div id="lineicons" class="tab-pane fade">
        <?php foreach ($lineArray as $k2=>$v2) : ?>
        	<a class="mb2shortcodes-ilist mb2shortcodes-ilist-lineicon" href="#" data-name="<?php echo $k2; ?>" title="<?php echo $k2; ?>"><i class="<?php echo $k2; ?>"></i></a>
        <?php endforeach; ?>
     	 </div>
         <div id="stroke7icons" class="tab-pane fade">
        <?php foreach ($stroke7hArray as $k2=>$v2) : ?>
        	<a class="mb2shortcodes-ilist mb2shortcodes-ilist-stroke7" href="#" data-name="<?php echo $k2; ?>" title="<?php echo $k2; ?>"><i class="<?php echo $k2; ?>"></i></a>
        <?php endforeach; ?>
     	 </div>      	   
    </div>
    <div style="clear:both;float: none;margin-bottom:50px;"></div>
     
  
    
    <form id="mb2shortcodes-icon-form" class="mb2shortcodes-form form-horizontal" action="index.html">
        <input type="hidden" name="icon_name" id="icon_name" value="" />
        <div class="control-group">
        	<div class="control-label"><label for="icon_size">Icon Size</label></div>
        	<div class="controls">
            	<select name="icon_size" id="icon_size">
                	<option value="default">Default</option>
                    <option value="xs">Extra Small</option>
                    <option value="sm">Small</option>
                    <option value="lg">Large</option>
                    <option value="xlg">Extra Large</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
            <div class="control-label"><label for="icon_color">Color</label></div>
          	<div class="controls"><input type="text" name="icon_color" id="icon_color" class="mb2shortcodes-color" /></div>
        </div>
        <div class="control-group">
        	<div class="control-label">
            	<label for="icon_spin">Spin</label>
                <span class="mb2shortcodes-desc">Only Font Awesome and Stroke 7</span>
            </div>
        	<div class="controls">
            	<select name="icon_spin" id="icon_spin">
                	<option value="1">Yes</option>
            		<option value="0" selected>No</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label">
            	<label for="icon_rotate">Rotate</label>
                <span class="mb2shortcodes-desc">Only Font Awesome and Stroke 7</span>
             </div>
        	<div class="controls">
            	<select name="icon_rotate" id="icon_rotate">
                	<option value="0">No</option>
                    <option value="rotate-90">90&#186;</option>
                    <option value="rotate-180">180&#186;</option>
            		<option value="rotate-270">270&#186;</option>
                    <option value="flip-horizontal">Flip horizontal</option>
                    <option value="flip-vertical">Flip vertical</option>
            	</select>
            </div>
        </div>        
        <input class="btn btn-primary" id="mb2shortcodes-icon-submit" type="button" value="Generate">      
    </form>
</div>