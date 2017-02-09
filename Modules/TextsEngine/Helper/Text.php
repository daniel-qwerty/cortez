<?php

class Texts_Helper_Text extends Com_Object {

    /**
     *
     * @return TextsEngine_Helper_Text 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function get($lan, $alias) {
        return TextsEngine_Model_Text::getInstance()->getByAlias($lan->LanId, $alias);
    }

}
