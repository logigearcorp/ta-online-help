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
<div class="mb2shortcodes-item mb2shortcodes-item-col">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
			
        $("#mb2shortcodes-col-submit").click(function(){
            
			var layout = $("#mb2shortcodes-col-form").serializeArray()[0].value; 
			
			if (layout === '1/2')
			{
				var columns = br+'[column size="1/2"]First column text[/column]'+br+'[column size="1/2"]Second column text[/column]'+br;		
			}
			else if (layout === '1/3')
			{
				var columns = br+'[column size="1/3"]First column text[/column]'+br+'[column size="1/3"]Second column text[/column]'+br+'[column size="1/3"]Third column text[/column]'+br;		
			}
			else if (layout === '1/4')
			{
				var columns = br+'[column size="1/4"]First column text[/column]'+br+'[column size="1/4"]Second column text[/column]'+br+'[column size="1/4"]Third column text[/column]'+br+'[column size="1/4"]Fourth column text[/column]'+br;		
			}
			else if (layout === '1/5')
			{
				var columns = br+'[column size="1/5"]First column text[/column]'+br+'[column size="1/5"]Second column text[/column]'+br+'[column size="1/5"]Third column text[/column]'+br+'[column size="1/5"]Fourth column text[/column]'+br+'[column size="1/5"]Fifth column text[/column]'+br;		
			}
			if (layout === 'e-1/2')
			{
				var columns = br+'[column size="1/2" empty="1"][/column]'+br+'[column size="1/2"]Second column text[/column]'+br;		
			}
			if (layout === '1/2-e')
			{
				var columns = br+'[column size="1/2"]First column text[/column]'+br+'[column size="1/2" empty="1"][/column]'+br;		
			}
			
			
			$("#mb2shortcodes-result").html('[columns_container]'+columns+'[/columns_container]');
			        
        });	
		
        
    });
    </script>
    <h3>Columns</h3> 
    <form id="mb2shortcodes-col-form" class="mb2shortcodes-form form-horizontal" action="index.html"> 
        <div class="control-group">
        	<div class="control-label"><label for="col_layout">Columns</label></div>
        	<div class="controls">
            	<select name="col_layout" id="col_layout">
                	<option value="1/2">50/50</option>
                    <option value="1/3">33/33/33</option>
                    <option value="1/4">25/25/25/25</option>
                    <option value="1/5">20/20/20/20/20</option>
                    <option value="e-1/2">Empty/50</option>
                    <option value="1/2-e">50/Empty</option>
            	</select>
            </div>
        </div>   
        <input class="btn btn-primary" id="mb2shortcodes-col-submit" type="button" value="Generate">      
    </form>
</div>