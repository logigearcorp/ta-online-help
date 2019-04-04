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
<div class="mb2shortcodes-item mb2shortcodes-item-video">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-video-submit").click(function(){
             
			var videoId = ' id="'+$("#mb2shortcodes-video-form").serializeArray()[0].value+'"';        
			var videoW = ' width="'+$("#mb2shortcodes-video-form").serializeArray()[1].value+'"';			
			var videoRatio = ' ratio="'+$("#mb2shortcodes-video-form").serializeArray()[2].value+'"';			
            
			$("#mb2shortcodes-result").html('[video'+videoId+videoW+videoRatio+']');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Video</h3> 
    <form id="mb2shortcodes-video-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="video_id">Id (Youtube or Vimeo)</label></div>
          	<div class="controls"><input type="text" name="video_id" id="video_id" value="" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="video_w">Optional Width (px)</label></div>
          	<div class="controls"><input type="text" name="video_w" id="video_w" value="" /></div>
        </div>
        
        <div class="control-group">
        	<div class="control-label"><label for="video_ratio">Ratio</label></div>
        	<div class="controls">
            	<select name="video_ratio" id="video_ratio">
                	<option value="16:9">16:9</option>
            		<option value="4:3">4:3</option>
            	</select>
            </div>
        </div>  
        <input class="btn btn-primary" id="mb2shortcodes-video-submit" type="button" value="Generate">      
    </form>
</div>