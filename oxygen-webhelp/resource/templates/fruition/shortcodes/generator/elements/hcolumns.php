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
<div class="mb2shortcodes-item mb2shortcodes-item-hcol">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        $("#mb2shortcodes-hcol-submit").click(function(){
            		
			
			var columns = br+'[hcolumn min_height="400" padding="90px 50px" bg_color="" bg_img="" class="dark"]First column text[/hcolumn]'+br+'[hcolumn min_height="400" padding="90px 50px" bg_color="" bg_img=""]Second column text[/hcolumn]'+br;		
			
			
			$("#mb2shortcodes-result").html('[hcolumns_container]'+columns+'[/hcolumns_container]');
			        
        });	
		
        
    });
    </script>
    <h3>Half Columns</h3> 
    <form id="mb2shortcodes-hcol-form" class="mb2shortcodes-form form-horizontal" action="index.html">           
        <input class="btn btn-primary" id="mb2shortcodes-hcol-submit" type="button" value="Generate">      
    </form>
</div>