<?php

class SpecialOffers_Widget_Images extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return SpecialOffers_Widget_Images
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

        $list = SpecialOffers_Model_SpecialOffer::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            ?>            
            
            <div class="carrusel-item">
                <a onclick="$('#formContact #item').val('<?= $new->SpeName; ?>');" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                    <img style="cursor: pointer;" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $new->SpeImage; ?>"
                         alt="">
                </a>
            </div>
            <?php
        }
        
    }

}
