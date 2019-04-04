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
<div class="mb2shortcodes-item mb2shortcodes-item-tabs">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
	
		$("#mb2shortcodes-tabs-submit").click(function(){
            
			
			var tabsDir = $("#mb2shortcodes-tabs-form").serializeArray()[0].value;
			var tabsHeight = $("#mb2shortcodes-tabs-form").serializeArray()[1].value;
			
			var tabsTitle1 = $("#mb2shortcodes-tabs-form").serializeArray()[2].value;	            
			var tabsIcon1 = $("#mb2shortcodes-tabs-form").serializeArray()[3].value !='' ? 
			'|'+$("#mb2shortcodes-tabs-form").serializeArray()[3].value : '';
			var tabsContent1 = $("#mb2shortcodes-tabs-form").serializeArray()[4].value;
			var tab1 = '[tab title="'+tabsTitle1+tabsIcon1+'"]'+tabsContent1+'[/tab]'+br;
			
			
			var tabsTitle2 = $("#mb2shortcodes-tabs-form").serializeArray()[5].value;
			var tabsIcon2 = $("#mb2shortcodes-tabs-form").serializeArray()[6].value !='' ? 
			'|'+$("#mb2shortcodes-tabs-form").serializeArray()[6].value : '';
			var tabsContent2 = $("#mb2shortcodes-tabs-form").serializeArray()[7].value;						
			var tab2 = '[tab title="'+tabsTitle2+tabsIcon2+'"]'+tabsContent2+'[/tab]'+br;
			
			
			$("#mb2shortcodes-result").html('[tabs direction="'+tabsDir+'" height="'+tabsHeight+'"]'+br+tab1+tab2+'[/tabs]');	
				
			
		});
        
    });
    </script> 
    <h3>Tab</h3>   
    <form id="mb2shortcodes-tabs-form" class="mb2shortcodes-form form-horizontal" action="index.html">
    	<div class="control-group">
        	<div class="control-label"><label for="tabs_pos">Tabs Position</label></div>
        	<div class="controls">
            	<select name="tabs_pos" id="tabs_pos">
                	<option value="top">Top</option>
            		<option value="left">Left</option>
                    <option value="right">Right</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
       		<div class="control-label"><label for="tabs_height">Optional Height (px)</label></div>
        	<div class="controls"><input type="text" name="tabs_height" id="tabs_height" value="" /></div>
        </div>       
        <div class="mb2shortcodes-group-item">
            <div class="control-group">
                <div class="control-label"><label for="tabs_title1">Title</label></div>
                <div class="controls"><input type="text" name="tabs_title1" id="tabs_title1" value="" /></div>
            </div> 
            <div class="control-group">
                <div class="control-label"><label for="tabs_icon1">Icon Name</label></div>
                <div class="controls"><input type="text" name="tabs_icon1" id="tabs_icon1" value="" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="tabs_content1">Content</label></div>
                <div class="controls"><textarea name="tabs_content1" id="tabs_content1"></textarea></div>
            </div> 
        </div> 
        
        <div class="mb2shortcodes-group-item">
            <div class="control-group">
                <div class="control-label"><label for="tabs_title2">Title</label></div>
                <div class="controls"><input type="text" name="tabs_title2" id="tabs_title2" value="" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="tabs_icon2">Icon Name</label></div>
                <div class="controls"><input type="text" name="tabs_icon2" id="tabs_icon2" value="" /></div>
            </div> 
            <div class="control-group">
                <div class="control-label"><label for="tabs_content2">Content</label></div>
                <div class="controls"><textarea name="tabs_content2" id="tabs_content2"></textarea></div>
            </div> 
        </div>      
        
       	<input class="btn btn-primary" id="mb2shortcodes-tabs-submit" type="button" value="Generate">        
    </form>
</div>