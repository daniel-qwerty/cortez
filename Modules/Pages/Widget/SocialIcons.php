<?php

class Pages_Widget_SocialIcons extends Com_Object {



    /**
     *
     * @static
     * @access public
     * @return Pages_Widget_SocialIcons
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }



    public function render() {
        ?>
        <ul class="unstyled inline social-icons social-simple">
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/es"><img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/hotel/es.png"></a> </li>
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/en"><img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/hotel/en.png"></a> </li>
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/pt"><img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/hotel/pt.png"></a> </li>
        </ul>
        <?PHP
    }
    
    public function render2() {
        ?>
        <ul class="unstyled inline social-icons social-simple">
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/es">Español</a> </li>
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/en">Ingles</a> </li>
            <li> <a  href="<?= Com_Helper_Url::getInstance()->urlBase ?>/pt">Portugues</a> </li>
        </ul>
        <?PHP
    }

}
