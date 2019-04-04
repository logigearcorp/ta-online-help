<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_mailto
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.core');
JHtml::_('behavior.keepalive');

$data = $this->get('data');

JFactory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(pressbutton)
	{
		var form = document.getElementById('mailtoForm');

		// do field validation
		if (form.mailto.value == '' || form.from.value == '')
		{
			alert('" . JText::_('COM_MAILTO_EMAIL_ERR_NOINFO') . "');
			return false;
		}
		form.submit();
	}
");
?>

<div id="mailto-window">
	<?php /*?><h2>
		<?php echo JText::_('COM_MAILTO_EMAIL_TO_A_FRIEND'); ?>
	</h2><?php */?>
	<p class="mailto-close">
		<a href="javascript: void window.close()" title="<?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?>">
		 <span><?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?> </span></a>
	</p>
	<form action="<?php echo JUri::base() ?>index.php" id="mailtoForm" method="post">
		<div class="formelm control-group">
        	<div class="control-label">
				<label for="mailto_field"><?php echo JText::_('COM_MAILTO_EMAIL_TO'); ?></label>
            </div>
            <div class="controls">
				<input type="text" id="mailto_field" name="mailto" class="inputbox" size="25" value="<?php echo $this->escape($data->mailto); ?>"/>
            </div>
		</div>
		<div class="formelm control-group">
        	<div class="control-label">
				<label for="sender_field"><?php echo JText::_('COM_MAILTO_SENDER'); ?></label>
             </div>
             <div class="controls">
				<input type="text" id="sender_field" name="sender" class="inputbox" value="<?php echo $this->escape($data->sender); ?>" size="25" />
             </div>
		</div>
		<div class="formelm control-group">
        	<div class="control-label">
				<label for="from_field"><?php echo JText::_('COM_MAILTO_YOUR_EMAIL'); ?></label>
            </div>
            <div class="controls">
				<input type="text" id="from_field" name="from" class="inputbox" value="<?php echo $this->escape($data->from); ?>" size="25" />
            </div>
		</div>
		<div class="formelm control-group">
       	 	<div class="control-label">
				<label for="subject_field"><?php echo JText::_('COM_MAILTO_SUBJECT'); ?></label>
            </div>
            <div class="controls">
				<input type="text" id="subject_field" name="subject" class="inputbox" value="<?php echo $this->escape($data->subject); ?>" size="25" />
            </div>
		</div>
		<div>
			<button class="btn btn-primary rounded" onclick="return Joomla.submitbutton('send');">
				<?php echo JText::_('COM_MAILTO_SEND'); ?>
			</button>
			<button class="btn btn-danger rounded" onclick="window.close();return false;">
				<?php echo JText::_('COM_MAILTO_CANCEL'); ?>
			</button>
		</div>
		<input type="hidden" name="layout" value="<?php echo $this->getLayout();?>" />
		<input type="hidden" name="option" value="com_mailto" />
		<input type="hidden" name="task" value="send" />
		<input type="hidden" name="tmpl" value="component" />
		<input type="hidden" name="link" value="<?php echo $data->link; ?>" />
		<?php echo JHtml::_('form.token'); ?>

	</form>
</div>
