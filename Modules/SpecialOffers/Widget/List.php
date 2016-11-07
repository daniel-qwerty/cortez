<?php

class SpecialOffers_Widget_List extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return SpecialOffers_Widget_List 
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
            <li class="pricing-cirle element-top-0 element-bottom-40 os-animation"
                data-os-animation="fadeIn" data-os-animation-delay="0s">
                <div class="pricing-item-list-content">
                    <h3><?PHP echo $new->SpeName; ?>
                        <span><a href="#" style="background-color: #23527c;color: #fff;padding: 4px;border-radius: 5px;">Solicitar</a></span></h3>
                    <p><?PHP echo $new->SpeDescription; ?></p>
                </div>
            </li>
            <?php
        }
    }

}
