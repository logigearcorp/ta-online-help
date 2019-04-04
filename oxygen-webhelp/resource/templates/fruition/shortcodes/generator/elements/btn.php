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
<div class="mb2shortcodes-item mb2shortcodes-item-btn">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $('body').on('click','#mb2shortcodes-btn-submit',function(){
            
			
			var btnText = $("#mb2shortcodes-btn-form").serializeArray()[0].value;	
            var btnLink = $("#mb2shortcodes-btn-form").serializeArray()[1].value;
			
			var btnLinkTarget = $("#mb2shortcodes-btn-form").serializeArray()[2].value === '_blank' ? 
			' target="'+$("#mb2shortcodes-btn-form").serializeArray()[2].value+'"' : '';		
			
			var btnType = $("#mb2shortcodes-btn-form").serializeArray()[3].value !=='default' ? 
			' type="'+$("#mb2shortcodes-btn-form").serializeArray()[3].value+'"' : '';
			
			
			var btnSize = $("#mb2shortcodes-btn-form").serializeArray()[4].value !='' ? 
			' size="'+$("#mb2shortcodes-btn-form").serializeArray()[4].value+'"' : '';
			
			var btnSize = $("#mb2shortcodes-btn-form").serializeArray()[5].value ==1 ? 
			' rounded="'+$("#mb2shortcodes-btn-form").serializeArray()[5].value+'"' : '';
			
			var btnFwidth = $("#mb2shortcodes-btn-form").serializeArray()[6].value == 1 ? 
			' full_width="'+$("#mb2shortcodes-btn-form").serializeArray()[6].value+'"' : '';			
						
			var btnIcon = $("#mb2shortcodes-btn-form").serializeArray()[7].value !='' ? 
			' icon="'+$("#mb2shortcodes-btn-form").serializeArray()[7].value+'"' : '';	
			
			var iconSize = $("#mb2shortcodes-btn-form").serializeArray()[8].value !='' ? 
			' icon_size="'+$("#mb2shortcodes-btn-form").serializeArray()[8].value+'"' : '';	
			
			var iconPos = $("#mb2shortcodes-btn-form").serializeArray()[9].value !='' ? 
			' icon_pos="'+$("#mb2shortcodes-btn-form").serializeArray()[9].value+'"' : '';		
			
			var btnTitle = $("#mb2shortcodes-btn-form").serializeArray()[10].value !='' ? 
			' title="'+$("#mb2shortcodes-btn-form").serializeArray()[10].value+'"' : '';			
			
			var btnTT = $("#mb2shortcodes-btn-form").serializeArray()[11].value ==1 ? 
			' tt="'+$("#mb2shortcodes-btn-form").serializeArray()[11].value+'"' : '';	
			
			var btnTtPos = $("#mb2shortcodes-btn-form").serializeArray()[12].value !='' ? 
			' ttpos="'+$("#mb2shortcodes-btn-form").serializeArray()[12].value+'"' : '';
			
			var btnCls = $("#mb2shortcodes-btn-form").serializeArray()[13].value !='' ? 
			' class="'+$("#mb2shortcodes-btn-form").serializeArray()[13].value+'"' : '';
			
			var btnUppercase = $("#mb2shortcodes-btn-form").serializeArray()[14].value == 0 ? 
			' uppercase="'+$("#mb2shortcodes-btn-form").serializeArray()[14].value+'"' : '';	
            
			
			
			
            $("#mb2shortcodes-result").html('[button link="'+ btnLink +'"'+btnType+btnFwidth+btnLinkTarget+btnSize+btnIcon+iconPos+iconSize+btnTT+btnTtPos+btnTitle+btnCls+btnUppercase+']'+btnText+'[/button]');		
                      
        });				
        
    });
    </script> 
    <h3>Button</h3>   
    <form id="mb2shortcodes-btn-form" class="mb2shortcodes-form form-horizontal" action="index.html">
    	<div class="control-group">
        	<div class="control-label"><label for="btn_text">Text</label></div>
        	<div class="controls"><input type="text" name="btn_text" id="btn_text" value="Button Text" /></div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="btn_link">Link</label></div>
            <div class="controls"><input type="text" name="btn_link" id="btn_link" value="#" /></div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="btn_open_link">Open Link</label></div>
        	<div class="controls">
            	<select name="btn_open_link" id="btn_open_link">
                	<option value="_self">In the same window</option>
            		<option value="_blank">In a new window</option>
            	</select>
            </div>
        </div>
    	<div class="control-group">
        	<div class="control-label"><label for="btn_type">Type</label></div>
        	<div class="controls">
            	<select name="btn_type" id="btn_type">
                	<optgroup label="Normal">
                        <option value="default">Default</option>
                        <option value="primary">Primary</option>
                        <option value="success">Succes</option>
                        <option value="warning">Warning</option>
                        <option value="danger">Danger</option>
                        <option value="inverse">Inverse</option>
                    </optgroup>
                    <optgroup label="White">
                        <option value="white">White</option>
                        <option value="default white">White Default</option>
                        <option value="primary white">White Primary</option>
                        <option value="success white">White Succes</option>
                        <option value="warning white">White Warning</option>
                        <option value="danger white">White Danger</option>
                        <option value="inverse white">White Inverse</option>
                    </optgroup>
            	</select>
            </div>
        </div>        
        <div class="control-group">
        	<div class="control-label"><label for="btn_size">Size</label></div>
        	<div class="controls">
            	<select name="btn_size" id="btn_size">
                	<option value="">Default</option>
            		<option value="xs">x-Small</option>
                    <option value="sm">Small</option>
                    <option value="lg">Large</option>
            	</select>
            </div>
        </div>
        
        <div class="control-group">
        	<div class="control-label"><label for="btn_rounded">Rounded</label></div>
            <div class="controls">
            	<select name="btn_rounded" id="btn_rounded">
               		<option value="0">No</option>
                   	<option value="1" selected>Yes</option>
                </select>
            </div>
        </div>
         <div class="control-group">
        	<div class="control-label"><label for="btn_fw">Full Width</label></div>
            <div class="controls">
            	<select name="btn_fw" id="btn_fw">
               		<option value="0">No</option>
                   	<option value="1">Yes</option>
                </select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="btn_icon">Icon</label></div>
            <div class="controls">
            	<input type="text" name="btn_icon" id="btn_icon" value="">          
            </div>
        </div>  
        <div class="control-group">
        	<div class="control-label"><label for="btn_icon_size">Icon Size (px)</label></div>
            <div class="controls">
            	<input type="text" name="btn_icon_size" id="btn_icon_size" value="">          
            </div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="btn_sicon_pos">Icon Position</label></div>
        	<div class="controls">
            	<select name="btn_sicon_pos" id="btn_sicon_pos">
                	<option value="before">Before button text</option>
            		<option value="after">After button text</option>
            	</select>
            </div>
        </div>         
        <div class="control-group">
         	<div class="control-label"><label for="btn_title">Tittle Attribute</label></div>
  			<div class="controls"><input type="text" name="btn_title" id="btn_title" value="" /></div>
        </div>         
        <div class="control-group">
        	<div class="control-label"><label for="btn_tt">Tooltip</label></div>
            <div class="controls">
            	<select name="btn_tt" id="btn_tt">
               		<option value="1">Yes</option>
                   	<option value="0" selected>No</option>
                </select>
            </div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="btn_ttpos">Tooltip Position</label></div>
        	<div class="controls">
            	<select name="btn_ttpos" id="btn_ttpos">
                	<option value="top">Top</option>
            		<option value="right">Right</option>
                    <option value="bottom">Bottom</option>
                    <option value="left">Left</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
         	<div class="control-label"><label for="btn_class">Custom Css Class</label></div>
  			<div class="controls"><input type="text" name="btn_class" id="btn_class" value="" /></div>
        </div>       
        <div class="control-group">
        	<div class="control-label"><label for="btn_uppercase">Upperacse Letters</label></div>
        	<div class="controls">
            	<select name="btn_uppercase" id="btn_uppercase">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div>        
       	<input class="btn btn-primary" id="mb2shortcodes-btn-submit" type="button" value="Generate">        
    </form>
</div>