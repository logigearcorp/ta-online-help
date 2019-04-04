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
<div class="mb2shortcodes-item mb2shortcodes-item-acc">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
		
		$("#mb2shortcodes-acc-submit").click(function(){
            
			
			var accTitle1 = $("#mb2shortcodes-acc-form").serializeArray()[0].value;	            
			var accIcon1 = $("#mb2shortcodes-acc-form").serializeArray()[1].value !='' ? 
			'|'+$("#mb2shortcodes-acc-form").serializeArray()[1].value : '';
			var accContent1 = $("#mb2shortcodes-acc-form").serializeArray()[2].value;
			
			var accTitle2 = $("#mb2shortcodes-acc-form").serializeArray()[3].value;
			var accIcon2 = $("#mb2shortcodes-acc-form").serializeArray()[4].value !='' ? 
			'|'+$("#mb2shortcodes-acc-form").serializeArray()[4].value : '';
			var accContent2 = $("#mb2shortcodes-acc-form").serializeArray()[5].value;						
			var toggle2= '';
			
			if (accTitle2 !='' && accContent2 !='')
			{
				var toggle2 = '[toggle title="'+accTitle2+accIcon2+'" open="0"]'+accContent2+'[/toggle]'+br;	
			}
			
			
			$("#mb2shortcodes-result").html('[accordion]'+br+'[toggle title="'+accTitle1+accIcon1+'" open="1"]'+accContent1+'[/toggle]'+br+toggle2+'[/accordion]');	
				
			
		});
        
    });
    </script> 
    <h3>Typed Element</h3>   
    <form id="mb2shortcodes-acc-form" class="mb2shortcodes-form form-horizontal" action="index.html">
    	<div class="mb2shortcodes-group-item">
            <div class="control-group">
                <div class="control-label"><label for="acc_title1">Title</label></div>
                <div class="controls"><input type="text" name="acc_title1" id="acc_title1" value="" /></div>
            </div> 
            <div class="control-group">
                <div class="control-label"><label for="acc_icon1">Icon Name</label></div>
                <div class="controls"><input type="text" name="acc_icon1" id="acc_icon1" value="" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="acc_content1">Content</label></div>
                <div class="controls"><textarea name="acc_content1" id="acc_content1"></textarea></div>
            </div> 
        </div> 
        
        <div class="mb2shortcodes-group-item">
            <div class="control-group">
                <div class="control-label"><label for="acc_title2">Title</label></div>
                <div class="controls"><input type="text" name="acc_title2" id="acc_title2" value="" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="acc_icon2">Icon Name</label></div>
                <div class="controls"><input type="text" name="acc_icon2" id="acc_icon2" value="" /></div>
            </div> 
            <div class="control-group">
                <div class="control-label"><label for="acc_content2">Content</label></div>
                <div class="controls"><textarea name="acc_content2" id="acc_content2"></textarea></div>
            </div> 
        </div>      
        
       	<input class="btn btn-primary" id="mb2shortcodes-acc-submit" type="button" value="Generate">        
    </form>
</div>