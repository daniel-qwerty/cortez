<?php

class Preserv_Widget_Gallery extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Preserv_Widget_Gallery
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

        $list = Preserv_Model_Preserv::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            ?>
            <div>
                <div class="col-lg-6 p-content">
                    <div class="servicio-header">

                        <h2><?PHP echo $new->CerName; ?></h2>
                    </div>
                    <p><?PHP echo $new->CerDescription; ?></p>
                </div>
                <div class="col-lg-6 p-content"
                     style="background: url(<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->CerImage; ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                </div>


            </div>

            <?php
        }
    }

}
