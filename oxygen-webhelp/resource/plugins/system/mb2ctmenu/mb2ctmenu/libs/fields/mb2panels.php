<?php
/**
 * @package		Mb2 CtMenu
 * @version		1.4.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/

defined('_JEXEC') or die;



class JFormFieldMb2panels extends JFormField
{
	
	protected $type = 'Mb2panels';

	
	protected function getInput()
	{
		
		// Core variables
		$output = '';		
		$uniqid = uniqid();
		$doc = JFactory::getDocument();	
		$i = 0;		
		$count = count($this->value);			
		
		// Add style and script
		$doc->addStylesheet(JURI::root(true) . '/plugins/system/mb2ctmenu/mb2ctmenu/libs/fields/mb2panels/css/mb2panels.css');		
		$doc->addScript(JURI::root(true) . '/plugins/system/mb2ctmenu/mb2ctmenu/libs/fields/mb2panels/js/drag-arrange.min.js');
		$doc->addScript(JURI::root(true) . '/plugins/system/mb2ctmenu/mb2ctmenu/libs/fields/mb2panels/js/mb2panels.js');				
		
		$output[] .= '</div><div id="mb2options" class="clearfix">';
				
		$output[] .= '<span id="' . $this->id . '"';
		$output[] .= ' data-addtab="' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_TAB') . '"';
		$output[] .= ' data-remove="' . JText::_('PLG_SYSTEM_MB2CTMENU_REMOVE') . '"';
		$output[] .= ' data-title="' . JText::_('PLG_SYSTEM_MB2CTMENU_TITLE') . '"';
		$output[] .= ' data-addcolumn="' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_COLUMN') . '"';
		$output[] .= ' data-addrow="' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_ROW') . '"';
		$output[] .= ' data-darg="' . JText::_('PLG_SYSTEM_MB2CTMENU_DRAG') . '"';
		$output[] .= ' data-module="' . JText::_('PLG_SYSTEM_MB2CTMENU_MODULE') . '"';
		$output[] .= ' data-moduletitle="' . JText::_('PLG_SYSTEM_MB2CTMENU_MODULE_TITLE') . '"';
		$output[] .= ' data-customwidth="' . JText::_('PLG_SYSTEM_MB2CTMENU_CUSTOM_WIDTH') . '"';
		$output[] .= ' data-customclass="' . JText::_('PLG_SYSTEM_MB2CTMENU_CUSTOM_CLASS') . '"';
		$output[] .= ' data-content="' . JText::_('PLG_SYSTEM_MB2CTMENU_CONTENT') . '"';
		$output[] .= ' data-yes="' . JText::_('JYES') . '"';
		$output[] .= ' data-no="' . JText::_('JNO') . '"';
		$output[] .= ' ></span>';				
				
		$output[] .= '<div class="mb2options-panels">';		
		$output[] .= '<a href="#" class="mb2options-additem btn btn-small btn-success">&#43; ' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_TAB') . '</a>';		
		$output[] .= '<ul style="margin:0;" class="mb2options-list" data-id="' . $this->id  . '" data-pname="' . $this->name . '[tabs]" data-url="' . JURI::root() . '">';			
		
		if (isset($this->value['tabs']) && is_array($this->value['tabs']))
		{
		
			foreach ($this->value['tabs'] as $key=>$val)
			{				
				$i++;
				if (isset($this->value['tabs'][$key]['title']) && !empty($this->value['tabs'][$key]['title']))
				{							
					
					
					$output[] .= '<li style="margin:0;" class="mb2options-item mb2options-item-' . str_replace('panel_', '', $key) . '" data-key="' . str_replace('panel_', '', $key) . '">';					
					
					$output[] .= '<a href="#" class="mb2options-remove">' . JText::_('PLG_SYSTEM_MB2CTMENU_REMOVE') . '</a>';											
					
					
					// Panel heading
					// Define panel title
					$ptitle = (isset($this->value['tabs'][$key]['title']) && !empty($this->value['tabs'][$key]['title'])) ? $this->value['tabs'][$key]['title'] : '';
					
					if (preg_match('#\\|#', $ptitle))
					{
						
						$ptitle_arr = explode('|', $ptitle);
						$is_ptitle = $ptitle_arr[0];
							
					}
					else
					{
						
						$is_ptitle = $ptitle ? $ptitle : '...';	
						
					}
					
					
					$output[] .= '<div class="mb2options-item-heading">';					
					$output[] .= '<span class="mb2options-item-drag">' . JText::_('PLG_SYSTEM_MB2CTMENU_DRAG') . '</span>';											
					$output[] .= $is_ptitle;														
					$output[] .= '</div>';
					
					
					// Srat content div			
					$output[] .= '<div class="mb2options-item-content">';
					
							
					$output[] .= '<input type="hidden" name="' . $this->name . '[tabs][' . $key . ']"/>';				
					$output[] .= '<p><label class="ltitle" for="' . $key . '_title">' . JText::_('PLG_SYSTEM_MB2CTMENU_TITLE') . '</label>';					
					$output[] .= '<textarea class="ftitle" name="' . $this->name . '[tabs][' . $key . '][title]" id="' . $key . '_title">' . $this->value['tabs'][$key]['title'] . '</textarea></p>';					
					
					
					// Start item columns div					
					$output[] .= '<div class="mb2options-item-columns">';
					
							
					$output[] .= '<a href="#" class="mb2options-addcolumn btn btn-mini btn-success">' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_COLUMN') . '</a>';					
					$output[] .= '<a href="#" class="mb2options-addrow btn btn-mini btn-inverse">' . JText::_('PLG_SYSTEM_MB2CTMENU_ADD_ROW') . '</a>';	
					
					
					$output[] .= '<div class="clearfix"></div>';
					
									
					$output[] .= '<input class="fcolumns" type="hidden" name="' . $this->name . '[tabs][' . $key . '][columns]" />';					
										
					
					if (!empty($this->value['tabs'][$key]['columns']))
					{
						
						$c = 0;
						
						
						foreach ($this->value['tabs'][$key]['columns'] as $key2=>$col)
						{
							
							$c++;													
							
							
							if ((isset($this->value['tabs'][$key]['columns'][$key2]['content']) && 
							$this->value['tabs'][$key]['columns'][$key2]['content']!='') || 
							(isset($this->value['tabs'][$key]['columns'][$key2]['module']) && $this->value['tabs'][$key]['columns'][$key2]['module']>0))							
							{								
								
								$row_cls =  $this->value['tabs'][$key]['columns'][$key2]['content'] === 'row' ? ' mb2options-row' : '';								
								
								
								
								// Start column item div
								$output[] .= '<div class="mb2options-item-column' . $row_cls . ' mb2options-item-column-' . $c . '">';								
								
								
								$output[] .= '<div class="mb2options-item-column-heading">';								
								$output[] .= '<a href="#" class="mb2options-removecolumn">' . JText::_('PLG_SYSTEM_MB2CTMENU_REMOVE') . '</a>';								
								$output[] .= '<span class="mb2options-item-column-drag">' . JText::_('PLG_SYSTEM_MB2CTMENU_DRAG') . '</span>';								
								$output[] .= '</div>';								
								
								
								// Start item column content div
								$output[] .= '<div class="mb2options-item-column-content">';
								
								
								$output[] .= '<input class="fcolumn" type="hidden" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . ']" />';								
								
								
								// Start item column div
								$output[] .= '<div class="mb2options-item-content-col">';
								
								
								// Get module list
								$db = JFactory::getDbo();		
								$query = 'SELECT `id`, `title` FROM #__modules WHERE published=1 AND client_id=0 AND module!=' . $db->quote('mod_mb2ctmenu');		
								$result = $db->setQuery($query);
																
								
								$output[] .= '<p class="mb2options-module-field"><label class="lcol_module" for="' . $key2 . '_col_module">' . JText::_('PLG_SYSTEM_MB2CTMENU_MODULE') . '</label>';								
								$output[] .= '<select class="fcol_module mb2options-select" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . '][module][]" id="' . 
								$key2 . '_col_module" multiple="multiple">';							
								
								
								// Define module ids array
								$mod_arr = (isset($this->value['tabs'][$key]['columns'][$key2]['module']) && is_array($this->value['tabs'][$key]['columns'][$key2]['module'])) ? 
								$this->value['tabs'][$key]['columns'][$key2]['module'] : array();
																							
								
								foreach ($result->loadObjectList() as $module)
								{																
									$selected = (in_array($module->id, $mod_arr) && !in_array(0, $mod_arr)) ? ' selected' : '';
									$output[] .= '<option value="' . $module->id . '"' . $selected . '>' . $module->title . ' (Id: ' . $module->id . ')</option>';																										
								}
								
								
								$output[] .= '</select></p>';
								
																
								$output[] .= '<p><label class="lcol_module_title" for="' . $key2 . '_col_module_title">' . JText::_('PLG_SYSTEM_MB2CTMENU_MODULE_TITLE') . '</label>';							
								$mtselected1 = (isset($this->value['tabs'][$key]['columns'][$key2]['module_title']) && $this->value['tabs'][$key]['columns'][$key2]['module_title']) == 1 ? 
								' selected' : '';
								$mtselected0 = isset($this->value['tabs'][$key]['columns'][$key2]['module_title']) && $this->value['tabs'][$key]['columns'][$key2]['module_title'] == 0 ? 
								' selected' : '';							
								$output[] .= '<select class="fcol_module_title mb2options-select" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . '][module_title]" id="' . 
								$key2 . '_col_module_title">';								
								$output[] .= '<option value="1"' . $mtselected1 . '>' . JText::_('JYES') . '</option>';
								$output[] .= '<option value="0"' . $mtselected0 . '>' . JText::_('JNO') . '</option>';					
								$output[] .= '</select></p>';
								
								
								// End item column div	
								$output[] .= '</div>';
								
								
								// Start item column div								
								$output[] .= '<div class="mb2options-item-content-col last">';	
								
															
								$output[] .= '<p><label class="lcol_cwidth" for="' . $key2 . '_col_cwidth">' . JText::_('PLG_SYSTEM_MB2CTMENU_CUSTOM_WIDTH') . '</label>';						
								$output[] .= '<input type="text" class="fcol_cwidth" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . '][cwidth]" id="' . $key2 . '_col_cwidth" value="' . $this->value['tabs'][$key]['columns'][$key2]['cwidth'] . '"/></p>';				
								$output[] .= '<p><label class="lcol_ccls" for="' . $key2 . '_col_ccls">' . JText::_('PLG_SYSTEM_MB2CTMENU_CUSTOM_CLASS') . '</label>';						
								$output[] .= '<textarea class="fcol_ccls" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . '][ccls]" id="' . $key2 . '_col_ccls">' . $this->value['tabs'][$key]['columns'][$key2]['ccls'] . '</textarea></p>';
								
								
								// Start item column div								
								$output[] .= '</div>';
								
								
								$output[] .= '<div style="float:none;clear:both;"></div>';
								
															
								$output[] .= '<p class="mb2options-content-field"><label class="lcol_content" for="' . $key2 . '_col_content">' . JText::_('PLG_SYSTEM_MB2CTMENU_CONTENT') . '</label>';						
								$output[] .= '<textarea class="fcol_content mb2options-textarea" name="' . $this->name . '[tabs][' . $key . '][columns][' . $key2 . '][content]" id="' . $key2 . '_col_content">' . $this->value['tabs'][$key]['columns'][$key2]['content'] . '</textarea></p>';								
								
								
								
								// End item column content div
								$output[] .= '</div>';
								
								
								// End column item div							
								$output[] .= '</div>';
									
							}
							
						}
												
					}					
					
					
					// End columns div
					$output[] .= '</div>';
					
					
					// End content div
					$output[] .= '</div>';
					
													
					$output[] .= '</li>';			
					
				} // End if 'isset($this->value['tabs'][$key]['ctitle']) && !empty($this->value['tabs'][$key]['ctitle'])'					
			
			} // End foreach				
		
		} // end if 'is_array($this->value)'		
		
		$output[] .= '</ul>';
		$output[] .='</div>';		
		$output[] .= '<div class="mb2options-settings">';
				
		
		$output[] .= '<input type="hidden" name="' . $this->name . '[settings]" value="" />';
			
		$mega1 = (isset($this->value['settings']['mega']) && $this->value['settings']['mega'] == 1) ? ' selected' : '';	
		$mega0 = (isset($this->value['settings']['mega']) && $this->value['settings']['mega'] == 0) ? ' selected' : '';		
			
		$output[] .= '<p>';
		$output[] .= '<label for="settings_tabspos">' . JText::_('PLG_SYSTEM_MB2CTMENU_MEGA_MENU') . '</label>';
		$output[] .= '<select name="' . $this->name . '[settings][mega]" id="settings_tabspos">';
		$output[] .= '<option value="1"' . $mega1 . '>' . JText::_('JYES') . '</option>';
		$output[] .= '<option value="0"' . $mega0 . '>' . JText::_('JNO') . '</option>';
		$output[] .= '</select>';
		$output[] .= '</p>';
		
		
		$output[] .= '<p>';
		$output[] .= '<label for="settings_megacols">' . JText::_('PLG_SYSTEM_MB2CTMENU_MEGA_COLUMNS_NUM') . '</label>';	
		$megacols_val = isset($this->value['settings']['megacols']) ? $this->value['settings']['megacols'] : '';		
		$output[] .= '<input type="text" name="' . $this->name . '[settings][megacols]" id="settings_megacols" value="' . $megacols_val . '"/>';	
		$output[] .= '</p>';
		
		
		$output[] .= '<p>';
		$output[] .= '<label for="settings_minheight">' . JText::_('PLG_SYSTEM_MB2CTMENU_MIN_HEIGHT') . '</label>';	
		$minheight_val = isset($this->value['settings']['minheight']) ? $this->value['settings']['minheight'] : '';		
		$output[] .= '<input type="text" name="' . $this->name . '[settings][minheight]" id="settings_minheight" value="' . $minheight_val . '"/>';	
		$output[] .= '</p>';
						
		$pos_top = (isset($this->value['settings']['tabspos']) && $this->value['settings']['tabspos'] == 'top') ? ' selected' : '';
		$pos_left = (isset($this->value['settings']['tabspos']) && $this->value['settings']['tabspos'] == 'left') ? ' selected' : '';
		$pos_right = (isset($this->value['settings']['tabspos']) && $this->value['settings']['tabspos'] == 'right') ? ' selected' : '';
		$pos_bottom = (isset($this->value['settings']['tabspos']) && $this->value['settings']['tabspos'] == 'bottom') ? ' selected' : '';			
			
		$output[] .= '<p>';
		$output[] .= '<label for="settings_tabspos">' . JText::_('PLG_SYSTEM_MB2CTMENU_TABS_POS') . '</label>';
		$output[] .= '<select name="' . $this->name . '[settings][tabspos]" id="settings_tabspos">';
		$output[] .= '<option value="top"' . $pos_top . '>' . JText::_('PLG_SYSTEM_MB2CTMENU_TOP') . '</option>';
		$output[] .= '<option value="left"' . $pos_left . '>' . JText::_('PLG_SYSTEM_MB2CTMENU_LEFT') . '</option>';
		$output[] .= '<option value="right"' . $pos_right . '>' . JText::_('PLG_SYSTEM_MB2CTMENU_RIGHT') . '</option>';
		$output[] .= '<option value="bottom"' . $pos_bottom . '>' . JText::_('PLG_SYSTEM_MB2CTMENU_BOTTOM') . '</option>';
		$output[] .= '</select>';
		$output[] .= '</p>';				
		
		$output[] .='</div>';
		
		
		// Output
		return implode($output);				
		
	}
}