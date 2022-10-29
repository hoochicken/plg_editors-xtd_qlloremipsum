<?php
/**
 * @package		plg_editors-xtd_qlloremipsum
 * @copyright	Copyright (C) 2017 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class plgButtonQlloremipsum extends JPlugin
{
    /**
     * Constructor
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     * @since       1.5
     */
    public function __construct(& $subject, $config)
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
        $this->destination=$destination;
        //die($destination);
        JHtml::_('behavior.modal');
        $doc = JFactory::getDocument();
        $doc->addScriptDeclaration($this->getJavascript());
        return $this->getButton();
    }
    private function getButton()
    {
        $button = new JObject();
        $button->set('class', 'btn');
        $button->set('text', JText::_('PLG_EDITORS-XTD_QLLOREMIPSUM_BUTTON'));
        $button->set('name','paragraph-left');
        if('1'==$this->params->get('oneclick','0'))
        {
            $button->onclick = 'insertQlloremipsum(\''.$this->default.'\');return false;';
            $button->set('link','#');
        }
        else
        {
            $button->set('link',$this->getLink());
            $button->set('options', "{handler: 'iframe', size: {x: 320, y: 290}}");
            $button->set('modal', true);
        }
        return $button;
    }
    private function getLink()
    {
        $link = JFactory::getApplication()->isAdmin() ? '..' : '';
        $link .= '/plugins/editors-xtd/qlloremipsum/html/modal.php?';
        $link .= 'bp=' . urlencode(JURI::root());
        $link .= '&default='.str_replace('\'','’',$this->default);
        return $link;
    }
    private function getJavascript()
    {
        $js=array();
        $js[]='function insertQlloremipsum(str)';
        $js[]='{';
        $js[]='var returnStr="";';
        $js[]='returnStr+=str;';
        $js[]='jInsertEditorText(returnStr, "'.$this->destination.'");';
        if('0'==$this->params->get('oneclick','0')) $js[]='jModalClose();';
        $js[] = '}';
        return implode("\n",$js);
    }
    private function setDefault()
    {
        $this->default=$this->cleanString($this->params->get('default','<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>'));
    }
    private function cleanString($str)
    {
        $arrString=preg_split("?\n?",$str);
        $str='<p>'.implode('</p><p>',$arrString).'</p>';
        $str=str_replace("\n",'<br />',$str);
        $str=str_replace("\r",'',$str);
        return $str;
    }

    /*
    private function getJavascript()
    {
        $js=array();
        $js[]='function insertQlloremipsum(str)';
        $js[]='{';
        if('0'==$this->params->get('oneclick','0')) $js[]='SqueezeBox.close();';
        //$js[]='var arrSpan = str.split(":");';
        //$js[]='var index, len;';
        //$js[]='var returnStr=""';
        //$js[]='returnStr+="<p>";';
        //$js[]='returnStr+="{row}";';
        $js[]='returnStr+="</p>";';
        $js[]='for (index = 0, len = arrSpan.length; index < len; ++index)';
        $js[]='{';
        $js[]='returnStr+="<p>";';
        $js[]='returnStr+="{span"+arrSpan[index]+"}";';
        $js[]='returnStr+="{/span}";';
        $js[]='returnStr+="</p>";';
        $js[]='}';
        $js[]='returnStr+="<p>";';
        $js[]='returnStr+="{/row}";';
        $js[]='returnStr+="</p>";';
        $js[]='jInsertEditorText(returnStr, "'.$this->destination.'");';
        $js[] = '}';
        return implode("\n",$js);
    }*/
}
