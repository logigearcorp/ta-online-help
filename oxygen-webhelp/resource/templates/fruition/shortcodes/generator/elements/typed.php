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
<div class="mb2shortcodes-item mb2shortcodes-item-typed">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
		$("#mb2shortcodes-typed-submit").click(function(){
            
			
			var typedSentece = $("#mb2shortcodes-typed-form").serializeArray()[0].value;
			var typedLoop = $("#mb2shortcodes-typed-form").serializeArray()[1].value;
			var typedSpeed = $("#mb2shortcodes-typed-form").serializeArray()[2].value;	
			var typedSdelay = $("#mb2shortcodes-typed-form").serializeArray()[3].value; 
			var typedBspeed = $("#mb2shortcodes-typed-form").serializeArray()[4].value;
			var typedBdelay = $("#mb2shortcodes-typed-form").serializeArray()[5].value; 
			var typedCursor = $("#mb2shortcodes-typed-form").serializeArray()[6].value;
			var typedCursorChar = $("#mb2shortcodes-typed-form").serializeArray()[7].value; 
			var typedStyle = $("#mb2shortcodes-typed-form").serializeArray()[8].value;          
			
			
			
			$("#mb2shortcodes-result").html('[typed loop="'+typedLoop+'" tspeed="'+typedSpeed+'" sdelay="'+typedSdelay+'" bspeed="'+typedBspeed+'" bdelay="'+typedBdelay+'" cursor="'+typedCursor+'" cursor_char="'+typedCursorChar+'" style="'+typedStyle+'"]'+typedSentece+'[/typed]');	
				
			
		});
        
    });
    </script> 
    <h3>Accordion</h3>   
    <form id="mb2shortcodes-typed-form" class="mb2shortcodes-form form-horizontal" action="index.html">
    	<div class="mb2shortcodes-group-item">
            <div class="control-group">
                <div class="control-label"><label for="typed_senteces">Sentences</label><span class="mb2shortcodes-desc">Sentence1|Sentence2|...</span></div>
                <div class="controls"><textarea name="typed_senteces" id="typed_senteces"></textarea></div>
            </div> 
            <div class="control-group">
                <div class="control-label">
                    <label for="typed_loop">Loop</label>
                </div>
                <div class="controls">
                    <select name="typed_loop" id="typed_loop">
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_speed">Type Speed</label></div>
                <div class="controls"><input type="text" name="typed_speed" id="typed_speed" value="10" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_sdelay">Type Speed Delay</label></div>
                <div class="controls"><input type="text" name="typed_sdelay" id="typed_sdelay" value="300" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_bspeed">Back Speed</label></div>
                <div class="controls"><input type="text" name="typed_bspeed" id="typed_bspeed" value="0" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_bdelay">Back Speed Delay</label></div>
                <div class="controls"><input type="text" name="typed_bdelay" id="typed_bdelay" value="2000" /></div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="typed_cursor">Cursor</label>
                </div>
                <div class="controls">
                    <select name="typed_cursor" id="typed_cursor">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_cursor_char">Cursor Type</label></div>
                <div class="controls"><input type="text" name="typed_cursor_char" id="typed_cursor_char" value="|" /></div>
            </div>
            <div class="control-group">
                <div class="control-label"><label for="typed_style">Css Style</label></div>
                <div class="controls"><textarea name="typed_style" id="typed_style"></textarea></div>
            </div>             
        </div>      
        
       	<input class="btn btn-primary" id="mb2shortcodes-typed-submit" type="button" value="Generate">        
    </form>
</div>