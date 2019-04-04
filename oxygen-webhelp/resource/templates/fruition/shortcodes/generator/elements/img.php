<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;
 
?>
<div class="mb2shortcodes-item mb2shortcodes-item-img">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-img-submit").click(function(){
                    
            var imgUrl = $("#mb2shortcodes-img-form").serializeArray()[0].value;
			var imgLink = ' link="'+$("#mb2shortcodes-img-form").serializeArray()[1].value+'"';
			var imgW = ' width="'+$("#mb2shortcodes-img-form").serializeArray()[2].value+'"';
			var imgH = ' height="'+$("#mb2shortcodes-img-form").serializeArray()[3].value+'"';
			var imgCrop = ' crop="'+$("#mb2shortcodes-img-form").serializeArray()[4].value+'"';
			var imgAlt = ' alt="'+$("#mb2shortcodes-img-form").serializeArray()[5].value+'"';
			var imgAlign = ' align="'+$("#mb2shortcodes-img-form").serializeArray()[6].value+'"';
			var imgLightbox = ' lightbox="'+$("#mb2shortcodes-img-form").serializeArray()[7].value+'"';
			var imgVideoId = ' video_id="'+$("#mb2shortcodes-img-form").serializeArray()[8].value+'"';	
				
            
			$("#mb2shortcodes-result").html('[image url="'+imgUrl+'"'+imgLink+imgW+imgH+imgCrop+imgAlt+imgAlign+imgLightbox+imgVideoId+']');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Image</h3> 
    <form id="mb2shortcodes-img-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="img_url">Url</label></div>
          	<div class="controls"><input type="text" name="img_url" id="img_url" value="" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="img_link">Link</label></div>
          	<div class="controls"><input type="text" name="img_link" id="img_link" value="" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="img_w">Optional Width (px)</label></div>
          	<div class="controls"><input type="text" name="img_w" id="img_w" value="" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="img_h">Optional Height (px)</label></div>
          	<div class="controls"><input type="text" name="img_h" id="img_h" value="" /></div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="img_crop">Crop</label></div>
        	<div class="controls">
            	<select name="img_crop" id="img_crop">
                	<option value="1">Yes</option>
            		<option value="0" selected>No</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="alt_text">Alternative Text</label></div>
          	<div class="controls"><input type="text" name="alt_text" id="alt_text" value="" /></div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="img_align">Align</label></div>
        	<div class="controls">
            	<select name="img_align" id="img_align">
                	<option value="right">Right</option>
            		<option value="left">Left</option>
                    <option value="center">Center</option>
            	</select>
            </div>
        </div>  
       	<div class="control-group">
        	<div class="control-label"><label for="img_lightbox">Lightbox</label></div>
        	<div class="controls">
            	<select name="img_lightbox" id="img_lightbox">
                	<option value="1">Yes</option>
            		<option value="0" selected>No</option>
            	</select>
            </div>
        </div>
       	<div class="control-group">
         	<div class="control-label"><label for="img_video_id">Video Id (Youtube or Vimeo)</label></div>
         	<div class="controls"><input type="text" name="img_video_id" id="img_video_id" value="" /></div>
       	</div>   
        <input class="btn btn-primary" id="mb2shortcodes-img-submit" type="button" value="Generate">      
    </form>
</div>