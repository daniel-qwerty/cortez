<?php

class Hall_Widget_BannerHall extends Com_Object
{

    private $lan;

    /**
     *
     * @return Hall_Widget_BannerHall
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    public function render()
    {

        $list = Hall_Model_Hall::getInstance()->getListByLanBanner($this->lan->LanId);
        foreach ($list as $obj) {
            ?>
            <div class="col-md-12">
                <div class="masonry-item portfolio-item filter-rooms" data-title="<?php echo $obj->HallName; ?>">
                    <div
                        class="figure portfolio-os-animation image-filter-onhover fade-in text-left figcaption-middle normalwidth"
                        data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                        <a class="figure-image magnific"
                           href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $obj->HallImage; ?>"
                           target="_self">
                            <img class="importat-hall normalwidth"
                                 src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $obj->HallImage; ?>">
                            <div class="figure-overlay">
                                <div class="figure-overlay-container">
                                    <div class="figure-caption"><img class=""
                                                                     src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $obj->HallCapacity; ?>">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="figure-caption text-center">
                            <h3 class="figure-caption-title bordered bordered-small bordered-link">
                                <a class="figure-image magnific"
                                   href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $obj->HallImage; ?>"
                                   target="_self">
                                    <?php echo $obj->HallName; ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>


            </div>


        <?php } ?>

        <?PHP
    }

}
