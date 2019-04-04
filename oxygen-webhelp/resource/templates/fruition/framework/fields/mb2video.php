<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Supports a one line text field.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @link        http://www.w3.org/TR/html-markup/input.text.html#input.text
 * @since       11.1
 */
class JFormFieldMb2video extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Mb2video';

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   11.1
	 */
	protected function getLabel()
	{
		if (empty($this->element['label']) && empty($this->element['description']))
		{
			return '';
		}

		$title = $this->element['label'] ? (string) $this->element['label'] : ($this->element['title'] ? (string) $this->element['title'] : '');
		$video_id = (string) $this->element['video_id'];
		$width = $this->element['width'] ? (string) $this->element['width'] : '560';
		$height = $this->element['height'] ? (string) $this->element['height'] : '316';
		$heading = $this->element['heading'] ? (string) $this->element['heading'] : 'h4';
		$description = (string) $this->element['description'];
		$class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$close = (string) $this->element['close'];

		$html = array();

		if ($close)
		{
			$close = $close == 'true' ? 'alert' : $close;
			$html[] = '<button type="button" class="close" data-dismiss="' . $close . '">&times;</button>';
		}

		$html[] = !empty($title) ? '<' . $heading . '>' . JText::_($title) . '</' . $heading . '>' : '';
		
		if(!empty($video_id)){
			
			
			//get style for video container and iframe
			$container_style = ' style="position: relative;padding-bottom:56.25%;padding-top:25px;height:0;overflow:hidden;z-index:0;margin-bottom:20px;"';			
			$iframe_style = ' style="position:absolute;top:0;left:0;max-width:100%;height:100%;"';
			
			
			//chek video id (youtube or vimeo)			
			if(preg_match('/^[0-9]+$/', $video_id)){
				$html[] = '<div style="max-width:'.$width.'px;"><div'.$container_style.'><iframe'.$iframe_style.' width="'.$width.'" height="'.$height.'" src="//player.vimeo.com/video/'.$video_id.'?wmode=transparent" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen=""></iframe></div></div>';			
			}
			else{		
				$html[] = '<div style="max-width:'.$width.'px;"><div'.$container_style.'><iframe'.$iframe_style.' width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$video_id.'?wmode=transparent" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen=""></iframe></div></div>';		
			}	
			
		}
		
		
		

		return '</div><div ' . $class . '>' . implode('', $html);
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		return '';
	}
}
