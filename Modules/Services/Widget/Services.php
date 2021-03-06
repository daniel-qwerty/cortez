<?php

class Services_Widget_Services extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_Services
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id) {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        $s =0;
        foreach ($list as $item) {
            if($count == 0){
            $count = 1;
            $s++;
            ?>

            <section class="section" id="<?= $item->SerId; ?>">
                <div class="background-media" data-0-top-bottom="background-position: 50% -10px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                </div>
                <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                <div class="container-fullwidth container-vertical-middle">
                    <div class="row">
                        <div class="col-md-6" style="background:rgba(255, 255, 255, 0.75);">
                            <div class="row">
                                
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <h2 class="element-top-100 os-animation big" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                                        <?= $item->SerTitle ?>
                                    </h2>
                                    <div class="figure os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.2s"> <span class="figure-image">
                                            <img alt="decor-small-gold.png" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/hotel/decor-small-gold.png">
                                        </span> </div>
                                    <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <p><?= $item->SerDescription?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>

            <?PHP
            
            }  else {  $count=0 ?>
                <section class="section" id="<?= $item->SerId; ?>">
                <div class="background-media" data-0-top-bottom="background-position: 50% -80px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                </div>
                <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                <div class="container-fullwidth container-vertical-middle">
                    <div class="row ">
                        
                        <div class="col-md-6 col-md-offset-6 text-center" style="background:rgba(255, 255, 255, 0.75);">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 text-center">
                                    <h2 class="element-top-100 os-animation big" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
                                <?= $item->SerTitle?>
                            </h2>
                                    <div class="figure os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.2s"> <span class="figure-image">
                                    <img alt="decor-small-gold.png" src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/hotel/decor-small-gold.png">
                                </span> </div>
                                    <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <p><?= $item->SerDescription?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?PHP
            
            }
        }
    }

    public function renderPag() {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        foreach ($list as $item) {
            $count++;
            ?>
            <div class="col-xs-2 col-md-2"><a href="javascript:void(0)"
                                              data-toggle="tooltip" data-placement="top" title="<?= $item->SerTitle ?>"
                                              onclick="slideServiceTo(<?= $count - 1; ?>);"><img
                        class="servicio00 servicio0<?php echo $count; ?> img-responsive <?= ($count == 1) ? "" : "black" ?>"
                        alt=""/></a></div>
            <?PHP
        }
    }

    public function getJs() {
        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);

        foreach ($list as $index => $item) {
//            echo sprintf('#servicios .servicio0%s{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo);
//            echo sprintf('#servicios .servicio0%s.black{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);

            echo sprintf("
            if(x==%s)
            {
                $('.servicio0%s').attr('src','%s');
            }
            else
            {
                $('.servicio0%s').attr('src','%s');
            }", $index + 1, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);
        }
    }

}
?>
