<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_languages
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_languages/template.css', array(), true);

?>
<div class="tmpl-languages">
	<?php foreach ($list as $language) : ?>
           <?php if ($language->active):?>
               <a class="tmpl-languages-active-item" href="<?php echo $language->link;?>">
               <?php if ($params->get('image', 1)):?>
                   <?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true);?>
               <?php endif; ?>
               <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>
               </a>
           <?php endif; ?>
      <?php endforeach;?>
	<div class="tmpl-languages-list">
		<?php foreach ($list as $language) : ?>
            <?php if (!$language->active):?>
                <a class="" href="<?php echo $language->link;?>">
                <?php if ($params->get('image', 1)):?>
                    <?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true);?>
                <?php endif; ?>
                <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>
                </a>
            <?php endif; ?>
        <?php endforeach;?>
	</div>	
</div>
