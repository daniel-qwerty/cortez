<?php

class Sports_Widget_Galleries extends Com_Object {

    private $lan;
    private $spoId;

    /**
     *
     * @return Sports_Widget_Galleries
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setSpoId($spoId) {
        $this->spoId = $spoId;
        return $this;
    }

    public function render() {
        
        $list = Sports_Model_Media::getInstance()->getListBySport($this->spoId, $this->lan->LanId);
        foreach ($list as $new) {
                ?>
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <a href="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->MedImage; ?>"
                   data-lightbox="gallery">
                    <img class="img-responsive"
                         src="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->MedImage; ?>" alt=""/>
                </a>
            </div>
            <?php 
               
            
        }
    }

}
