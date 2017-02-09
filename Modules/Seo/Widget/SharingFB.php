<?php

class Seo_Widget_SharingFB extends Com_Object {

    private $page;
    private $lan;

    /**
     *
     * @return Seo_Widget_SharingFB 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setPage($page) {
        $this->page = $page;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function render() {
        ?>           
        <meta property="og:url"                content="<?= Com_Helper_Url::getInstance()->urlBase . '/' . $this->lan->LanCode . '/page/contacto.html'?>" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="<?= Seo_Helper_Seo::getInstance()->get($this->lan, $this->page)->SeoTitle; ?>" />
        <meta property="og:description"        content="<?= Seo_Helper_Seo::getInstance()->get($this->lan, $this->page)->SeoDescription; ?>" />
        <meta property="og:image"              content="http://digitalmindsbolivia.com/cortez/Resources/Uploads/Image/580fadcbedfbf.jpg" />

    <?php
    }

}
