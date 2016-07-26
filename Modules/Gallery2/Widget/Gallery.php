<?php

class Gallery2_Widget_Gallery extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Gallery2_Widget_Gallery 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function render() {

        $list = Gallery2_Model_Gallery2::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            ?>

            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <a href="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->GalFile; ?>"
                   data-lightbox="gallery">
                    <img class="img-responsive"
                         src="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->GalFile; ?>" alt=""/>
                </a>
            </div>
        <?php } ?>

        <?PHP
    }

}
