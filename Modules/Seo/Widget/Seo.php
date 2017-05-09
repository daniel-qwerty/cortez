<?php

class Seo_Widget_Seo extends Com_Object {

    private $page;
    private $url;
    private $lan;

    /**
     *
     * @return Seo_Widget_Seo 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setPage($page, $url) {
        $this->page = $page;
        return $this;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function render() {?>           
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
        <title><?= Seo_Helper_Seo::getInstance()->get($this->lan, $this->page)->SeoTitle; ?></title>
        <meta name="description" content="<?= Seo_Helper_Seo::getInstance()->get($this->lan, $this->page)->SeoDescription; ?>">
        <meta name="subjetc" content="<?= Seo_Helper_Seo::getInstance()->get($this->lan, $this->page)->SeoShortDescription; ?>">
        <meta name=”robots” content=”Index,Follow”>
        <meta name=”google” content=”nositelinkssearchbox”>
        <meta name="Author" content="Qwerty Bolivia">
        <?php Seo_Widget_SharingFB::getInstance()->setLan($this->lan)->setPage("Inicio")->setUrl($this->url)->render(); ?>
        
    <?php }

}
