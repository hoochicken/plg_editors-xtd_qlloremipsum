<?php
/**
 * @package        plg_editors-xtd_qlloremipsum
 * @copyright      Copyright (C) 2022 ql.de All rights reserved.
 * @author         Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\Object\CMSObject;

defined('_JEXEC') or die;

class plgButtonQlloremipsum extends JPlugin
{
    private string $destination;
    private string $default;

    /**
     * Constructor
     *
     * @access      protected
     * @param object $subject The object to observe
     * @param array $config An array that holds the plugin configuration
     * @since       1.5
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
        $this->setDefault();
    }

    /**
     * Display the button
     *
     * @return array A four element array of (article_id, article_title, category_id, object)
     */
    public function onDisplay($destination)
    {
        $this->destination = $destination;
        //die($destination);
        // JHtml::_('behavior.modal');
        $doc = JFactory::getDocument();
        $doc->addScript(JURI::root(true) . '/plugins/editors-xtd/qlloremipsum/js/qlloremipsum.js');
        // $doc->addScriptDeclaration($this->getJavascript());
        return $this->getButtonJoomla4();
    }

    private function getButtonJoomla4()
    {
        $button = new CMSObject();
        $button->modal = true;
        $button->set('text', Text::_('PLG_EDITORS-XTD_QLLOREMIPSUM_BUTTON'));
        $button->name = $this->_type . '_' . $this->_name;
        $button->icon = 'edit';
        $button->onclick = sprintf('window.insertQlloremipsum("%s", "%s");return false;', $this->destination, $this->default);
        $button->set('link', '#');
        return $button;
    }

    private function getButtonJoomla3()
    {
        $button = new JObject();
        $button->set('class', 'btn');
        $button->set('text', JText::_('PLG_EDITORS-XTD_QLLOREMIPSUM_BUTTON'));
        $button->set('name', 'paragraph-left');
        if ((bool)$this->params->get('oneclick', 0)) {
            $button->onclick = sprintf('window.insertQlloremipsum("%s", "%s");return false;', $this->destination, $this->default);
            $button->set('link', '#');
        } else {
            $button->set('link', $this->getLink());
            $button->set('options', "{handler: 'iframe', size: {x: 320, y: 290}}");
            $button->set('modal', true);
        }
        return $button;
    }

    private function getLink()
    {
        $link = JFactory::getApplication()->isClient('administrator') ? '..' : '';
        $link .= '/plugins/editors-xtd/qlloremipsum/html/modal.php?';
        $link .= 'bp=' . urlencode(JURI::root());
        $link .= '&default=' . str_replace('\'', '’', $this->default);
        return $link;
    }

    private function getJavascript()
    {


        return '';
        $js = [];
        $js[] = '
(() => {
window.insertQlloremipsum = destination, strToBeInserted => {
    // const o = window.Joomla.editors.instances[destination].getValue();
    alert("test");
    alert("strToBeInserted");
    debugger;
    window.Joomla.editors.instances[strToBeInserted].replaceSelection("XXXXXXX");
    return true;
  }
})();

function qlloremipsum(x) {
  window.insertQlloremipsum(x);
}
        
        ';
    }

    private function setDefault()
    {
        $this->default = $this->cleanString($this->params->get('default', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>'));
    }

    private function cleanString($str)
    {
        $arrString = preg_split("?\n?", $str);
        $str = '<p>' . implode('</p><p>', $arrString) . '</p>';
        $str = str_replace("\n", '<br />', $str);
        $str = str_replace("\r", '', $str);
        return $str;
    }
}
