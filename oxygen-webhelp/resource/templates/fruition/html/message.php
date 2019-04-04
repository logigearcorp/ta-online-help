<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;


function renderMessage($msgList)
{
	$output  = '';
	
	if (is_array($msgList))
	{		
		
		foreach ($msgList as $type => $msgs)
		{
			if (count($msgs))
			{				
				
				// Change Joomla mesage type to Bootstrap alert class
				if ($type == 'error')
				{
					$bstype = 'danger';	
				}
				elseif ($type == 'notice' || $type == 'warning')
				{
					$bstype = 'warning';
				}
				elseif ($type == 'ok' || $type == 'success')
				{
					$bstype = 'success';
				}
				elseif ($type == 'message')
				{
					$bstype = 'info';
				}
				
				
				$output .= '<div class="alert alert-' . $bstype . ' alert-dismissible syste-mmessage-alert" role="alert">';
				
				
				// Add close button
				$output .= '<button type="button" class="close" data-dismiss="alert">';
				$output .= '<span aria-hidden="true">&times;</span>';
				$output .= '<span class="sr-only">Close</span>';
				$output .= '</button>';
				
				
				foreach ($msgs as $msg)
				{
					$output .= '<p class="message-text">' . $msg . '</p>';
				}
								
				
				$output .= '</div>';
				
			}
		}

		return $output;
	}
}