<?php

class Seo_Helper_Seo extends Com_Object {

    /**
     *
     * @return Seo_Helper_Seo 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function get($lan, $alias) {
        return Seo_Model_Seo::getInstance()->getByPage($lan->LanId, $alias);
    }

}
