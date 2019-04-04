<?php
/**
 * @package		Mb2 Pricing Table
 * @version		1.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/ 

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_ROOT . '/administrator/components/com_mb2pricingtable/helpers/html');


class PlgContentMb2pricingtable extends JPlugin{
   
	
	public function onContentPrepare($context, &$article, &$params, $limitstart=0){
		
		$lang = JFactory::getLanguage();
		$lang->load('plg_content_mb2pricingtable', JPATH_ADMINISTRATOR);								 
		$text = &$article->text;
		$regex = '/{mb2ptable\s(.*?)}/i';
		$tid = '$1';	
		jimport( 'joomla.database.table' );
		
		JTable::addIncludePath(JPATH_ROOT . '/administrator/components/com_mb2pricingtable/tables');
		$item = JTable::getInstance('Mb2pricingtable', 'Mb2pricingtableTable', array());	
				
		preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);
		
		if ($matches)
		{
			
			foreach ($matches as $match)
			{
				$matcheslist = explode(',', $match[1]);

				$tid = trim($matcheslist[0]);

				$output = JHtml::_('ptable.getPtable', $item, array('tid'=>$tid));

				$text = preg_replace("|$match[0]|", $output, $article->text, 1);				
			}
			
		}			  
					 
		return true;
		
	}

}