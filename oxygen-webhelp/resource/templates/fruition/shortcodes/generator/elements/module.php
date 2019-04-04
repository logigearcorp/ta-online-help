<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;



$db = JFactory::getDbo();		
$query = 'SELECT `id`, `title`, `module` FROM #__modules WHERE published=1 AND client_id=0 AND module!=' . $db->quote('mod_custom');		
$result = $db->setQuery($query);




?>
<div class="mb2shortcodes-item mb2shortcodes-item-module">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
			
		
        $("#mb2shortcodes-module-submit").click(function(){
			                    
            var modName = $("#mb2shortcodes-module-form").serializeArray()[0].value;           
			$("#mb2shortcodes-result").html('[module name="'+modName+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Module</h3>
    <p class="mb2shortcodes-desc">Display selected module.</p> 
    <form id="mb2shortcodes-module-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="mod">Module</label></div>
        	<div class="controls">
            	<select name="mod" id="mod">
                	<?php foreach ($result->loadObjectList() as $m) : ?>                    
                    	<option value="<?php echo $m->module . ',' . $m->title; ?>"><?php echo $m->title . ' (' . $m->id . ')'; ?></option>                    
                    <?php endforeach; ?>
            	</select>
            </div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-module-submit" type="button" value="Generate">      
    </form>
</div>