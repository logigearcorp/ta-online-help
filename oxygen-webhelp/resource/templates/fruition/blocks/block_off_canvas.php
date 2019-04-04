<?php
/**
 * @package		Balance Template
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


if ($this->countModules('off-canvas')) : ?>
<div class="off-canvas-overlay"></div>
<div class="off-canvas-panel off-canvas-<?php echo $this->params->get('off_canvas_pos','left') . ' ' . $this->params->get('off_canvas_style','dark-gray'); ?> closed">	
    <div>
    	<div>
        	<a href="#" class="off-canvas-open"><i class="pe-7s-close"></i></a>
			<jdoc:include type="modules" name="off-canvas" style="none" />
    	</div>
    </div>	 
</div>
<?php endif; ?>	