<?php

class Hall_Widget_BannerHall extends Com_Object {

    private $lan;

    /**
     *
     * @return Hall_Widget_BannerHall
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function render() {

        $list = Hall_Model_Hall::getInstance()->getListByLanBanner($this->lan->LanId);
        foreach ($list as $obj) {
            ?>
            <div class="col-md-12">
                <div class="figure portfolio-os-animation image-filter-onhover fade-in text-left figcaption-middle normalwidth" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                    <a class="figure-image" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "hall/" . $obj->HallId); ?>" target="_self"> 
                        <img class="importat-hall normalwidth" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $obj->HallImage; ?>">     
                        <div class="figure-overlay">
                            <div class="figure-overlay-container">
                                <div class="figure-caption"> <?php echo $obj->HallName; ?> </i> </div>
                            </div>
                        </div>
                    </a>

                </div>

            </div>


        <?php } ?>

        <?PHP
    }

}
